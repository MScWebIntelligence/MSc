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

}