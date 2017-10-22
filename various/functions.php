<?php
/**
 * User: Vaggelis Kotrotsios
 * Date: 3/19/2016
 * Time: 11:42 PM
 */

/**
 * @param $url
 */
function redirect($url)
{
    header('Location: ' . $url);
}

/**
 * @param $path
 */
function addJsFile($path)
{
    echo '<script src="' . $path . '"></script>';
}

/**
 * @param $path
 * @param bool $media
 */
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

/**
 * @param $param_name
 * @param bool $required
 * @param bool $param_type
 * @return bool|float|int|string
 */
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

/**
 * @param int $error
 */
function errorPage($error = 404)
{
    global $CFG;
    redirect("{$CFG->www_root}errors/{$error}.php");
    die();
}

function getUser()
{
    if(!isset($_SESSION['user_id'])) {
        session_start();
    }

    //If session is empty go to logout
    if (empty($_SESSION['user_id'])) {
        return false;

    } else {

        //If user's time expired go to logout
        if ($_SESSION['user_timeout'] < time()) {
            $users = new Users();
            $users->logout();
            return false;

        } elseif (isset($_SESSION['user_id']) && isset($_SESSION['user_timeout'])) {
            $_SESSION['user_timeout']   = time() + SESSION_TIMEOUT_SECS;
            $users                      = new Users();
            return  $users->getUserById($_SESSION['user_id']);

        } else {
            return false;
        }
    }
}

