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
        $response = $this->users->getUserById(1);
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
        $response = $this->users->login('vako88@gmail.com', '123456');
        $this->assertEquals($response['userId'], 1);

        $response = $this->users->login('vako888@gmail.com', '123456');
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Authentication failed. Please try again');

        $response = $this->users->login('vako88@gmail.com', '1234567');
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Authentication failed. Please try again');

        $response = $this->users->login('vako88@gmail', '123456');
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Email has not the right format');

        $response = $this->users->login('vako88@gmail.com', '123456789');
        $this->assertEquals($response['userId'], 0);
        $this->assertEquals($response['message'], 'Password\'s length must be between 6 to 8 characters');
    }

    /**
     * Test all login cases
     */
    public function testAddBook()
    {
        $response = $this->users->addBookRelation(1, 'yl4dILkcqm4C', 'read');
        $this->assertTrue($response['success']);
        $this->assertFalse($response['message']);

        $response = $this->users->addBookRelation(1, 'yl4dILkcqm4C', 'read');
        $this->assertFalse($response['success']);
        $this->assertEquals($response['message'], 'You have already this relation');

        $response = $this->users->addBookRelation(false, 'yl4dILkcqm4C', 'read');
        $this->assertFalse($response['success']);
        $this->assertEquals($response['message'], 'You must be logged in to complete this action');

        $response = $this->users->addBookRelation(1, 'test', 'read');
        $this->assertFalse($response['success']);
        $this->assertEquals($response['message'], 'Book is not existed');

        $response = $this->users->addBookRelation(1, 'yl4dILkcqm4C', 'test');
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
                WHERE user_id = 1 AND book_id = 'yl4dILkcqm4C' AND urb.case = 'read'";

        $db->executeRecord($sql);
    }

}