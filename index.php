<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/14/2017
 * Time: 9:41 PM
 */
require_once 'config.php';

global $CFG;

$users  = new Users();
$user   = $users->getUserById(1);

echo $user->getFirstname() . "<br>";

echo $CFG->www_root . "<br>";

echo "<h1>Hello World!</h1>";

?>