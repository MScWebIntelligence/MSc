<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/24/2017
 * Time: 8:18 PM
 */
namespace Classes\Book;

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
        $description    = $db->clearString($description);
        $thumbnail      = $db->clearString($thumbnail);
        $author         = $db->clearString($author);
        $pages          = (int) $pages;
        $language       = $db->clearString($language);
        $rate           = round($rate, 2);
        $ratesCount     = (int) $ratesCount;
        $publisher      = $db->clearString($publisher);
        $publishedDate  = $db->clearString($publishedDate);

        $sql = "INSERT INTO msc.books (id, title, description, thumbnail, author, pages, language, rate, rates_count, publisher, published_date)
                VALUES ('{$id}', '{$title}', '{$description}', '{$thumbnail}', '{$author}', {$pages}, '{$language}', {$rate}, {$ratesCount}, '{$publisher}', '{$publishedDate}')";

        return $db->insertRecord($sql);
    }

}