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
     * @return bool|User
     */
//    public static function getLoggedInUser()
//    {
//        if(!isset($_SESSION['user_id'])) {
//            session_start();
//        }
//
//        //If session is empty go to logout
//        if (empty($_SESSION['user_id'])) {
//            return false;
//
//        } else {
//
//            //If user's time expired go to logout
//            if ($_SESSION['user_timeout'] < time()) {
//                $users = new Users();
//                $users->logout();
//                return false;
//
//            } elseif (isset($_SESSION['user_id']) && isset($_SESSION['user_timeout'])) {
//                $_SESSION['user_timeout']   = time() + SESSION_TIMEOUT_SECS;
//                $users                      = new Users();
//                return $users->getUserById($_SESSION['user_id']);
//
//            } else {
//                return false;
//            }
//        }
//    }

    /**
     * @param $email
     * @param $password
     */
    public static function login($email, $password)
    {
        global $CFG;

        $users      = new Users();
        $jwt        = $users->login($email, $password);
        $userId     = self::getLoggedInUserId($jwt);
        $url        = $userId ? "{$CFG->www_root}#user/{$userId}" : false;
        $message    = $userId ? false : "Authentication failed. Please try again.";

        echo json_encode(array(
            'success'   => $userId != false,
            'jwt'       => $jwt,
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
        $id         = $users->signup($firstname, $lastname, $email, $password, $country, $city);
        $url        = $id ? "{$CFG->www_root}#user/{$id}" : false;
        $message    = $id ? false : "Failed to sign up. Please try again.";

        echo json_encode(array(
            'success'   => $id != false,
            'url'       => $url,
            'message'   => $message
        ));
    }

    /**
     *
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
     * @param $userId
     * @param $bookId
     * @param $relation
     */
    public static function addBookRelation($userId, $bookId, $relation)
    {
        global $CFG;

        $users  = new Users();
        $books  = new Books();

        if (!$users->hasBookRelation($userId, $bookId, $relation)){

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
     * @param $jwt
     * @return bool|object
     */
    public static function getLoggedInUserId($jwt)
    {
        try {
            $decoded = JWT::decode($jwt, JWT_ΚΕΥ, array('HS256'));
        } catch (Exception $ex) {
            /*
             * the token was not able to be decoded.
             * this is likely because the signature was not able to be verified (tampered token)
             */
            $decoded = false;
        }

        return $decoded;
    }

}