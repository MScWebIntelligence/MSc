<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 11:58 AM
 */
namespace Classes\Metric;

class MetricsDAL
{
    /**
     * MetricsDAL constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $action
     * @param $datestamp
     * @param $userId
     */
    public function addMetric($action, $datestamp, $userId)
    {
        global $db;

        $action  = $db->clearString(trim($action));

        $sql = "INSERT INTO metrics (action, timestamp, userId)
                VALUES ('{$action}', '{$datestamp}', {$userId})";

        return  (int) $db->insertRecord($sql);
    }
}