<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 11:57 AM
 */

class User
{

    private $id,
            $firstname,
            $lastname,
            $email;

    /**
     * User constructor.
     */
    public function __construct($data)
    {
        $this->bind($data);
    }

    /**
     * @param $data
     */
    private function bind($data)
    {
        $this->id           = (int) $data->id;
        $this->firstname    = $data->firstname;
        $this->lastname     = $data->lastname;
        $this->email        = $data->email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

}