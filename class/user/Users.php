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
     * @return bool | User
     */
    public function getUserById($id)
    {
        $data = $this->db->getUserById($id);
        return $data ? new User($data) : false;
    }

    /**
     * @param $email
     * @param $password
     * @return bool|object|stdClass
     */
    public function login($email, $password)
    {
        $userId = $this->db->login($email, $this->hashPassword($password));

        if ($userId > 0) {
            $this->setSession($userId);
        }

        return $userId > 0 ? $userId : false;
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
        $userId = false;

        if (!$this->db->checkEmailIfExists($email) && $this->isDataValid($firstname, $lastname, $email, $password, $country, $city)) {
            $userId = $this->db->signup($firstname, $lastname, $email, $this->hashPassword($password), $country, $city);
        }

        if ($userId > 0) {
            $this->setSession($userId);
        }

        return $userId > 0 ? $userId : false;
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
     * @param $userId
     * @param $bookId
     * @param $relation
     * @return bool
     */
    public function hasBookRelation($userId, $bookId, $relation)
    {
        return $this->db->hasBookRelation($userId, $bookId, $relation);
    }

    /**
     * @param $userId
     * @param $bookId
     * @param $relation
     * @return bool
     */
    public function addBookRelation($userId, $bookId, $relation)
    {
        return $this->db->addBookRelation($userId, $bookId, $relation);
    }

    /**
     * @param $password
     * @return string
     */
    private function hashPassword($password)
    {
        return sha1(md5(SALT2 . $password . SALT1));
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
    private function isDataValid($firstname, $lastname, $email, $password, $country, $city)
    {
        if ($firstname && $lastname && $email && $password && $country && $city) {
            return true;
        }

         return false;
    }

    /**
     * @param $userId
     */
    private function setSession($userId)
    {
        $_SESSION['user_id']        = (int) $userId;
        $_SESSION['user_timeout']   = time() + SESSION_TIMEOUT_SECS;
    }
}