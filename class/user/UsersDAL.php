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
        $id     = (int) $id;
        $sql    = " SELECT u.id, u.firstname, u.lastname, u.email
                    FROM users u
                    WHERE u.id = {$id}";
        return Db::getRecord($sql);
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password)
    {
        $email      = Db::clearString(trim($email));
        $password   = Db::clearString($password);

        $sql        = " SELECT u.id
                        FROM users u
                        WHERE u.email = '{$email}' AND u.password = '{$password}'";

        return (int) Db::getRecord($sql)->id;
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
        $firstname  = Db::clearString(trim($firstname));
        $lastname   = Db::clearString(trim($lastname));
        $email      = Db::clearString(trim($email));
        $password   = Db::clearString($password);
        $country    = Db::clearString(trim($email));
        $city       = Db::clearString(trim($email));

        $sql = "INSERT INTO msc.users (firstname,lastname,email,password)
                VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$password}')";

        return  (int) Db::insertRecord($sql);
    }

    /**
     * @param $email
     * @return int
     */
    public function checkEmailIfExists($email)
    {
        $email  = Db::clearString(trim($email));
        $sql    = " SELECT u.id
                    FROM users u
                    WHERE u.email = '{$email}'";
        return Db::getRecord($sql) ? true : false;
    }

}