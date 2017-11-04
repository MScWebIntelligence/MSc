<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 11/4/2017
 * Time: 9:16 PM
 */
use PHPUnit\Framework\TestCase;
use Classes\Book\Books;

class BooksTest extends TestCase
{
    private $books;
    const bookId = 'yl4dILkcqm4C';

    /**
     * UsersTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->books = new Books();
    }

    /**
     * Test testGetBook() function
     */
    public function testGetBook()
    {
        global $CFG;

        $book = $this->books->getBookById(self::bookId, 'google');
        $this->assertEquals($book->getTitle(), 'The Lord of the Rings');
        $this->assertEquals($book->getUrl(), "{$CFG->www_root}/book/{$book->getId()}");

        $book = $this->books->getBookById(self::bookId, 'local');
        $this->assertEquals($book->getTitle(), 'The Lord of the Rings');
        $this->assertEquals($book->getUrl(), "{$CFG->www_root}/book/{$book->getId()}");

        $book = $this->books->getBookById('test', 'google');
        $this->assertFalse($book);

        $book = $this->books->getBookById('test', 'local');
        $this->assertFalse($book);
    }

    /**
     * Test search book
     */
    public function testSearchBook()
    {
        $response = $this->books->search('Lord of the rings');
        $this->assertCount(12, $response['books'], 'Error number of books');
        $this->assertTrue($response['more'], 'Error number of books');
        $this->assertGreaterThan(12, $response['total'], 'Error total books');
    }

}