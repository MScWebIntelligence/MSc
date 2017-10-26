<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 6:27 PM
 */
header('Content-Type: application/json');
require_once '../config.php';
global $CFG;

use Classes\User\UsersHelper;

$action     = getParam('action', true);
$userId     = getParam('userId', false);
$email      = getParam('email', false);
$password   = getParam('password', false);
$firstname  = getParam('firstname', false);
$lastname   = getParam('lastname', false);
$country    = getParam('country', false);
$city       = getParam('city', false);
$address    = getParam('address', false);
$bookId     = getParam('bookId', false);

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
        UsersHelper::addBookRelation($bookId, $action);
        break;

    case 'bookcase':
        UsersHelper::getBookcase(1);
        break;
}