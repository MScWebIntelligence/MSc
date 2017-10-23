<?php

    function autoload($class)
    {
        $classes = array(
            'Db'            => 'class/various/Db.php',
            'User'          => 'class/user/User.php',
            'Users'         => 'class/user/Users.php',
            'UsersDAL'      => 'class/user/UsersDAL.php',
            'UsersHelper'   => 'class/user/UsersHelper.php',
            'Book'          => 'class/book/Book.php',
        );

        if (array_key_exists($class, $classes)) {
            include_once $classes[$class];
            return true;
        }

        return true;
    }