<?php
require_once 'various/functions.php';
unset($CFG);

// Switch off error at production
error_reporting(0);

$CFG  = (object)array(
    'www_root'      => 'http://www.openlibrary.eu/',
    'real_path'     => '',
    'environment'   => 'production',
    'db_host'       => 'localhost',
    'db_user'       => 'openlibrary_user',
    'db_password'   => '?Xz3ht17',
    'db_name'       => 'openlibrary_db'
);

//Font Awesome cdn
$CFG->font_awesome      = '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css';

// jQuery 2.1.3 cdn path
$CFG->jquery            = 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js';

// bootstrap 3.3.2 cdn paths
$CFG->bootstrap         = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css';
$CFG->bootstrap_theme   = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css';
$CFG->bootstrap_js      = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js';

// jQuery form validator plugin
$CFG->form_validator    = 'https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js';

define('ROOT', $_SERVER["DOCUMENT_ROOT"].'/');
//define('SESSION_TIMEOUT_SECS', 1800);
define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');
define('JWT_ΚΕΥ', 'CBCB55CA8463DDA41F1447B4B644C');
define('JWT_EXP', 1800);

require_once __DIR__ . '/vendor/autoload.php';
require_once 'config_local.php';

use Classes\Various\Db;
$db = new Db();
