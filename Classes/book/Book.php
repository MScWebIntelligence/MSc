<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/23/2017
 * Time: 8:28 PM
 */
namespace Classes\Book;

class Book
{
    private $id,
            $title,
            $description,
            $thumbnail,
            $defaultThumbnail,
            $author,
            $pages,
            $language,
            $rate,
            $ratesCount,
            $publisher,
            $publishedDate,
            $case;

    /**
     * Book constructor.
     * @param $data
     * @param string $source
     */
    public function __construct($data, $source = 'local')
    {
        global $CFG;

        $this->defaultThumbnail = "{$CFG->www_root}/client/assets/img/books/no-cover.jpg";

        switch ($source) {

            case 'local':
                $this->bindLocal($data);
                break;

            case 'google':
                $this->bindGoogle($data);
                break;

        }
    }

    /**
     * @param $data
     */
    private function bindLocal($data)
    {
        $this->id               = $data->id;
        $this->title            = $data->title;
        $this->description      = !empty($data->description) ? $data->description: false;
        $this->thumbnail        = !empty($data->thumbnail) ? str_replace("http://", "https://", $data->thumbnail) : false;
        $this->author           = !empty($data->author) ? $data->author : false;
        $this->pages            = !empty($data->pages) ? (int) $data->pages : false;
        $this->language         = !empty($data->language) ? $data->language : false;
        $this->rate             = !empty($data->rate) ? round($data->rate, 2) : false;
        $this->ratesCount       = !empty($data->ratesCount) ? (int) $data->ratesCount : false;
        $this->publisher        = !empty($data->publisher) ? $data->publisher: false;
        $this->publishedDate    = !empty($data->publishedDate) ? $data->publishedDate : false;
        $this->case             = !empty($data->case) ? $data->case : null;
    }

    /**
     * @param $data
     */
    private function bindGoogle($data)
    {
        $this->id               = $data->id;
        $this->title            = $data->volumeInfo->title;
        $this->description      = !empty($data->volumeInfo->description) ? $data->volumeInfo->description : false;
        $this->thumbnail        = !empty($data->volumeInfo->imageLinks->thumbnail) ? str_replace("http://", "https://", $data->volumeInfo->imageLinks->thumbnail) : false;
        $this->author           = !empty($data->volumeInfo->authors) ? implode(', ', $data->volumeInfo->authors) : false;
        $this->pages            = !empty($data->volumeInfo->pageCount) ? (int) $data->volumeInfo->pageCount : false;
        $this->language         = !empty($data->volumeInfo->language) ? $data->volumeInfo->language : false;
        $this->rate             = !empty($data->volumeInfo->averageRating) ? round($data->volumeInfo->averageRating, 2) : false;
        $this->ratesCount       = !empty($data->volumeInfo->ratingsCount) ? (int) $data->volumeInfo->ratingsCount : false;
        $this->publisher        = !empty($data->volumeInfo->publisher) ? $data->volumeInfo->publisher : false;
        $this->publishedDate    = !empty($data->volumeInfo->publishedDate) ? $data->volumeInfo->publishedDate : false;
        $this->case             = null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param int $chars
     * @return mixed
     */
    public function getDescription($chars = 0)
    {
        return $chars > 0 ? mb_substr($this->description, 0, $chars, 'UTF-8') . "..." : $this->description;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail ? $this->thumbnail : $this->defaultThumbnail;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @return mixed
     */
    public function getRatesCount()
    {
        return $this->ratesCount;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @return mixed
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

    /**
     * @return mixed
     */
    public function getCase()
    {
        return $this->case;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        global $CFG;
        return "{$CFG->www_root}/book/{$this->id}";
    }
}