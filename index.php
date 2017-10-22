<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/14/2017
 * Time: 9:41 PM
 */
require_once 'config.php';

global $CFG, $USER;

$users  = new Users();
//$users->logout();

$login  = $users->login('vako88@gmail.com', '123456');

//$users->signup('Giannis', 'Kostopoulos', 'vako88fr@gmail.com', '123456',  'Greece', 'Thessaloniki');
//$user   = $users->getUserById(13);
//echo $user->getFirstname() . "<br>";

echo $CFG->www_root . "<br>";

echo "<h1>Hello World!</h1>";

?>