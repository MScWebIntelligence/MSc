<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/27/2017
 * Time: 1:44 PM
 *
 *
 * Generic
 * https://www.googleapis.com/books/v1/{collectionName}/resourceID?parameters
 *
 * q - Search for volumes that contain this text string. There are special keywords you can specify in the search terms to search in particular fields, such as:
 *      intitle:        Returns results where the text following this keyword is found in the title.
 *      inauthor:       Returns results where the text following this keyword is found in the author.
 *      inpublisher:    Returns results where the text following this keyword is found in the publisher.
 *      subject:        Returns results where the text following this keyword is listed in the category list of the volume.
 *      isbn:           Returns results where the text following this keyword is the ISBN number.
 *      lccn:           Returns results where the text following this keyword is the Library of Congress Control Number.
 *      oclc:           Returns results where the text following this keyword is the Online Computer Library Center number.
 *
 *
 * Pagination
 *      startIndex - The position in the collection at which to start. The index of the first item is 0.
 *      maxResults - The maximum number of results to return. The default is 10, and the maximum allowable value is 40.
 *
 *
 * You can use the projection parameter with one of the following values to specify a predefined set of Volume fields to return:
 *      full - Returns all Volume fields.
 *      lite - Returns only certain fields. See field descriptions marked with double asterisks in the Volume reference to find out which fields are included.
 *
 *
 * Example:
 * https://www.googleapis.com/books/v1/volumes?q=flowers+inauthor:keyes&key=yourAPIKey
 *
 */
namespace Classes\Various;

class Google
{

    private $apiKey,
            $apiUrl;

    static $limit = 12;
    /**
     * Google constructor.
     */
    public function __construct()
    {
        $this->apiKey   = "AIzaSyDSF7-xGwuz6exkXAoUpfeTRewzSs855fA";
        $this->apiUrl   = "https://www.googleapis.com/books/v1/volumes/";
    }

    /**
     * @param $search
     * @param int $offset
     * @return mixed
     */
    public function search($search, $offset = 0)
    {
        $offset         = (int) $offset;
        $search         = urlencode(trim($search));
        $searchParam    = "&q={$search}";
        $limitParam     = "&maxResults=" . (self::$limit + 1);
        $offsetParam    = "&startIndex={$offset}";
        $projection     = "&projection=lite";
        $query          = $searchParam . $limitParam . $offsetParam . $projection;
        return $search ? $this->fire(null, $query) : array();
    }

    /**
     * @param $bookId
     * @return mixed
     */
    public function getBookById($bookId)
    {
        return $this->fire($bookId, null);
    }

    /**
     * @param null $bookId
     * @param null $query
     * @return mixed
     */
    private function fire($bookId = null, $query = null)
    {
        $key = "?key={$this->apiKey}";
        return json_decode(file_get_contents("{$this->apiUrl}{$bookId}{$key}{$query}"));
    }
}