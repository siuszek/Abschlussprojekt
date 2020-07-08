<div class="container jumbotron">
    <h2 class="display-3 text-muted">Welcome to User Management Form</h2>
    <form action="index.php?site=newpatient" method="POST">
        <table>
            <tr>
                <td><label>Your Salutation:</label></td>
                <td><input name="Anrede" type="text" placeholder="Salutation" REQUIRED></td>
            </tr>
            <tr>
                <td><label>Your Firstname:</label></td>
                <td><input name="Firstname" type="text" placeholder="Johnny" REQUIRED></td>
            </tr>
            <tr>
                <td><label>Your Lastname:</label></td>
                <td><input name="Lastname" type="text" placeholder="Smith" REQUIRED></td>
            </tr>
            <tr>
                <td><label>Your Email:</label></td>
                <td><input name="EMail" type="email" placeholder="me@example.com" REQUIRED></td>
            </tr>
            <tr>
                <td><label>Your Address:</label></td>
                <td><input name="Adresse" type="text" placeholder="Adress" REQUIRED></td>
            </tr>
            <tr>
                <td><label>Your Zipcode:</label></td>
                <td><input name="PLZ" type="text" placeholder="Zipcode" REQUIRED></td>
            </tr>
            <tr>
                <td><label>Your City:</label></td>
                <td><input name="Ort" type="text" placeholder="Ort" REQUIRED></td>
            </tr>
            <tr>
                <td><label>Your Username:</label></td>
                <td><input name="Benutzername" type="text" placeholder="Username" REQUIRED></td>
            </tr>
            <tr>
                <td><label>Your Password:</label></td>
                <td><input name="Passwort" type="text" placeholder="Password" REQUIRED></td>
            </tr>

            <tr>
                <td><input type="reset" class="btn btn-secondary" value="Cancel"></td>
                <td><input type="submit" class="btn btn-primary" value="Submit" name="submit"></td>
            </tr>
        </table>
    </form>
</div>

<?php
    if (isset($_POST["submit"])) {
    if (!empty($_SESSION['patientendaten'])) {
        echo '<br><div class="container jumbotron"><h4>Published Array Overview:</h4>';
        foreach ($_SESSION['patientendaten'] as $key => $v) {
            $key;
            var_dump($v);
            echo ' <br><br>';
        }

        if ($_POST["submit"]){
            $db->registerUser($neuePatient);
            $erstellt = "Benutzer registriert!";
        }else{
            $tmp = $_POST["submit"];
            $user->setId($tmp);
            $db->updateUser($neuePatient);
            $erstellt = "Benutzer bearbeitet!";
        }
    
        echo ' </div>';
    }
}
?>