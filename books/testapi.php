<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/23/2017
 * Time: 9:00 PM
 */
require_once "../config.php";

use \Firebase\JWT\JWT;

$key = "example_key";
$token = array(
    "iss" => "http://example.org",
    "aud" => "http://example.com",
    "iat" => 1356999524,
    "nbf" => 1357000000
);

/**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
 */
$jwt = JWT::encode($token, $key);
$decoded = JWT::decode($jwt, $key, array('HS256'));

print_r($decoded);

/*
 NOTE: This will now be an object instead of an associative array. To get
 an associative array, you will need to cast it as such:
*/

$decoded_array = (array) $decoded;

/**
 * You can add a leeway to account for when there is a clock skew times between
 * the signing and verifying servers. It is recommended that this leeway should
 * not be bigger than a few minutes.
 *
 * Source: http://self-issued.info/docs/draft-ietf-oauth-json-web-token.html#nbfDef
 */
JWT::$leeway = 60; // $leeway in seconds
$decoded = JWT::decode($jwt, $key, array('HS256'));









//$books = new Books();
//$book = $books->getBookById('j5jFmAEACAAJ', 'google');
//$books->addBook($book);
//
//print_r($book);

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