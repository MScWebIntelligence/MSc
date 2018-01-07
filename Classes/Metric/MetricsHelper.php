<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 6:36 PM
 */
namespace Classes\Metric;

use Classes\Metric\Metric;

class MetricsHelper
{

    /**
     * MetricsHelper constructor.
     */
    public function __construct()
    {
    }

    public static function addAction($action, $timestamp, $userId)
    {
        $metrics      = new Metrics();
        $response   = $metrics->newAction($action,$timestamp,$userId);

        echo json_encode(array(
            'success'   => $response['addAction'] != false
        ));
    }
}