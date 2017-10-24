<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/23/2017
 * Time: 9:00 PM
 */
require_once "../config.php";


$books = new Books();
$book = $books->getBookById('j5jFmAEACAAJ', 'google');
$books->addBook($book);

print_r($book);

//$sql = "select * from users where users.id = 3";
//$row = $db->existsRecord($sql);
//
//print_r($row);
//$page = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=isbn:9789381141977");
//
//$data = json_decode($page, true);
//
//echo "Title = " . $data['items'][0]['volumeInfo']['title'];
//echo "Authors = " . @implode(",", $data['items'][0]['volumeInfo']['authors']);
//echo "Pagecount = " . $data['items'][0]['volumeInfo']['pageCount'];