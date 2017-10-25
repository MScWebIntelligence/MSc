<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 11:57 AM
 */

use Firebase\JWT\JWT;

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
        $jwt    = false;
        $userId = $this->db->login($email, $this->hashPassword($password));

        if ($userId > 0) {
            // $this->setSession($userId);
            $jwt = $this->getJWT($userId);
        }

        setcookie('jwt', $jwt, time() + (86400 * 30), "/");

        return $jwt;
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
        $jwt    = false;
        $userId = false;

        if (!$this->db->checkEmailIfExists($email) && $this->isDataValid($firstname, $lastname, $email, $password, $country, $city)) {
            $userId = $this->db->signup($firstname, $lastname, $email, $this->hashPassword($password), $country, $city);
        }

        if ($userId > 0) {
            // $this->setSession($userId);
            $jwt = $this->getJWT($userId);
        }

        return $jwt;
    }

    /**
     *
     */
    public function logout()
    {
        unset($_COOKIE['jwt']);

        /*        
        global $USER;

        if(!isset($_SESSION)) {
            session_start();
        }

        if (session_destroy()) {
            return true;
        }

        unset($USER);
        return false;
        */
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
//    private function setSession($userId)
//    {
//        $_SESSION['user_id']        = (int) $userId;
//        $_SESSION['user_timeout']   = time() + SESSION_TIMEOUT_SECS;
//    }

    /**
     * @param $userId
     * @return string
     */
    private function getJWT($userId)
    {
        $tokenId    = base64_encode(mcrypt_create_iv(32));
        $issuedAt   = time();
        $notBefore  = $issuedAt + 10;             //Adding 10 seconds
        $expire     = $notBefore + 20;            // Adding 60 seconds

        $token = array(
            'iat'  => $issuedAt,         // Issued at: time when the token was generated
            'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
            'nbf'  => $notBefore,        // Not before
            'exp'  => $expire,           // Expire
            'data' => array(                  // Data related to the signer user
                'userId'   => (int) $userId // userid from the users table
            )
        );

        return JWT::encode($token, JWT_ΚΕΥ);
    }
}