<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 6:36 PM
 */

class UsersHelper
{

    /**
     * UsersHelper constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $email
     * @param $password
     */
    public static function login($email, $password)
    {
        global $CFG;

        $users      = new Users();
        $id         = $users->login($email, $password);
        $url        = $id ? "{$CFG->www_root}/user/{$id}" : false;
        $message    = $id ? false : "Authentication failed. Please try again.";

        echo json_encode(array(
            'success'   => $id != false,
            'url'       => $url,
            'message'   => $message
        ));
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $password
     * @param $country
     * @param $city
     */
    public static function signup($firstname, $lastname, $email, $password, $country, $city)
    {
        global $CFG;

        $users      = new Users();
        $id         = $users->signup($firstname, $lastname, $email, $password, $country, $city);
        $url        = $id ? "{$CFG->www_root}user/{$id}" : false;
        $message    = $id ? false : "Failed to sign up. Please try again.";

        echo json_encode(array(
            'success'   => $id != false,
            'url'       => $url,
            'message'   => $message
        ));
    }

    /**
     *
     */
    public static function logout()
    {
        global $CFG;
        $users = new Users();
        $users->logout();

        echo json_encode(array(
            'success'   => true,
            'url'       => "{$CFG->www_root}",
            'message'   => false
        ));
    }

}