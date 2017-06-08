<?php

/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 08.06.2017
 * Time: 09:50
 */
class doorclient
{
    public $dbid;
    public $doorid;
    public $name;

    function __construct($dbid, $doorid, $name)
    {
        $this->dbid = $dbid;
        $this->doorid = $doorid;
        $this->name = $name;
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
    public function getDoorid()
    {
        return $this->doorid;
    }

    /**
     * @return mixed
     */
    public function getDbid()
    {
        return $this->dbid;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $doorid
     */
    public function setDoorid($doorid)
    {
        $this->doorid = $doorid;
    }
}