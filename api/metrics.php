<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kostopoulos
 * Date: 10/26/2017
 * Time: 4:57 PM
 */
header('Content-Type: application/json');
require_once '../config.php';
use Classes\Metric\MetricsHelper;

$action = getParam('action', true);
$datestamp = gmdate("Y-m-d H:i:s", strtotime(getParam('datestamp', true)));
$userId = getParam('userId', true, 'int');

MetricsHelper::addAction($action,$datestamp,$userId);
