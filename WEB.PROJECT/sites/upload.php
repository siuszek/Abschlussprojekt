<?php
    if (isset($_POST["submit"])) {
        $ziel = "./image/";
        $zieldatei = $ziel . basename($_FILES["data"]["name"]);

        $fileExt = explode('.',basename($_FILES["data"]["name"]));
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');

        if(in_array($fileActualExt, $allowed)){
            if (move_uploaded_file($_FILES["data"]["tmp_name"], $zieldatei)) {
                echo "Datei erfolgreich hochgeladen";
            } else {
                echo "Ein Fehler ist aufgetreten!";
            }
        }else{
            echo "Nicht erlaubter Datentyp!";
        }
    }else{
        echo "Bild hochladen!";
    }
    ?>
