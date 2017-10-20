<?php
/**
 * Created by PhpStorm.
 * User: vaggelis Kostopoulos
 * Date: 20/10/2017
 * Time: 11:13 μμ
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
$sql    = "SELECT *
            FROM users";
$data   = Db::getRecords($sql);

echo json_encode($data);
?>