<?php

class User
{
    private $id;
    private $anrede;
    private $vorname;
    private $nachname;
    private $adresse;
    private $plz;
    private $ort;
    private $username;
    private $passwort;
    private $email;


    function __construct($anrede, $vorname, $nachname, $adresse, $plz, $ort, $email, $username, $passwort) {
        $this->anrede = $anrede;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->adresse = $adresse;
        $this->plz = $plz;
        $this->ort = $ort;
        $this->username = $username;
        $this->passwort = $passwort;
        $this->email = $email;
    }


    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }

    
    public function getAnrede(){
        return $this->anrede;
    }


    public function setAnrede($anrede){
        $this->anrede = $anrede;
    }


    public function getVorname(){
        return $this->vorname;
    }
    

    public function setVorname($vorname){
        $this->vorname = $vorname;
    }


    public function getNachname(){
        return $this->nachname;
    }
    

    public function setNachname($nachname){
        $this->nachname = $nachname;
    }


    public function getAdresse(){
        return $this->adresse;
    }
  
    
    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }


    public function getPlz(){
        return $this->plz;
    }
   
    
    public function setPlz($plz){
        $this->plz = $plz;
    }


    public function getOrt(){
        return $this->ort;
    }
    
    
    public function setOrt($ort){
        $this->ort = $ort;
    }


    public function getUsername(){
        return $this->username;
    }
    

    public function setUsername($username){
        $this->username = $username;
    }

    
    public function getPasswort(){
        return $this->passwort;
    }
    

    public function setPasswort($passwort){
        $this->passwort = $passwort;
    }


    public function getEmail(){
        return $this->email;
    }
    

    public function setEmail($email){
        $this->email = $email;
    }
}

?>