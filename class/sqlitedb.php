<?php

/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 08.06.2017
 * Time: 09:53
 */
class sqlitedb
{
    /* @var $dbpath string DBPath*/
    public $dbpath = "sqlite/backend.sqlite";
    /* @var $db SQLite3 */
    public $db;

    public $dbChips = "Chips";
    public $dbDoorClient = "DoorClient";
    public $dbLog = "Log";

    /**
     * sqlitedb constructor.
     */
    function __construct()
    {
        return $this->db = new SQLite3($this->dbpath);
    }

    /**
     *
     */
    public function close(){
        $this->db->close();
    }

    /**
     * @return chip[]
     */
    public function getChips()
    {
        /* @var $chips chip[]*/
        $chips = array();
        $results = $this->db->query("SELECT * FROM ".$this->dbChips);

        while ($row = $results->fetchArray()) {
            $chips[] = new chip(
                $row["ID"],
                $row["ChipID"],
                $row["Pin"],
                $row["Name"],
                $row["EMail"]
            );
        }
        return $chips;
    }

    /**
     * @param $chipid
     * @return int chipstatus
     */
    public function getChipStatusByChipID($chipid){

        /* @var $chips chip[]*/
        $chips = array();
        $results = $this->db->query("SELECT * FROM ".$this->dbChips." WHERE \"ChipID\" = '".SQLite3::escapeString($chipid)."'");

        $i = 0;
        while ($row = $results->fetchArray()) {
            $i++;
            if (isset($row["Pin"]) && $row["Pin"] != "") {
                $chips[] = new chip(
                    $row["ID"],
                    $row["ChipID"],
                    $row["Pin"],
                    $row["Name"],
                    $row["EMail"]
                );
            }
        }

        if($i == 0) {
            $this->db->query("INSERT INTO ".$this->dbChips." ('ID', 'ChipID', 'Pin','Name','EMail') VALUES (NULL, '$chipid', '','','');");
            return 0; //Status 0 -> Chip wird in Datenbank hinterlegt.
        }
        if(count($chips) > 0){
            return 2;
        }else{
            return 1;
        }
    }

    /**
     * @param $chipid
     * @return chip
     */
    public function getChipByChipID($chipid){
        /* @var $chips chip[]*/
        $chips = array();
        $results = $this->db->query("SELECT * FROM ".$this->dbChips." WHERE \"ChipID\" = '".SQLite3::escapeString($chipid)."'");
        while ($row = $results->fetchArray()) {
            $chips[] = new chip(
                $row["ID"],
                $row["ChipID"],
                $row["Pin"],
                $row["Name"],
                $row["EMail"]
            );
        }
        return $chips[0];
    }

    /**
     * @param $dbid
     * @return chip
     */
    public function getChipByDBID($dbid){

        /* @var $chips chip[]*/
        $chips = array();
        $results = $this->db->query("SELECT * FROM ".$this->dbChips." WHERE \"ID\" = '".SQLite3::escapeString($dbid)."'");

        while ($row = $results->fetchArray()) {
            $chips[] = new chip(
                $row["ID"],
                $row["ChipID"],
                $row["Pin"],
                $row["Name"],
                $row["EMail"]
            );
        }
        if(isset($chips[0]))
            return $chips[0];
        return null;
    }

    /**
     * @param $chipdbid
     */
    public function delChipByChipID($chipdbid){
        $this->db->query("DELETE FROM ".$this->dbChips." WHERE \"ID\" = '".SQLite3::escapeString($chipdbid)."'");
    }

    /**
     * @param $chipdbid
     * @param $pin
     * @param $name
     * @param $email
     */
    public function updateChip($chipdbid,$pin,$name,$email){
        $this->db->query("UPDATE ".$this->dbChips." SET \"Pin\" = \"$pin\", \"Name\" = \"$name\", \"EMail\" = \"$email\" WHERE \"ID\" = '".SQLite3::escapeString($chipdbid)."'");
    }

    /**
     * @return doorclient[]
     */
    public function getDoorClients()
    {
        /* @var $doorclient doorclient[]*/
        $doorclient = array();
        $results = $this->db->query("SELECT * FROM ".$this->dbDoorClient);

        while ($row = $results->fetchArray()) {
            $doorclient[] = new doorclient(
                $row["ID"],
                $row["DoorID"],
                $row["Name"],
                $row["IpCamera"]
            );
        }
        return $doorclient;
    }

    /**
     * @return doorclient
     */
    public function getDoorClientByID($doorClientID)
    {
        /* @var $doorclient doorclient[]*/
        $doorclient = array();
        $results = $this->db->query("SELECT * FROM ".$this->dbDoorClient." WHERE \"DoorID\" = '".SQLite3::escapeString($doorClientID)."'");

        while ($row = $results->fetchArray()) {
            $doorclient[] = new doorclient(
                $row["ID"],
                $row["DoorID"],
                $row["Name"],
                $row["IpCamera"]
            );
        }
        if(isset($doorclient[0]))
            return $doorclient[0];
        return null;
    }

    /**
     * @return doorclient
     */
    public function getDoorClientByDBID($doorClientDBID)
    {
        /* @var $doorclient doorclient[]*/
        $doorclient = array();
        $results = $this->db->query("SELECT * FROM ".$this->dbDoorClient." WHERE \"ID\" = '".SQLite3::escapeString($doorClientDBID)."'");

        while ($row = $results->fetchArray()) {
            $doorclient[] = new doorclient(
                $row["ID"],
                $row["DoorID"],
                $row["Name"],
                $row["IpCamera"]
            );
        }
        return $doorclient[0];
    }

    /**
     * @param $doordbid
     * @param $doorid
     * @param $doorname
     * @param $ipcamera
     */
    public function updateDoorClient($doordbid,$doorid,$doorname,$ipcamera){
        $this->db->query("UPDATE ".$this->dbDoorClient." SET \"DoorID\" = \"$doorid\", \"Name\" = \"".SQLite3::escapeString($doorname)."\", \"IpCamera\" = \"".SQLite3::escapeString($ipcamera)."\" WHERE \"ID\" = '".SQLite3::escapeString($doordbid)."'");
    }

    /**
     * @param $doorid
     * @param $doorname
     * @param $ipcamera
     */
    public function addDoorClient($doorid,$doorname,$ipcamera){
        $this->db->query("INSERT INTO ".$this->dbDoorClient." ('ID', 'DoorID', 'Name', 'IpCamera') VALUES (NULL, '$doorid', '$doorname', '$ipcamera');");
    }

    /**
     * @param $doordbid
     */
    public function delDoorClient($doordbid){
        $this->db->query("DELETE FROM ".$this->dbDoorClient." WHERE \"ID\" = '".SQLite3::escapeString($doordbid)."'");
    }

    /**
     * @return log[]
     */
    public function getLogs()
    {
        /* @var $logs log[]*/
        $logs = array();
        $results = $this->db->query("SELECT * FROM ".$this->dbLog);

        while ($row = $results->fetchArray()) {
            $logs[] = new log(
                $row["ID"],
                $row["Chips"],
                $row["DoorClient"],
                $row["status"],
                $row["timestamp"],
                $row["picture"]
            );
        }
        return $logs;
    }

    /**
     * @param $chipDbId
     * @param $doorClientDbId
     * @param $status
     * @param $picture
     */
    public function addLog($chipDbId,$doorClientDbId,$status,$picture){
        $this->db->query("INSERT INTO ".$this->dbLog." ('ID', 'Chips', 'DoorClient','status','timestamp','picture') VALUES (NULL, '$chipDbId', '$doorClientDbId','$status','".time()."','$picture');");
    }
}