<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/14/2017
 * Time: 9:41 PM
 */
require_once 'config.php';
$sql    = " SELECT * 
            FROM users u 
            WHERE u.id = 1";
$data   = Db::getRecords($sql);

print_r($data);
echo 'Welcome Team!!';