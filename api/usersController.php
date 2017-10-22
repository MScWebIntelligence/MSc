<?php
/**
 * Created by PhpStorm.
 * User: Vangelis Kostopoulos
 * Date: 22/10/2017
 * Time: 12:06 μμ
 */

if (!isset($_GET['action'])) {
    echo "Missing the action param!";
}

require_once '../config.php';

$sql = "";
switch ($_GET['action']) {
    case "getAll":
        $sql = "SELECT *
            FROM users";
        break;
    case "getById":
        $sql = "SELECT *
            FROM users
            WHERE id =" . $_GET['id'];
    default:
        $sql = "SELECT *
            FROM users";
}
$data = Db::getRecords($sql);
echo json_encode($data);
?>