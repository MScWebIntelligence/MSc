<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/23/2017
 * Time: 8:28 PM
 */

class Book
{
    private $id,
            $title;

    /**
     * Book constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->bind($data);
    }

    /**
     * @param $data
     */
    private function bind($data)
    {
        $this->id       = (int) $data->id;
        $this->title    = $data->title;
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
}