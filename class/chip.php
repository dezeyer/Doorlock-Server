<?php

/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 08.06.2017
 * Time: 09:50
 */
class chip
{
    public $dbid;
    public $chipid;
    public $pin;
    public $name;
    public $email;

    function __construct($dbid, $chipid, $pin, $name, $email)
    {
        $this->dbid = $dbid;
        $this->chipid = $chipid;
        $this->pin = $pin;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDbid()
    {
        return $this->dbid;
    }

    /**
     * @return mixed
     */
    public function getChipid()
    {
        return $this->chipid;
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
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @param mixed $chipid
     */
    public function setChipid($chipid)
    {
        $this->chipid = $chipid;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $pin
     */
    public function setPin($pin)
    {
        $this->pin = $pin;
    }
}