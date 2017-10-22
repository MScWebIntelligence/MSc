<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 6:27 PM
 */
header('Content-Type: application/json');
require_once '../config.php';
global $CFG, $USER;

$action     = getParam('action', true);
$email      = getParam('email', true);
$password   = getParam('password', true);
$firstname  = getParam('firstname', false);
$lastname   = getParam('lastname', false);
$country    = getParam('country', false);
$city       = getParam('city', false);
$address    = getParam('address', false);

switch ($action) {

    case 'login':
        UsersHelper::login($email, $password);
        break;

    case 'signup':
        UsersHelper::signup($firstname, $lastname, $email, $password, $country, $city);
        break;

    case 'logout':
        UsersHelper::logout();
        break;
}