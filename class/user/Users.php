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
            $jwt = $this->getJWT($userId);
            setcookie('jwt', $jwt, time() + (86400 * 30), "/");
        }

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
        setcookie('jwt', '', time() + (86400 * 30), "/");
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
     * @return string
     */
    private function getJWT($userId)
    {
        $tokenId    = base64_encode(mcrypt_create_iv(32));
        $issuedAt   = time();
        $notBefore  = $issuedAt;
        $expire     = $notBefore + JWT_EXP;

        $token = array(
            'iat'  => $issuedAt,
            'jti'  => $tokenId,
            'nbf'  => $notBefore,
            'exp'  => $expire,
            'data' => array(
                'userId'   => (int) $userId
            )
        );

        return JWT::encode($token, JWT_ΚΕΥ);
    }
}