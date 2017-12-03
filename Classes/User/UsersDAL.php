<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 11:58 AM
 */
namespace Classes\User;

class UsersDAL
{
    /**
     * UsersDAL constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $id
     * @return bool|object|\stdClass
     */
    public function getUserById($id)
    {
        global $db;

        $id     = (int) $id;
        $sql    = " SELECT u.id, u.firstname, u.lastname, u.email, u.country, u.city, u.address
                    FROM users u
                    WHERE u.id = {$id}";
        return $db->getRecord($sql);
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password)
    {
        global $db;

        $email      = $db->clearString(trim($email));
        $password   = $db->clearString($password);

        $sql        = " SELECT u.id
                        FROM users u
                        WHERE u.email = '{$email}' AND u.password = '{$password}'";

        return (int) $db->getRecord($sql)->id;
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $password
     * @param $country
     * @param $city
     * @param $address
     * @return int
     */
    public function signup($firstname, $lastname, $email, $password, $country, $city, $address)
    {
        global $db;

        $firstname  = $db->clearString(trim($firstname));
        $lastname   = $db->clearString(trim($lastname));
        $email      = $db->clearString(trim($email));
        $password   = $db->clearString($password);
        $country    = $db->clearString(trim($country));
        $city       = $db->clearString(trim($city));
        $address    = $db->clearString(trim($address));

        $sql = "INSERT INTO users (firstname, lastname, email, password, country, city, address)
                VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$password}', '{$country}', '{$city}', '{$address}')";

        return  (int) $db->insertRecord($sql);
    }

    /**
     * @param $email
     * @return int
     */
    public function checkEmailIfExists($email)
    {
        global $db;

        $email  = $db->clearString(trim($email));
        $sql    = " SELECT u.id
                    FROM users u
                    WHERE u.email = '{$email}'";
        return $db->getRecord($sql) ? true : false;
    }

    /**
     * @param $userId
     * @param $bookId
     * @param $relation
     * @return bool
     */
    public function hasBookRelation($userId, $bookId, $relation)
    {
        global $db;

        $userId     = (int) $userId;
        $bookId     = $db->clearString($bookId);
        $relation   = $db->clearString($relation);

        $sql = "SELECT urb.user_id
                FROM users_rel_books urb
                WHERE urb.user_id = {$userId} AND urb.book_id = '{$bookId}' AND urb.case = '{$relation}'";

        return $db->existsRecord($sql);
    }

    /**
     * @param $userId
     * @param $bookId
     * @param $relation
     * @return bool
     */
    public function addBookRelation($userId, $bookId, $relation)
    {
        global $db;

        $userId     = (int) $userId;
        $bookId     = $db->clearString($bookId);
        $relation   = $db->clearString($relation);

        $sql        = " INSERT INTO users_rel_books (user_id, book_id, `case`)
                        VALUES ({$userId}, '{$bookId}', '{$relation}')";

        return $db->executeRecord($sql);
    }

    /**
     * @param $userId
     * @return array
     */
    public function getBookcase($userId)
    {
        global $db;

        $userId = (int) $userId;

        $sql = "SELECT b.id, urb.case, b.title, b.description, b.thumbnail, b.author, b.pages, b.language, b.rate, b.rates_count, b.publisher, b.published_date
                FROM users_rel_books urb
                INNER JOIN books b
                ON urb.book_id = b.id
                WHERE urb.user_id = {$userId} AND (urb.case = 'read' OR urb.case = 'rent')";

        return $db->getRecords($sql);
    }

}