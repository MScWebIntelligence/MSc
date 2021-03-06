<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/24/2017
 * Time: 8:18 PM
 */
namespace Classes\Book;

use Classes\User\Users;

class BooksHelper
{

    /**
     * BooksHelper constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $search
     * @param int $offset
     */
    public static function search($search, $offset = 0)
    {
        $booksHandler   = new Books();
        $data           = $booksHandler->search($search, $offset);
        $books          = array();

        /** @var Book $book */
        foreach ($data['books'] as $book) {
            $books[] = array(
                'id'            => $book->getId(),
                'title'         => $book->getTitle(),
                'url'           => $book->getUrl(),
                'thumbnail'     => $book->getThumbnail(),
                'description'   => $book->getDescription(144),
                'rate'          => $book->getRate(),
                'author'        => $book->getAuthor()
            );
        }

        echo json_encode(array(
            'total' => $data['total'],
            'more'  => $data['more'],
            'books' => $books
        ));
    }

    /**
     * @param $bookId
     */
    public static function getBook($bookId)
    {
        $data       = array();
        $buttons    = false;
        $books      = new Books();
        $users      = new Users();
        $tmpUser    = $users->getLoggedInUser(false);
        $book       = $books->getBookById($bookId, 'google');

        if ($tmpUser) {
            $buttons    = true;
            $users      = $books->getUsersWhoRentIt($bookId);
        }

        if ($book) {
            $data = array(
                'id'            => $book->getId(),
                'title'         => $book->getTitle(),
                'thumbnail'     => $book->getThumbnail(),
                'description'   => $book->getDescription(),
                'author'        => $book->getAuthor(),
                'rate'          => $book->getRate(),
                'rateCount'     => $book->getRatesCount(),
                'published'     => $book->getPublishedDate(),
                'publisher'     => $book->getPublisher(),
                'pages'         => $book->getPages(),
                'language'      => $book->getLanguage(),
                'buttons'       => $buttons,
                'users'         => $users
            );
        }

        echo json_encode(array(
            'success'   => $book ? true : false,
            'data'      => $data,
            'message'   => $book ? false : "Book not found"
        ));

    }
}