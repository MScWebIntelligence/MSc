<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 11:57 AM
 */
namespace Classes\User;

use Firebase\JWT\JWT;
use Valitron\Validator;
use Classes\Book\Books;
use Classes\Book\Book;
use Exception;

class Users
{
    private $db;
    private $relations = array('read', 'want', 'rent');

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
     * @param bool $required
     * @return User|int
     */
    public function getLoggedInUser($required = true)
    {
        $jwt        = !empty($_COOKIE['jwt']) ? $_COOKIE['jwt'] : null;
        $decoded    = false;

        try {
            $decoded = JWT::decode($jwt, JWT_ΚΕΥ, array('HS256'));
        } catch (Exception $ex) {

            if ($required) {
                header('HTTP/1.0 401 Unauthorized');
            }
        }

        if ($decoded && ($decoded->exp - time() < 120)) {
            $this->setJWTCookie((int) $decoded->user->userId);
        }

        return $decoded ? new User($decoded->user) : $decoded;
    }

    /**
     * @param $email
     * @param $password
     * @return array
     */
    public function login($email, $password)
    {
        $email      = trim($email) ? trim($email) : null;
        $password   = trim($password) ? trim($password) : null;
        $userId     = 0;
        $message    = false;

        $validator  = new Validator(array(
            'email'     => $email,
            'password'  => $password
        ));

        $validator->labels(array(
            'email'     => 'Email',
            'password'  => 'Password'
        ));

        $validator->rule('required', array('email', 'password'))->message('{field} is required');
        $validator->rule('email', 'email')->message('{field} has not the right format');
        $validator->rule('lengthBetween', 'password', 6, 8)->message('{field}\'s length must be between 6 to 8 characters');

        if ($validator->validate()) {
            $userId = $this->db->login($email, $this->hashPassword($password));

            if ($userId > 0) {
                $this->setJWTCookie($userId);
            } else {
                $message = "Authentication failed. Please try again";
            }

        } else {
            $message = array_values($validator->errors())[0][0];
        }

        return array(
            'userId'    => $userId,
            'message'   => $message
        );
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $password
     * @param $country
     * @param $city
     * @param $address
     * @return array
     */
    public function signup($firstname, $lastname, $email, $password, $country, $city, $address)
    {
        $firstname  = trim($firstname) ? trim($firstname) : null;
        $lastname   = trim($lastname) ? trim($lastname) : null;
        $email      = trim($email) ? trim($email) : null;
        $password   = trim($password) ? trim($password) : null;
        $country    = trim($country) ? trim($country) : null;
        $city       = trim($city) ? trim($city) : null;
        $address    = trim($address) ? trim($address) : null;
        $userId     = 0;
        $message    = false;

        $validator  = new Validator(array(
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'email'     => $email,
            'password'  => $password,
            'country'   => $country,
            'city'      => $city,
            'address'   => $address
        ));

        $validator->labels(array(
            'firstname' => 'Firstname',
            'lastname'  => 'Lastname',
            'email'     => 'Email',
            'password'  => 'Password',
            'country'   => 'Country',
            'city'      => 'City',
            'address'   => 'Address'
        ));

        $validator->rule('required', array('firstname', 'lastname', 'email', 'password', 'country', 'city', 'address'))->message('{field} is required');
        $validator->rule('email', 'email')->message('{field} has not the right format');
        $validator->rule('lengthBetween', array('firstname', 'lastname', 'country', 'city'), 1, 30)->message('{field}\'s length must be between 1 to 30 characters');
        $validator->rule('lengthBetween', array('address'), 1, 80)->message('{field}\'s length must be between 1 to 80 characters');
        $validator->rule('lengthBetween', 'password', 6, 20)->message('{field}\'s length must be between 6 to 20 characters');

        if ($validator->validate()) {

            if (!$this->db->checkEmailIfExists($email)) {

                $userId = $this->db->signup($firstname, $lastname, $email, $this->hashPassword($password), $country, $city, $address);

                if ($userId > 0) {
                    $this->setJWTCookie($userId);
                } else {
                    $message = 'Sign up failed. Try again';
                }

            } else {
                $message = 'Email existed. Choose another email';
            }

        } else {
            $message = array_values($validator->errors())[0][0];
        }

        return array(
            'userId'    => $userId,
            'message'   => $message
        );

    }

    /**
     * Clean cookies
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
     * @return array
     */
    public function addBookRelation($userId, $bookId, $relation)
    {
        $books              = new Books();
        $typeRelation       = in_array($relation, $this->relations);
        $alreadyRelation    = $this->hasBookRelation($userId, $bookId, $relation);
        $message            = !$userId ? 'You must be logged in to complete this action' : ($alreadyRelation ? 'You have already this relation' : (!$typeRelation ? 'Relation is not existed' : false));
        $success            = $userId > 0 && !$alreadyRelation && $typeRelation;

        if ($userId > 0 && !$alreadyRelation && $typeRelation){

            if ($books->getBookById($bookId, 'local')) {
                $success = $this->db->addBookRelation($userId, $bookId, $relation);

            } else {
                $book = $books->getBookById($bookId, 'google');

                if ($book) {
                    $success = $books->addBook($book);

                    if ($success) {
                        $success = $this->db->addBookRelation($userId, $bookId, $relation);
                    }
                } else {
                    $success = false;
                    $message = "Book is not existed";
                }

            }
        }

        return array(
            'success'   => $success,
            'message'   => $message
        );
    }

    /**
     * @param $userId
     * @return Book[]
     */
    public function getBookcase($userId)
    {
        $booksDb    = $this->db->getBookcase($userId);
        $books      = array();

        foreach ($booksDb as $bookDb) {
            $books[] = new Book($bookDb);
        }

        return $books;
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
     * @param $userId
     */
    public function setJWTCookie($userId)
    {
        $jwt = $this->getJWT($userId);
        setcookie('jwt', $jwt, time() + (86400 * 30), "/");
    }

    /**
     * @param $userId
     * @return string
     */
    public function getJWT($userId)
    {
        $user       = $this->getUserById($userId);
        $tokenId    = base64_encode(mcrypt_create_iv(32));
        $issuedAt   = time();
        $notBefore  = $issuedAt;
        $expire     = $notBefore + JWT_EXP;

        $token = array(
            'iat'  => $issuedAt,
            'jti'  => $tokenId,
            'nbf'  => $notBefore,
            'exp'  => $expire,
            'user' => array(
                'id'        => (int) $userId,
                'firstname' => $user->getFirstname(),
                'lastname'  => $user->getLastname()
            )
        );

        return JWT::encode($token, JWT_ΚΕΥ);
    }
}