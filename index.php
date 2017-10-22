<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/14/2017
 * Time: 9:41 PM
 */
require_once 'config.php';

$users  = new Users();
$user   = $users->getUserById(1);

print_r($user->getFirstname());

echo 'Welcome Team!!';