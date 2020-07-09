<?php

class photos {

    private $id;
    private $User;
    private $Bildname;
    private $Latitude;
    private $Longitude;
    private $Aufnahmedatum;
    private $Freigabestatus;
    

    public function __construct($setId, $setUser, $setBildname, $setLatitude, $setLongitude, $setAufnahmedatum, $setFreigabestatus) {
        $this->id = $setId;
        $this->User = $setUser;
        $this->Bildname = $setBildname;
        $this->Latitude = $setLatitude;
        $this->Longitude = $setLongitude;
        $this->Aufnahmedatum = $setAufnahmedatum;
        $this->Freigabestatus = $setFreigabestatus;
    }

    //getter
    public function getId() {
        return $this->id;
    }

    public function getUser() {
        return $this->User;
    }

    public function getBildname() {
        return $this->Bildname;
    }

    public function getLatitude() {
        return $this->Latitude;
    }

    public function getLongitude() {
        return $this->Longitude;
    }

    public function getAufnahmedatum() {
        return $this->Aufnahmedatum;
    }

    public function getFreigabestatus() {
        return $this->Freigabestatus;
    }

//setter
    public function setId($id) {
        $this->id = $id;
    }

    public function setUser($User) {
        $this->User = $User;
    }

    public function setLatitude($Latitude) {
        $this->Latitude = $Latitude;
    }

    public function setLongitude($Longitude) {
        $this->Longitude = $Longitude;
    }

    public function setAufnahmedatum($Aufnahmedatum) {
        $this->Aufnahmedatum = $Aufnahmedatum;
    }

    public function setFreigabestatus($Freigabestatus) {
        $this->Freigabestatus = $Freigabestatus;
    }
}