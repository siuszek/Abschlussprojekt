
<!DOCTYPE html> 

<?php
//att first all teh varibles are set to nothing. null
$Salutation = $Firstname = $Lastname = $Address = $Zipcode = 
        $City = $Username = $Email = $Password = " "; 

$errormsg = null; //standard error message 

if(isset($_GET['submit'])){ //submit must be clicked before any following code can be reached
    
    if(!empty($_GET["Salutation"])) {
        $Salutation = $_GET["Salutation"];  //equals abfrage= are they entered in their  entrity 
    }else{
        $errormsg .= "<p>Salutation cannot be left blank</p>";
    }
    
    if(!empty($_GET['Firstname'])) {
        $Firstname = $_GET["Firstname"];
    }else{
        $errormsg .= "<p>Firstname cannot be left blank</p>";
    }
    
    if(!empty($_GET["Lastname"])) {
        $Lastname = $_GET["Lastname"];
    }else{
        $errormsg .= "<p>Lastname cannot be left blank</p>";
    }
    
    if(!empty($_GET["Address"])) {
        $Address= $_GET["Address"];
    }else{
        $errormsg .= "<p>Address cannot be left blank</p>";
    }
    
    if(!empty($_GET["Zipcode"])) {
        $Zipcode = $_GET["Zipcode"];
    }else{
        $errormsg .= "<p> Zipcode cannot be left blank</p>";
    }
    
    if(!empty($_GET["City"])) {
        $City = $_GET["City"];
    }else{
        $errormsg .= "<p> City cannot be left blank</p>";
    }
    
    if(!empty($_GET["Username"])) {
        $Username = $_GET["Username"];
    }else{
        $errormsg .= "<p> Username cannot be left blank</p>";
    }
    
     if(!empty($_GET["Email"])) {
        $Email = $_GET["Email"];
    }else{
        $errormsg .= "<p>Email cannot be left blank</p>";
    }
    
     if(!empty($_GET["Password"])) {
        $Password = $_GET["Password"];
    }else{
        $errormsg .= "<p> Password cannot be left blank</p>";
    }
}
       
?>

<html> 
    <head> <meta charset="UTF-8">
         <title>Form info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
          crossorigin="anonymous">

</head>

<body> 

    <div class ="container">
        <h1>!!!Your form inputs!!! </h1>
        <?php
        if($errormsg){
            echo $errormsg; //dynamic error message that is assessed with an if statement
        }
        
        echo "Salutation: $Salutation <br>"; 
        echo "Firstname: $Firstname <br>";
        echo "Lastname: $Lastname <br>";
        echo "Address: $Address <br>";
        echo "Zipcode: $Zipcode <br>";
        echo "City: $City <br>"; 
        echo "Username: $Username <br>";
        echo "Email: $Email<br>";
        echo "Password: protected <br>";
            
        echo "GET-array Content & Structure:<br>"; //using GET all the variables and values are collected and printed on screen 
        var_dump($_GET); //varaible parameters/description
        ?>    
    </div>
</body>
</html>