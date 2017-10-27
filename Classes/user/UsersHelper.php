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
        $userId     = $users->signup($firstname, $lastname, $email, $password, $country, $city);
        $url        = $userId ? "{$CFG->www_root}#user/{$userId}" : false;
        $message    = $userId ? false : "Failed to sign up. Please try again.";

        echo json_encode(array(
            'success'   => $userId != false,
            'url'       => $url,
            'message'   => $message
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
        $userId = self::getLoggedInUserId();

        if ($userId && (!$users->hasBookRelation($userId, $bookId, $relation))){

            if ($books->getBookById($bookId, 'local')) {
                $users->addBookRelation($userId, $bookId, $relation);
            } else {
                $book       = $books->getBookById($bookId, 'google');
                $response   = $books->addBook($book);
                if ($response) $users->addBookRelation($userId, $bookId, $relation);
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

    /**
     * @param bool $required
     * @return bool|object
     */
    public static function getLoggedInUserId($required = true)
    {
        $jwt = $_COOKIE['jwt'];

        try {
            $decoded = JWT::decode($jwt, JWT_ΚΕΥ, array('HS256'));
        } catch (\Exception $ex) {

            if ($required) {
                header('HTTP/1.0 401 Unauthorized');
                die();
            } else {
                $decoded = 0;
            }
        }

        if ($decoded && ($decoded->exp - time() < 15)) {
            $users = new Users();
            $users->setJWTCookie((int) $decoded->data->userId);
        }

        return $decoded ? (int) $decoded->data->userId : 0;
    }
}