<?php

    function autoload($class)
    {
        $classes = array(
            'Db' => 'class/various/Db.php',
        );

        if (array_key_exists($class, $classes)) {
            include_once $classes[$class];
            return true;
        }

        return true;
    }