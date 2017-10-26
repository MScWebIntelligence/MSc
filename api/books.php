<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/26/2017
 * Time: 4:57 PM
 */
header('Content-Type: application/json');
require_once '../config.php';
global $CFG;

$action = getParam('action', true);

switch ($action) {

    case 'search':
        break;

    case 'related':
        break;
}