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
        $this->description      = $data->description;
        $this->thumbnail        = $data->thumbnail;
        $this->author           = $data->author;
        $this->pages            = (int) $data->pages;
        $this->language         = $data->language;
        $this->rate             = round($data->rate, 2);
        $this->ratesCount       = (int) $data->ratesCount;
        $this->publisher        = $data->publisher;
        $this->publishedDate    = $data->publishedDate;
        $this->case             = $data->case;
    }

    /**
     * @param $data
     */
    private function bindGoogle($data)
    {
        $this->id               = $data->id;
        $this->title            = $data->volumeInfo->title;
        $this->description      = $data->volumeInfo->description;
        $this->thumbnail        = $data->volumeInfo->imageLinks->thumbnail;
        $this->author           = implode(', ', $data->volumeInfo->authors);
        $this->pages            = (int) $data->volumeInfo->pageCount;
        $this->language         = $data->volumeInfo->language;
        $this->rate             = round($data->volumeInfo->averageRating, 2);
        $this->ratesCount       = (int) $data->volumeInfo->ratingsCount;
        $this->publisher        = $data->volumeInfo->publisher;
        $this->publishedDate    = $data->volumeInfo->publishedDate;
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
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
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
}