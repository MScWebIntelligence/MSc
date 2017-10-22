<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 11:57 AM
 */
class Users
{
    private $db;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->db = new UsersDAL();
    }

    /**
     * @param $id
     * @return User()
     */
    public function getUserById($id)
    {
        $data = $this->db->getUserById($id);
        return new User($data);
    }

}