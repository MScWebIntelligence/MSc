<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 11:58 AM
 */

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
     * @return bool|object|stdClass
     */
    public function getUserById($id)
    {
        global $db;

        $id     = (int) $id;
        $sql    = " SELECT u.id, u.firstname, u.lastname, u.email
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
     * @return int
     */
    public function signup($firstname, $lastname, $email, $password, $country, $city)
    {
        global $db;

        $firstname  = $db->clearString(trim($firstname));
        $lastname   = $db->clearString(trim($lastname));
        $email      = $db->clearString(trim($email));
        $password   = $db->clearString($password);
        $country    = $db->clearString(trim($email));
        $city       = $db->clearString(trim($email));

        $sql = "INSERT INTO msc.users (firstname,lastname,email,password)
                VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$password}')";

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

}