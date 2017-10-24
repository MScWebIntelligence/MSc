<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 6:27 PM
 */
header('Content-Type: application/json');
require_once '../../config.php';
global $CFG, $USER;

$action     = getParam('action', true);
$email      = getParam('email', false);
$password   = getParam('password', false);
$firstname  = getParam('firstname', false);
$lastname   = getParam('lastname', false);
$country    = getParam('country', false);
$city       = getParam('city', false);
$address    = getParam('address', false);
$bookId     = getParam('bookId', true);

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

    case 'read':
    case 'rent':
    case 'want':
        UsersHelper::addBookRelation($USER->getId(), $bookId, $action);
        break;

}