<?php

/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 08.06.2017
 * Time: 09:53
 */
class log
{
    public $dbid;
    public $chipdbid;
    public $doorclientdbid;
    public $status;
    public $timestamp;

    function __construct($dbid, $chipdbid, $doorclientdbid, $status, $timestamp)
    {
        $this->dbid = $dbid;
        $this->chipdbid = $chipdbid;
        $this->doorclientdbid = $doorclientdbid;
        $this->status = $status;
        $this->timestamp = $timestamp;
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
    public function getChipdbid()
    {
        return $this->chipdbid;
    }

    /**
     * @return mixed
     */
    public function getDoorclientdbid()
    {
        return $this->doorclientdbid;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $chipdbid
     */
    public function setChipdbid($chipdbid)
    {
        $this->chipdbid = $chipdbid;
    }

    /**
     * @param mixed $doorclientdbid
     */
    public function setDoorclientdbid($doorclientdbid)
    {
        $this->doorclientdbid = $doorclientdbid;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }
}