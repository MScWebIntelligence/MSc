<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/14/2017
 * Time: 9:41 PM
 */
require_once 'config.php';


// your API key here
$API_KEY = 'AIzaSyDSF7-xGwuz6exkXAoUpfeTRewzSs855fA';

$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setDeveloperKey($API_KEY);

$service = new Google_Service_Books($client);
$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

foreach ($results as $item) {
    echo $item['volumeInfo']['title'], "<br /> \n";
}

//$books  = new \Classes\Book\Books();
//$book   = $books->getBookById("-8DhHgAACAAJ", 'google');
//$books->addBook($book);
//die();