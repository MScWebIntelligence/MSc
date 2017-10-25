<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/24/2017
 * Time: 8:18 PM
 */

class Books
{
    private $db;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->db = new BooksDAL();
    }

    /**
     * @param $bookId
     * @param $source "Values must be 'local' or 'google'"
     * @return Book | bool
     */
    public function getBookById($bookId, $source = 'local')
    {
        switch ($source) {

            case 'local':
                $data = $this->db->getBookById($bookId);
                break;

            case 'google':
                $data = $this->getBookByApiCall($bookId);
                break;

            default:
                $data = false;
                break;
        }

        return $data ? new Book($data, $source) : false;
    }

    /**
     * @param $book Book()
     * @return bool
     */
    public function addBook($book)
    {
        return $this->db->addBook($book->getId(), $book->getTitle(), $book->getDescription(), $book->getThumbnail(), $book->getAuthor(), $book->getPages(), $book->getLanguage(), $book->getRate(), $book->getRatesCount(), $book->getPublisher(), $book->getPublishedDate());
    }

    /**
     * @param $bookId
     * @return bool|string
     */
    private function getBookByApiCall($bookId)
    {
        $data = file_get_contents("https://www.googleapis.com/books/v1/volumes/{$bookId}");
        return json_decode($data);
    }
}