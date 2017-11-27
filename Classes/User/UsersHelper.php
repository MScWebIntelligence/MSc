<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 6:36 PM
 */
namespace Classes\User;

use Classes\Book\Book;
use Classes\Various\International;

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
     * @param $address
     */
    public static function signup($firstname, $lastname, $email, $password, $country, $city, $address)
    {
        global $CFG;

        $users      = new Users();
        $response   = $users->signup($firstname, $lastname, $email, $password, $country, $city, $address);
        $url        = $response['userId'] ? "{$CFG->www_root}#user/{$response['userId']}" : false;

        echo json_encode(array(
            'success'   => $response['userId'] != false,
            'url'       => $url,
            'message'   => $response['message']
        ));
    }

    /**
     * Logout user and clear cookie
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

        $users      = new Users();
        $user       = $users->getLoggedInUser(false);
        $response   = $users->addBookRelation($user->getId(), $bookId, $relation);

        echo json_encode(array(
            'success'   => $response['success'],
            'url'       => false,
            'message'   => $response['message']
        ));
    }

    /**
     * @param $userId
     */
    public static function getProfile($userId)
    {
        $users      = new Users();
        $user       = $users->getUserById($userId);
        $profile    = array();
        $read       = array();
        $rent       = array();

        if ($user) {
            $books      = $users->getBookcase($userId);
            $profile    = array(
                'id'        => $user->getId(),
                'firstname' => $user->getFirstname(),
                'lastname'  => $user->getLastname(),
                'email'     => $user->getEmail()
            );

            /** @var Book $book */
            foreach ($books as $book) {

                if ($book->getCase() == 'read') {
                    $read[] = array(
                        'id'            => $book->getId(),
                        'title'         => $book->getTitle(),
                        'case'          => $book->getCase(),
                        'description'   => $book->getDescription(),
                        'thumbnail'     => $book->getThumbnail(),
                        'url'           => $book->getUrl()
                    );
                } elseif ($book->getCase() == 'rent') {
                    $rent[] = array(
                        'id'            => $book->getId(),
                        'title'         => $book->getTitle(),
                        'case'          => $book->getCase(),
                        'description'   => $book->getDescription(),
                        'thumbnail'     => $book->getThumbnail(),
                        'url'           => $book->getUrl()
                    );
                }

            }
        }

        echo json_encode(array(
            'success'   => $user ? true : false,
            'data'      => array(
                'profile'   => $profile,
                'bookcase'  => array(
                    'read'      => $read,
                    'rent'      => $rent
                ),
            ),
            'message'   => $user ? false : 'User does not exist.'
        ));
    }

    /**
     *
     */
    public static function getLocations()
    {
        echo json_encode(array(
            'success'   => true,
            'data'      => array(
                'countries' => International::getGreece(),
                'states'    => International::getStates()
            ),
            'message'   => false
        ));
    }
}