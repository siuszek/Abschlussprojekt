<div class="main">
    <?php

    $db = new DB("localhost","julia","password","WebProject"); 
   
    //if the user is on the site and it is set to the home php
    $site = isset($_GET["site"]) ? $_GET["site"] : "home";
    if (empty($_SESSION['username']) && $site === "spezial") {
        $site = "home"; //default site set
    }
    switch ($site) { //switch case for the php site the user clicks on 
        case 'home':
            include "sites/home.inc.php";
            break;
        case 'newpatient':
            include "sites/newpatient.inc.php";
            break;
        case 'datapatient':
            include "sites/datapatient.inc.php";
            break;
        case 'kontakt':
            include "sites/kontakt.inc.php";
            break;
        case 'gallery':
            include "sites/gallery.php";
            break;
        case 'help':
            include "sites/help.php";
            break;
        case 'chat':
            include "chat/loginn.php";
            break;
        case 'map':
            include "map/leafletMap.inc.php";
            include "sites/gallery.php";
            break;
        default: //defualt
            include "sites/home.inc.php";
            break;
    }
    ?>
</div>