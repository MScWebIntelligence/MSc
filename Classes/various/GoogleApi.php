<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/26/2017
 * Time: 4:59 PM
 */
namespace Classes\Various;

class GoogleApi
{
    const apiKey = "AIzaSyDSF7-xGwuz6exkXAoUpfeTRewzSs855fA";
    const apiUrl = "https://www.googleapis.com/books/v1/volumes/?key=" . self::apiKey;

    /**
     * Google constructor.
     */
    public function __construct()
    {
    }

    public function search($search)
    {
        $search = urlencode("&q={$search}");
        return file_get_contents(self::apiUrl . $search);
    }

    public function getBookById($bookId)
    {
        $data = file_get_contents("https://www.googleapis.com/books/v1/volumes/{$bookId}");
        return json_decode($data);
    }
}