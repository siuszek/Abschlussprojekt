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

    function registerUser($user)
    {
        $sql = "insert into webproject (Anrede, Vorname, Nachname, Adresse, PLZ, Ort, Email, Benutzername, Passwort) 
                 values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $anrede = $user->getAnrede();
        $vorname = $user->getVorname();
        $nachname = $user->getNachname();
        $adresse = $user->getAdresse();
        $plz = intval($user->getPlz());
        $ort = $user->getOrt();
        $email = $user->getEmail();
        $username = $user->getUsername();
        $passwort = $user->getPasswort();
        $stmt->bind_param("ssssissss", $anrede, $vorname, $nachname, $adresse, $plz, $ort, $email, $username, $passwort);
        $stmt->execute();
    }

    function getUserList(){
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

    function updateUser($user){
        $id = $user->getId();
        $anrede = $user->getAnrede();
        $vorname = $user->getVorname();
        $nachname = $user->getNachname();
        $adresse = $user->getAdresse();
        $plz = intval($user->getPlz());
        $ort = $user->getOrt();
        $email = $user->getEmail();
        $username = $user->getUsername();
        $passwort = $user->getPasswort();
    
        $sql = "update webproject set Anrede = ?, Vorname = ?, Nachname = ?, Adresse = ?, PLZ = ?, Ort = ?,
                 Email = ?, Username = ?, Passwort = ? where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssssissssi", $anrede, $vorname, $nachname, $adresse, $plz, $ort, $email, $username,
            $passwort, $id);
        $stmt->execute();
    }

    function deleteUser($id){
        $sql = "delete from webproject where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}