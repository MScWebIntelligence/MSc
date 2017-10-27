<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/26/2017
 * Time: 4:57 PM
 */
header('Content-Type: application/json');
require_once '../config.php';
use Classes\Book\BooksHelper;

$action = getParam('action', true);
$search = getParam('search', true);
$offset = getParam('offset', false, 'int');

switch ($action) {

    case 'search':
        BooksHelper::search($search, $offset);
        break;

    case 'related':
        break;
}