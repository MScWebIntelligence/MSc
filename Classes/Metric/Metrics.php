<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 11:57 AM
 */
namespace Classes\Metric;

use Exception;

class Metrics
{
    private $db;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->db = new MetricsDAL();
    }

    /**
     * @param $id
     * @param $action
     * @param $timestamp
     * @param $userId
     */
    public function newAction($action, $timestamp, $userId)
    {
        $this->db->addMetric($action, $timestamp, $userId);
    }
}