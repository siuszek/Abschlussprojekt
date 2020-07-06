<?php
class Patient // class is created, private variables are set, to be filled with collected data 
{
    private $Anrede;
    private $Firstname;
    private $Lastname;
    private $EMail;
    private $Adresse;
    private $PLZ;
    private $Ort;
    private $Benutzername;
    private $Passwort;

//function to construct an object Patient , listed parameters 
    public function __construct($Anrede, $Firstname, $Lastname, $EMail, $Adresse, $PLZ, $Ort, $Benutzername, $Passwort)
    {
        $this->setAnrede($Anrede);
        $this->setFirstname($Firstname); //way of setting values to the variables (php way)
        $this->setLastname($Lastname);
        $this->setEmail($EMail);
        $this->setAdresse($Adresse);
        $this->setPLZ($PLZ);
        $this->setOrt($Ort);
        $this->setBenutzername($Benutzername);
        $this->setPasswort($Passwort);
    }
//setters and getters 
    public function getAnrede()
    {
        return $this->Anrede;
    }
    public function setAnrede($x)
    {
        $this->Anrede= $x;
    }
    public function getFirstname()
    {
        return $this->Firstname;
    }
    public function setFirstname($x)
    {
        $this->Firstname = $x;
    }
    public function getLastname()
    {
        return $this->Lastname;
    }
    public function setLastname($x)
    {
        $this->Lastname = $x;
    }
    public function getEmail()
    {
        return $this->EMail;
    }
    public function setEmail($x)
    {
        $this->EMail = $x;
    }

    public function getAdresse()
    {
        return $this->Adresse;
    }
    public function setAdresse($x)
    {
        $this->Adresse = $x;
    }
    public function getPLZ()
    {
        return $this->PLZ;
    }
    public function setPLZ($x)
    {
        $this->PLZ = $x;
    }
    public function getOrt()
    {
        return $this->Ort;
    }
    public function setOrt($x)
    {
        $this->Ort = $x;
    }

    public function getBenutzername()
    {
        return $this->Benutzername;
    }
    public function setBenutzername($x)
    {
        $this->Benutzername= $x;
    }
    public function getPasswort()
    {
        return $this->Passwort;
    }
    public function setPasswort($x)
    {
        $this->Passwort = $x;
    }
}
?>
<div class="container">
    <?php

    if (isset($_POST["submit"])) { //once u click submit 
        $neuePatient = new Patient( //new patient erzeugt 
            $_POST["Anrede"],
            $_POST["Firstname"], //all the values are posted for later refeerence/use
            $_POST["Lastname"],
            $_POST["EMail"],
            $_POST["Adresse"],
            $_POST["PLZ"],
            $_POST["Ort"],
            $_POST["Benutzername"],
            $_POST["Passwort"]
        );
        if ($neuePatient->getFirstname() != null) { //once the first value of patient object is not null its assumed the rest are fulfilled (because of the strict abfrage at the creation)new patient php
            echo "Patient was successfully created and added to the database:<br>";
            echo "<br>";
            var_dump($neuePatient); //the variables are dumped after successful input 
            echo "<br><br>";
            if (empty($_SESSION['patientendaten']))
                $_SESSION['patientendaten'] = array(); // an array of the Sessions patient data is created 
            array_push($_SESSION['patientendaten'], $neuePatient); //the new patient data is pushed into the array 
        } else {
            echo "An error has occurred!"; 
        }
    }

    $cnt = 1; //starting patient is of count 1 
    if (!empty($_SESSION['patientendaten'])) {
        foreach ($_SESSION['patientendaten'] as $v) { //$v is items of the patient data array 
            if (isset($_POST["delete" . $cnt])) {; //button aufruf 
                unset($_SESSION['patientendaten'][$cnt - 1]); // if you click delete button from form, it its removed from array, count goes down  1 
                break;
            }
            $cnt++; // if not keep couning up 
        }
    }
    ?>
</div>