<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 6:36 PM
 */

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
        $userId     = $users->login($email, $password);
        $url        = $userId ? "{$CFG->www_root}#user/{$userId}" : false;
        $message    = $userId ? false : "Authentication failed. Please try again.";

        echo json_encode(array(
            'success'   => $userId != false,
            'url'       => $url,
            'message'   => $message
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
     * @param bool $required
     * @return bool|object
     */
    private static function getLoggedInUserId($required = true)
    {
        $jwt = $_COOKIE['jwt'];

        try {
            $decoded = JWT::decode($jwt, JWT_ΚΕΥ, array('HS256'));
        } catch (Exception $ex) {

            if ($required) {
                header('HTTP/1.0 401 Unauthorized');
                die();
            } else {
                $decoded = 0;
            }
        }

        return $decoded > 0 ? (int) $decoded->data->userId : 0;
    }

}