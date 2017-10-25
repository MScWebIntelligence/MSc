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

$tokenId    = base64_encode(mcrypt_create_iv(32));
$issuedAt   = time();
$notBefore  = $issuedAt + 2;             //Adding 10 seconds
$expire     = $notBefore + 5;            // Adding 60 seconds

$token = [
    'iat'  => $issuedAt,         // Issued at: time when the token was generated
    'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
    'nbf'  => $notBefore,        // Not before
    'exp'  => $expire,           // Expire
    'data' => [                  // Data related to the signer user
        'userId'   => 1, // userid from the users table
        'userName' => "Vaggelis Kotrotsios" // User name
    ]
];

/**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
 */
//$jwt = JWT::encode($token, $key);
//die($jwt);

try {
    $decoded = JWT::decode("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1MDg5NTkwNDMsImp0aSI6InM4YklsOVZ6SDA4T3hIeXpjWmtuT0R0TDFQMVdrZEhnaVR1U3Y4dHpKM3M9IiwibmJmIjoxNTA4OTU5MDQ1LCJleHAiOjE1MDg5NTkwNTAsImRhdGEiOnsidXNlcklkIjoxLCJ1c2VyTmFtZSI6IlZhZ2dlbGlzIEtvdHJvdHNpb3MifX0.kVM8hxtQV5EwgyBKHaNAaYCFkEM4L99luSORhEeJVT0", $key, array('HS256'));
} catch (Exception $ex) {
    /*
     * the token was not able to be decoded.
     * this is likely because the signature was not able to be verified (tampered token)
     */
    header('HTTP/1.0 401 Unauthorized');
}

print_r($decoded);
die();
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