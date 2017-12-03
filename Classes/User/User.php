<?php
/**
 * Created by PhpStorm.
 * User: Vaggelis Kotrotsios
 * Date: 10/22/2017
 * Time: 11:57 AM
 */
namespace Classes\User;

use Classes\Various\International;

class User
{

    private $id,
            $firstname,
            $lastname,
            $email,
            $country,
            $city,
            $address;

    /**
     * User constructor.
     * @param $data
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
        $this->email        = !empty($data->email) ? $data->email : false;
        $this->country      = !empty($data->country) ? $data->country : false;
        $this->city         = !empty($data->city) ? (int) $data->city : false;
        $this->address      = !empty($data->address)? $data->address : false;
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

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country ? International::getCountries()[$this->country] : false;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city ? "Ν. " . International::getStates()[$this->city] : false;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }
}