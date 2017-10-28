<?php

/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 5/5/2017
 * Time: 8:23 PM
 */
namespace Classes\Various;

class Db
{
    /**
     * The database connection.
     * @var \mysqli()
     */
    protected static $connection;
    private $db_host;
    private $db_user;
    private $db_password;
    private $db_name;

    /**
     * Db constructor.
     */
    public function __construct()
    {
    }

    /**
     * Connect to db function
     *
     * @return bool
     */
    private function connect()
    {
        // Try and connect to the database
        if (!isset(self::$connection)) {
            global $CFG;

            $this->db_host      = $CFG->db_host;
            $this->db_user      = $CFG->db_user;
            $this->db_password  = $CFG->db_password;
            $this->db_name      = $CFG->db_name;

            // Load configuration as an array. Use the actual location of your configuration file
            //$config = parse_ini_file('./config.ini');
            self::$connection = new \mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
            mysqli_set_charset(self::$connection, "utf8");
            return true;
        }

        // If connection was not successful, handle the error
        if (self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }

        return true;
    }

    //=============================Standard query functions=================================//
    /**
     * @param $query
     * @return bool|\mysqli_result
     */
    private function query($query)
    {
        // Connect to the database
        $this->connect();

        // Query the database
        $result = self::$connection->query($query);

        return $result;
    }


    /**
     * @param $query
     * @return \mysqli
     */
    private function insert_query($query)
    {
        // Connect to the database
        $this->connect();

        // Query the database
        self::$connection->query($query);

        return self::$connection;
    }

    /**
     * @param $dirty_string
     * @return string
     */
    public function clearString($dirty_string)
    {
        $this->connect();
        $clear_string = self::$connection->real_escape_string($dirty_string);
        return $clear_string;
    }

    //==========================Get results functions======================================//

    /**
     * @param $sql
     * @return bool|object|\stdClass
     */
    public function getRecord($sql)
    {
        $sql            = strpos($sql, "LIMIT") === false && strpos($sql, "limit") === false ? "{$sql} LIMIT 1" : $sql;
        $exec_query     = $this->query($sql);
        $result         = $exec_query->fetch_object();
        $check_empty    = (array)$result;

        if (empty($check_empty)) {
            return false;
        }

        return $result;
    }

    /**
     * @param $sql
     * @return array
     */
    public function getRecords($sql)
    {
        $result     = array();
        $exec_query = $this->query($sql);
        $i          = 0;

        while ($array_result = $exec_query->fetch_object()) {
            $result[]   = $array_result;
            $i          = $i + 1;
        }

        return $result;
    }

    /**
     * @param $sql
     * @return bool
     */
    public function executeRecord($sql)
    {
        $exec_query = $this->query($sql);
        return $exec_query ? true : false;
    }

    /**
     * @param $sql
     * @return bool|mixed
     */
    public function insertRecord($sql)
    {
        $exec_query = $this->insert_query($sql);
        $insert_id  = $exec_query->insert_id;
        return $exec_query ? $insert_id : false;
    }

    /**
     * @param $sql
     * @return bool
     */
    public function existsRecord($sql)
    {
        return $this->getRecord($sql) ? true : false;
    }
}