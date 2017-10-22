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
        $id = $this->db->login($email, $this->hashPassword($password));

        if ($id > 0) {
            $_SESSION['user_id']        = $id;
            $_SESSION['user_timeout']   = time() + SESSION_TIMEOUT_SECS;
        }

        return $id > 0 ? $id : false;
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
        $id = false;

        if (!$this->db->checkEmailIfExists($email)) {
            $id = $this->db->signup($firstname, $lastname, $email, $this->hashPassword($password), $country, $city);
        }

        if ($id > 0) {
            $_SESSION['user_id']        = $id;
            $_SESSION['user_timeout']   = time() + SESSION_TIMEOUT_SECS;
        }

        return $id > 0 ? $id : false;
    }

    /**
     * @return bool
     */
    public function logout()
    {
        global $USER;

        if(!isset($_SESSION)) {
            session_start();
        }

        if (session_destroy()) {
            return true;
        }

        unset($USER);
        return false;
    }

    /**
     * @param $password
     * @return string
     */
    private function hashPassword($password)
    {
        return sha1(md5(SALT2 . $password . SALT1));
    }

}