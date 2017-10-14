<?php
/**
 * User: Vaggelis Kotrotsios
 * Date: 3/19/2016
 * Time: 11:42 PM
 * @param $sql
 * @return bool|object|stdClass
 */
function getRecord($sql)
{
    $db     = new Db();
    $row    = $db->get_record($sql);
    return $row;
}

function getRecords($sql)
{
    $db     = new Db();
    $row    = $db->get_records($sql);
    return $row;
}

function executeRecord($sql)
{
    $db     = new Db();
    $row    = $db->execute_record($sql);
    return $row;
}

function insertRecord($sql)
{
    $db         = new Db();
    $insert_id  = $db->insert_record($sql);
    return $insert_id;
}

function clearString($string)
{
    $db             = new Db();
    $string_safe    = $db->clear_string($string);
    return $string_safe;
}

function redirect($url)
{
    header('Location: ' . $url);
}

function addJsFile($path)
{
    echo '<script src="' . $path . '"></script>';
}

function addCssFile($path, $media = false)
{
    switch ($media) {

        case 'print':
            $media_html = ' media="print" ';
            break;

        default:
            $media_html = '';
            break;
    }

    echo '<link href="' . $path . '" rel="stylesheet" ' . $media_html . ' />';
}

function getParam($param_name, $required = false, $param_type = false)
{
    $value = false;

    if (isset($_GET[$param_name])) {
        $value = $_GET[$param_name];

    } elseif (isset($_POST[$param_name])) {
        $value = $_POST[$param_name];

    } else {
        if ($required) errorPage(400);
    }

    switch ($param_type) {

        case 'int':
            $value = ($value) ? (int)$value : false;
            break;

        case 'float':
            $value = ($value) ? (float)$value : false;
            break;

        case 'string':
            $value = ($value) ? (string)$value : false;
            break;

        default:
            $value = ($value) ? $value : false;
            break;
    }

    if (!$value && $required) errorPage(400);
    return $value;

}


function errorPage($error = 404)
{
    global $CFG;
    redirect("{$CFG->www_root}errors/{$error}.php");
    die();
}

