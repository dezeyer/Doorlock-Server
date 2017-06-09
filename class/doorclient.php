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
    public $ipcamera;

    function __construct($dbid, $doorid, $name, $ipcamera)
    {
        $this->dbid = $dbid;
        $this->doorid = $doorid;
        $this->name = $name;
        $this->ipcamera = $ipcamera;
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

    /**
     * @return mixed
     */
    public function getIpcamera()
    {
        return $this->ipcamera;
    }

    /**
     * @param mixed $ipcamera
     */
    public function setIpcamera($ipcamera)
    {
        $this->ipcamera = $ipcamera;
    }
}