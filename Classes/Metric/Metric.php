<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 11:57 AM
 */
namespace Classes\Metric;

class Metric
{
    private $id,
        $action,
        $timestamp,
        $userId;

    /**
     * User constructor.
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
        $this->id           = (int) $data->id;
        $this->action    = $data->action;
        $this->timestamp     = $data->timestamp;
        $this->userId     = $data->userId;
    }
}