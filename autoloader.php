<?php

    function autoload($class)
    {
        $classes = array(
            'Db'            => 'class/various/Db.php',
            'International' => 'class/various/International.php',
            'JWT'           => 'class/various/JWT.php',
            'User'          => 'class/user/User.php',
            'Users'         => 'class/user/Users.php',
            'UsersDAL'      => 'class/user/UsersDAL.php',
            'UsersHelper'   => 'class/user/UsersHelper.php'
        );

        if (array_key_exists($class, $classes)) {
            include_once $classes[$class];
            return true;
        }

        return true;
    }