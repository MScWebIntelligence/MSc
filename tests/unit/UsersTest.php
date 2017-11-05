<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 11/4/2017
 * Time: 7:59 AM
 */
use PHPUnit\Framework\TestCase;
use Classes\User\Users;

class UsersTest extends TestCase
{
    private $users;
    const userId    = 1;
    const bookId    = 'yvYMywAACAAJ';
    const email     = 'vako88@gmail.com';
    const password  = '123456';

    /**
     * UsersTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->users = new Users();
    }

    /**
     * Test getUserById() function
     */
    public function testGetUser()
    {
        $response = $this->users->getUserById(self::userId);
        $this->assertEquals($response->getFirstname(), 'Vaggelis');

        $response = $this->users->getUserById(0);
        $this->assertFalse($response);

        $response = $this->users->getUserById("string");
        $this->assertFalse($response);
    }

    /**
     * Test all login cases
     */
    public function testLogin()
    {
        $response = $this->users->login(self::email, self::password);
        $this->assertEquals($response['userId'], self::userId);

        $response = $this->users->login('', '');
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Email is required');

        $response = $this->users->login('', self::password);
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Email is required');

        $response = $this->users->login(self::email, '');
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Password is required');

        $response = $this->users->login('vako888@gmail.com', self::password);
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Authentication failed. Please try again');

        $response = $this->users->login(self::email, '1234567');
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Authentication failed. Please try again');

        $response = $this->users->login('vako88@gmail', self::password);
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Email has not the right format');

        $response = $this->users->login(self::email, '123456789');
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Password\'s length must be between 6 to 8 characters');
    }

    /**
     * Get Logged In User
     */
    public function testGetLoggedInUser()
    {
        global $_COOKIE;

        $response = $this->users->getLoggedInUser(false);
        $this->assertFalse($response);

        $_COOKIE['jwt'] = "adummycookie";
        $response       = $this->users->getLoggedInUser(false);
        $this->assertFalse($response);

        $_COOKIE['jwt'] = $this->users->getJWT(self::userId);
        $response       = $this->users->getLoggedInUser(false);
        $this->assertEquals($response->getId(), self::userId);
        $this->assertEquals($response->getFirstname(), 'Vaggelis');
        $this->assertEquals($response->getLastname(), 'Kotrotsios');
        $this->assertNull($response->getEmail());

        $this->users->logout();
        $response = $this->users->getLoggedInUser(false);
        $this->assertFalse($response);
    }

    /**
     * Test all login cases
     */
    public function testAddBook()
    {
        $response = $this->users->addBookRelation(self::userId, self::bookId, 'read');
        $this->assertTrue($response['success']);
        $this->assertFalse($response['message']);

        $response = $this->users->addBookRelation(self::userId, self::bookId, 'want');
        $this->assertTrue($response['success']);
        $this->assertFalse($response['message']);

        $response = $this->users->addBookRelation(self::userId, self::bookId, 'rent');
        $this->assertTrue($response['success']);
        $this->assertFalse($response['message']);

        $response = $this->users->addBookRelation(self::userId, self::bookId, 'read');
        $this->assertFalse($response['success']);
        $this->assertEquals($response['message'], 'You have already this relation');

        $response = $this->users->addBookRelation(false, self::bookId, 'read');
        $this->assertFalse($response['success']);
        $this->assertEquals($response['message'], 'You must be logged in to complete this action');

        $response = $this->users->addBookRelation(self::userId, 'test', 'read');
        $this->assertFalse($response['success']);
        $this->assertEquals($response['message'], 'Book is not existed');

        $response = $this->users->addBookRelation(self::userId, self::bookId, 'test');
        $this->assertFalse($response['success']);
        $this->assertEquals($response['message'], 'Relation is not existed');
    }

    /**
     * Delete user book relations
     */
    public static function tearDownAfterClass()
    {
        global $db;

        $sql = "DELETE urb.*
                FROM msc.users_rel_books urb
                WHERE user_id = " . self::userId . " AND book_id = '" . self::bookId . "'";

        $db->executeRecord($sql);

        $sql = "DELETE b.*
                FROM msc.books b
                WHERE b.id = '" . self::bookId . "'";

        $db->executeRecord($sql);
    }

}