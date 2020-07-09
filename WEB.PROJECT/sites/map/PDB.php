<?php
class PDB
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

    function uploadPhoto($photo)
    {
        $sql = "insert into webproject (id, User, Bildname, Latitude, Longitude, Aufnahmedatum, Freigabestatus) 
                 values (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $id = $photo->getId;
        $User = $photo->getUser;
        $Bildname = $photo->getBildname;
        $Latitude = $photo->getLatitude;
        $Longitude = $photo->getLongitude;
        $Aufnahmedatum = $photo->getAufnahmedatum;
        $Freigabestatus = $photo->getFreigabestatus;
        $stmt->bind_param("issddis", $id, $User, $Bildname, $Latitude, $Longitude, $Aufnahmedatum, $Freigabestatus);
        $stmt->execute();
    }

    function getPhotoList(){
        $results = array();
        $sql = "select * from webproject";
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

    function updatePhoto($photo){
        $id = $photo->getId();
        $User = $photo->getUser();
        $Bildname = $photo->getBildname();
        $Latitude = $photo->getLatitude();
        $Longitude = $photo->getLongitude();
        $Aufnahmedatum = $photo->getAufnahmedatum();
        $Freigabestatus = $photo->getFreigabestatus();
       
    
        $sql = "update webproject set User = ?, Bilnahme = ?, Latitude = ?, Longitude = ?, Aufnahmedatum = ?,
                 Freigabestatus = ? where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("issddis", $id, $User, $Bildname, $Latitude, $Longitude, $Aufnahmedatum, $Freigabestatus);
        $stmt->execute();
    }

    function deletePhoto($id){
        $sql = "delete from webproject where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}