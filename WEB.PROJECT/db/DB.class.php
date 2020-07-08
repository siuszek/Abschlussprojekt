<?php
 
class DB
{
    private $connection;
    public $message;

    function __construct($servername, $username, $password, $dbname)
    {
        $this->connection = new mysqli($servername, $username, $password, $dbname);
        if ($this->connection->connect_error) {
            $this->message = "Could not connect to the database!";
        }else{
            $this->message = "Successfully connected to the database!";
        }
    }

    function registerUser($neuePatient)
    {
        $sql = "insert into benutzer (Anrede, Firstname, Lastname, Adresse, PLZ, Ort, EMail, Benutzername, Passwort) 
                 values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $Anrede = $neuePatient->getAnrede();
        $Firstname = $neuePatient->getFirstname();
        $Lastname = $neuePatient->getLastname();
        $Adresse = $neuePatient->getAdresse();
        $PLZ = intval($neuePatient->getPLZ());
        $Ort = $neuePatient->getOrt();
        $EMail = $neuePatient->getEmail();
        $Benutzername = $neuePatient->getBenutzername();
        $Passwort = $neuePatient->getPasswort();
        $stmt->bind_param("ssssissss", $Anrede, $Firstname, $Lastname, $Adresse, $PLZ, $Ort, $EMail, $Benutzername, $Passwort);
        $stmt->execute();
    }

    function getUserList(){
        $results = array();
        $sql = "select * from benutzer";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                foreach($row as $item => $value){
                    $results[$i][$item] = $value;

                }
                $i++;
            }
        }
        return $results;
    }

    function updateUser($neuePatient){
        $id = $neuePatient->getId();
        $Anrede = $neuePatient->getAnrede();
        $Firstname = $neuePatient->getFirstname();
        $Lastname = $neuePatient->getLastname();
        $Adresse = $neuePatient->getAdresse();
        $PLZ = intval($neuePatient->getPLZ());
        $Ort = $neuePatient->getOrt();
        $EMail = $neuePatient->getEmail();
        $Benutzername = $neuePatient->getBenutzername();
        $Passwort = $neuePatient->getPasswort();
    
        $sql = "update benutzer set Anrede = ?, Firstname = ?, Lastname = ?, Adresse = ?, PLZ = ?, Ort = ?,
                 EMail = ?, Benutzername = ?, Passwort = ? where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssssissssi", $Anrede, $Firstname, $Lastname, $Adresse, $PLZ, $Ort, $EMail, $Benutzername,
            $Passwort, $id);
        $stmt->execute();
    }

    function deleteUser($id){
        $sql = "delete from benutzer where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}