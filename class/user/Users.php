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

    /**
     * @param $email
     * @param $password
     * @return bool|object|stdClass
     */
    public function login($email, $password)
    {
        $response   = false;
        $id         = $this->db->login($email, $password);

        if ($id > 0) {
            $_SESSION['user_id']        = $id;
            $_SESSION['user_timeout']   = time() + SESSION_TIMEOUT_SECS;
            $response                   = true;
        }

        return $response;
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $password
     * @param $country
     * @param $city
     * @return bool
     */
    public function signup($firstname, $lastname, $email, $password, $country, $city)
    {
        $response   = false;
        $id         = $this->db->signup($firstname, $lastname, $email, $password, $country, $city);

        if ($id > 0) {
            $_SESSION['user_id']        = $id;
            $_SESSION['user_timeout']   = time() + SESSION_TIMEOUT_SECS;
            $response                   = true;
        }

        return $response;
    }

    /**
     * @return bool
     */
    public function logout()
    {
        if(!isset($_SESSION)) {
            session_start();
        }

        if (session_destroy()) {
            return true;
        }

        return false;
    }

}