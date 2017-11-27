<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/24/2017
 * Time: 8:18 PM
 */
namespace Classes\Book;

use stdClass;

class BooksDAL
{

    /**
     * BooksDAL constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $bookId
     * @return bool|object|stdClass
     */
    public function getBookById($bookId)
    {
        global $db;

        $bookId = $db->clearString($bookId);

        $sql    = " SELECT b.id, b.title, b.description, b.thumbnail, b.author, b.pages, b.language, b.rate, b.rates_count, b.publisher, b.published_date
                    FROM books b
                    WHERE b.id = '{$bookId}'";

        return $db->getRecord($sql);
    }

    /**
     * @param $id
     * @param $title
     * @param $description
     * @param $thumbnail
     * @param $author
     * @param $pages
     * @param $language
     * @param $rate
     * @param $ratesCount
     * @param $publisher
     * @param $publishedDate
     * @return bool|mixed
     */
    public function addBook($id, $title, $description, $thumbnail, $author, $pages, $language, $rate, $ratesCount, $publisher, $publishedDate)
    {
        global $db;

        $id             = $db->clearString($id);
        $title          = $db->clearString($title);
        $description    = $db->clearString($description) ? "'{$db->clearString($description)}'" : "NULL";
        $thumbnail      = $db->clearString($thumbnail) ? "'{$db->clearString($thumbnail)}'" : "NULL";
        $author         = $db->clearString($author) ? "'{$db->clearString($author)}'" : "NULL";
        $pages          = (int) $pages;
        $language       = $db->clearString($language) ? "'{$db->clearString($language)}'" : "NULL";
        $rate           = round($rate, 2);
        $ratesCount     = (int) $ratesCount;
        $publisher      = $db->clearString($publisher) ? "'{$db->clearString($publisher)}'" : "NULL";
        $publishedDate  = $db->clearString($publishedDate) ? "'{$db->clearString($publishedDate)}'" : "NULL";

        $sql = "INSERT INTO books (id, title, description, thumbnail, author, pages, language, rate, rates_count, publisher, published_date)
                VALUES ('{$id}', '{$title}', {$description}, {$thumbnail}, {$author}, {$pages}, {$language}, {$rate}, {$ratesCount}, {$publisher}, {$publishedDate})";

        return $db->executeRecord($sql);
    }

}