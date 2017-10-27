<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 6:36 PM
 */
namespace Classes\User;

use Classes\Book\Book;
use Classes\Book\Books;
use Firebase\JWT\JWT;

class UsersHelper
{

    /**
     * UsersHelper constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $email
     * @param $password
     */
    public static function login($email, $password)
    {
        global $CFG;

        $users      = new Users();
        $response   = $users->login($email, $password);
        $url        = $response['userId'] ? "{$CFG->www_root}#user/{$response['userId']}" : false;

        echo json_encode(array(
            'success'   => $response['userId'] != false,
            'url'       => $url,
            'message'   => $response['message']
        ));
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $password
     * @param $country
     * @param $city
     */
    public static function signup($firstname, $lastname, $email, $password, $country, $city)
    {
        global $CFG;

        $users      = new Users();
        $response   = $users->signup($firstname, $lastname, $email, $password, $country, $city);
        $url        = $response['userId'] ? "{$CFG->www_root}#user/{$response['userId']}" : false;

        echo json_encode(array(
            'success'   => $response['userId'] != false,
            'url'       => $url,
            'message'   => $response['message']
        ));
    }

    /**
     * Remove cookie with JWT
     */
    public static function logout()
    {
        global $CFG;

        $users = new Users();
        $users->logout();

        echo json_encode(array(
            'success'   => true,
            'url'       => "{$CFG->www_root}",
            'message'   => false
        ));
    }

    /**
     * Returns logged in user if exists as JSON
     */
    public static function getLoggedInUser()
    {
        $users  = new Users();
        $user   = $users->getLoggedInUser(false);

        echo json_encode(array(
            'logged'    => $user ? $user->getId() > 0 : false,
            'id'        => $user ? $user->getId() : false,
            'firstname' => $user ? $user->getFirstname() : false,
            'lastname'  => $user ? $user->getLastname() : false
        ));
    }

    /**
     * Use case:
     *  1. Check if relation exists END
     *  2. Check if book exists
     *      2.1 If book exists add relation END
     *      2.2 If book doesnt exist add book
     *          2.2.1 Add Relation END
     *
     * @param $bookId
     * @param $relation
     */
    public static function addBookRelation($bookId, $relation)
    {
        global $CFG;

        $users  = new Users();
        $books  = new Books();
        $user   = $users->getLoggedInUser(false);

        if ($user && (!$users->hasBookRelation($user->getId(), $bookId, $relation))){

            if ($books->getBookById($bookId, 'local')) {
                $users->addBookRelation($user->getId(), $bookId, $relation);

            } else {
                $book       = $books->getBookById($bookId, 'google');
                $response   = $books->addBook($book);

                if ($response) {
                    $users->addBookRelation($user->getId(), $bookId, $relation);
                }
            }
        }

        echo json_encode(array(
            'success'   => true,
            'url'       => "{$CFG->www_root}",
            'message'   => false
        ));
    }

    /**
     * @param $userId
     */
    public static function getBookcase($userId)
    {
        $users      = new Users();
        $books      = $users->getBookcase($userId);
        $response   = array();

        /** @var Book $book */
        foreach ($books as $book) {
            $response[] = array(
                'id'    => $book->getId(),
                'title' => $book->getTitle(),
                'case'  => $book->getCase()
            );
        }

        echo json_encode(array(
            'success'   => true,
            'data'      => $response,
            'message'   => false
        ));
    }
}