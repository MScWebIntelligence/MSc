<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/14/2017
 * Time: 9:41 PM
 */
require_once 'config.php';

$books  = new \Classes\Book\Books();
$book   = $books->getBookById("-8DhHgAACAAJ", 'google');
$books->addBook($book);
die();