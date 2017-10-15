<?php
require_once 'various/functions.php';
unset($CFG);

if ('127.0.0.1' == $_SERVER["REMOTE_ADDR"]) {

    $CFG = (object)array(
        'www_root'      => 'http://localhost/MSc/',
        'real_path'     => 'C:/Program Files (x86)/EasyPHP-DevServer-14.1VC11/data/localweb/Msc/',
        'environment'   => 'local',
        'db_host'       => 'localhost',
        'db_user'       => 'root',
        'db_password'   => '',
        'db_name'       => 'msc',
    );

} else {

    // Switch off error at production
    error_reporting(0);

    $CFG  = (object)array(
        'www_root'      => 'https://www.msc.com/',
        'real_path'     => '',
        'environment'   => 'production',
        'db_host'       => 'localhost',
        'db_user'       => 'msc_user',
        'db_password'   => '',
        'db_name'       => 'msc'
    );

}

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
define('SESSION_TIMEOUT_SECS', 1800);
define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');

require_once 'autoloader.php';
spl_autoload_register('autoload');