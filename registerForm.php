<?php
//all variables initially set to blank
$vornameErr = $nachnameErr = $adresseErr = $plzErr =  $ortErr = $usernameErr = $passwortErr = $passwortBErr = $emailErr = "";
//error message = false; does not exhist on site 
$err=false;

if (isset($_POST["submit"])){ //parameters for gueltige inputs. abfrage mit preg_match 

//with test_input the valid data is called in the function test_input 

    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["vorname"])  or preg_match("/^\s*$/",$_POST['vorname'])) {
        $vornameErr = "Only letters and white space allowed";
      } else {
        $vorname = test_input($_POST["vorname"]);
    }
    
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["nachname"])  or preg_match("/^\s*$/",$_POST['nachname'])) {
        $nachnameErr = "Only letters and white space allowed";
        $err=true;
      } else {
        $nachname = test_input($_POST["nachname"]);
    }

    if (!preg_match("/^[A-Z][a-zß]*\s[0-9]*$/",$_POST["adresse"])) {
        $adresseErr = "invalid address";
        $err=true;
      } else {
        $adresse = test_input($_POST["adresse"]);
    }

    if ($_POST["plz"]<=1000 or $_POST["plz"] >9999) {
        $plzErr = "invalid PLZ";
        $err=true;
      } else {
        $plz = test_input($_POST["plz"]);
    }

    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["ort"])) {
        $ortErr = "invalid place";
        $err=true;
      } else {
      $ort = test_input($_POST["ort"]);
    }
   
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $err=true;
    } else {
        $email = test_input($_POST["email"]);
    }

    if (!preg_match("/^(?=.{5,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/",$_POST["username"])) {
        $usernameErr = "invalid username";
        $err=true;
      } else {
        $username = test_input($_POST["username"]);
    }

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\w\W]{8,}$/",$_POST["passwort"])) {
        $passwortErr = "Minimum eight characters, at least one letter and one number";
        $err=true;
      } else {
        $passwort = $_POST["passwort"];
    }

    if ($passwort != $_POST["passwort"] ) {
        $passwortBErr = "Password does not match! ";
        $err=true;
    } else{
        $passwortB= $_POST["passwortB"];
    }
    


    if(!$err){ //if there isnt an error messag

        $anrede=$_POST["anrede"]; //anrede from Post method is saved in anrede variable
        
        //the variable parameters of the User . new User wird erzeugt:
        $user = new User($anrede, $vorname, $nachname, $adresse, $plz, $ort, $username, $passwort, $email);

        if ($_POST["submit"] === "-1"){
            $db->registerUser($user);
            $erstellt = "Benutzer registriert!";
        }else{
            $tmp = $_POST["submit"];
            $user->setId($tmp);
            $db->updateUser($user);
            $erstellt = "Benutzer bearbeitet!";
        }

    }
}
function test_input($data) { //trims the entered data, and saves it in variable data
    //trim removes whitespace 
    $data = trim($data);
    return $data;
  }
?>

<h2><?php echo (isset($update))? $update : "Registration"; ?></h2>

<form name="myForm" action="indexx.php" method="post"> 
           
<div class="dropdown">
    <label for="anrede">Anrede:</label><span class="error">*</span>
    <select name="anrede">
        <option value="Frau">Frau</option>
        <option value="Herr" <?php if(isset($anrede) && $anrede=="Herr")echo "selected";?>>Herr</option>
    </select>  
</div>

<div class="form-group">
    <label for="vorname">Vorname:</label>
    <span class="error">* <?php echo $vornameErr;?></span>  
    <input  class="form-control" name="vorname" type="text" id="vorname" placeholder="Vorname"  value="<?php echo (isset($vorname)) ? $vorname : "" ;?>" required/>
</div>

<div class="form-group">
    <label for="nachname">Nachname:</label>
    <span class="error">* <?php echo $nachnameErr;?></span>
    <input  class="form-control" name="nachname" type="text" id="nachname" placeholder="Nachname" value="<?php echo (isset($nachname)) ? $nachname : "" ;?>" required/>
</div>

<div class="form-group">
    <label for="Adresse">Adresse:</label>
    <span class="error">* <?php echo $adresseErr;?></span>
    <input  class="form-control" name="adresse" type="text" id="adresse" placeholder="Adresse"  value="<?php echo (isset($adresse)) ? $adresse : "" ;?>" required/>
</div>

<div class="form-group">
    <label for="plz">PLZ:</label> 
    <span class="error">* <?php echo $plzErr;?></span>
    <input  class="form-control" name="plz" type="text" id="plz" placeholder="PLZ"  value="<?php echo (isset($plz)) ? $plz : "" ;?>" required/>
</div>   

<div class="form-group">
    <label for="ort">Ort:</label>
    <span class="error">* <?php echo $ortErr;?></span>
    <input  class="form-control" name="ort" type="text" id="ort" placeholder="Ort"  value="<?php echo (isset($ort)) ? $ort : "" ;?>"required/>
</div> 

<div class="form-group">
    <label for="username">Username:</label>
    <span class="error">* <?php echo $usernameErr ;?></span>
    <input  class="form-control" name="username" type="text" id="username" placeholder="Username"  value="<?php echo (isset($username)) ? $username : "" ;?>" required/>
</div> 

<div class="form-group">
    <label for="passwort">Passwort:</label>
    <span class="error">* <?php echo $passwortErr;?></span>
    <input  class="form-control" name="passwort" type="password" id="passwort" placeholder="Passwort"  value="<?php echo (isset($passwort)) ? $passwort : "" ; ?>" required/>
</div>

<div class="form-group">
    <label for="passwortB">Passwort-Bestätigung:</label>
    <span class="error">* <?php echo  $passwortBErr;?></span>
    <input  class="form-control" name="passwortB" type="password" id="passwortB" placeholder="Passwort-Bestätigung"  value="<?php echo (isset($passwortB)) ? $passwortB : "" ;?>" required/>
</div> 

<div class="form-group">
    <label for="email">E-Mail-Adresse:</label>
    <span class="error">* <?php echo $emailErr;?></span>
    <input  class="form-control" name="email" type="email" id="email" placeholder="E-Mail-Adresse" value="<?php echo (isset($email)) ? $email : "" ;?>" required/>
</div> 


<button type='submit' name='submit' class='btn btn-primary' value="<?php echo (isset($id))? $id : "-1"; ?>">
        <?php echo (isset($id))? "Update" : "Registrieren"; ?></button>
    <h3 id="register_info"><?php echo (isset($erstellt))? $erstellt : ""; ?></h3>
</form>
