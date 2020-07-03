<?php 
//if delete is selected 
if (isset($_POST["delete"])) {
    $tmpid = $_POST["delete"];
    //intval: converts doubles to integers
    //then used to be deleted from $db 
    $db->deleteUser(intval($tmpid));
}
if (isset($_POST["update"])) {
    $update = "Update";

    $results = $db->getUserList(); //$db variable gets the data from the Userlist , of data bank. is assigned to variable results. 
    foreach ($results as $data) { //results take on $data values
        foreach ($data as $item => $value) { //$data is represented as $item with $value values
            if ($item === "id" && $value === $_POST["update"]) {
                $id = $data["id"];
                $anrede = $data["Anrede"];
                $vorname = $data["Vorname"];
                $nachname = $data["Nachname"];
                $adresse = $data["Adresse"];
                $plz = $data["PLZ"];
                $ort = $data["Ort"];
                $email = $data["Email"];
                $username = $data["Benutzername"];
                $passwort = $data["Passwort"];
                $passwortB = $data["Passwort"]; 
                
            }
        }
    }
}
?>
