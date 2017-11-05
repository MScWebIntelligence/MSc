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
        $jwt = $_COOKIE['jwt'];

        try {
            $decoded = JWT::decode($jwt, JWT_ΚΕΥ, array('HS256'));
        } catch (Exception $ex) {

            if ($required) {
                header('HTTP/1.0 401 Unauthorized');
                die();
            } else {
                $decoded = false;
            }
        }

        if ($decoded && ($decoded->exp - time() < 120)) {
            $this->setJWTCookie((int) $decoded->user->userId);
        }

        if ($decoded) {
            return new User($decoded->user);
        } else {
            return false;
        }
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
     * @return array
     */
    public function signup($firstname, $lastname, $email, $password, $country, $city)
    {
        $userId     = 0;
        $message    = false;

        $validator  = new Validator(array(
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'email'     => $email,
            'password'  => $password,
            'country'   => $country,
            'city'      => $city
        ));

        $validator->labels(array(
            'firstname' => 'Firstname',
            'lastname'  => 'Lastname',
            'email'     => 'Email',
            'password'  => 'Password',
            'country'   => 'Country',
            'city'      => 'City'
        ));

        $validator->rule('required', array('firstname', 'lastname', 'email', 'password', 'country', 'city'))->message('{field} is required');
        $validator->rule('lengthBetween', array('firstname', 'lastname', 'country', 'city'), 1, 20)->message('{field}\'s length must be between 1 to 20 characters');
        $validator->rule('email', 'email')->message('{field} has not the right format');
        $validator->rule('lengthBetween', 'password', 6, 8)->message('{field}\'s length must be between 6 to 8 characters');

        if ($validator->validate()) {

            if (!$this->db->checkEmailIfExists($email)) {
                $userId = $this->db->signup($firstname, $lastname, $email, $this->hashPassword($password), $country, $city);
            } else {
                $message = 'Email existed. Choose another email';
            }

            if ($userId > 0) {
                $this->setJWTCookie($userId);
            } else {
                $message = 'Sign up failed. Try again';
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