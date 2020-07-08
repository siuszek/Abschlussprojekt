<!DOCTYPE html>

<html lang="de">
    <head>
        <title>Dropbox</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class=container>
        <h1> Dropbox- Login </h1>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                <div class="form-group">
                    <label for="user">User</label>
                    <input  class="form-control" name="user" type="text" id="user" placeholder="user" />   
                </div> 
                <div class="form-group">
                    <label for="password">Passwort</label>
                    <input  class="form-control" name="password" type="password" id="password" placeholder="password"/>
                </div>
                
                <input  class="btn btn-primary" name="submit" type="submit" id="submit" value="Login into account"/>
                 
            </form>
        </div>
        
    </body>
</html>

<?php
    $users= array();
    $users["benutzer"] = "pass";

    if(!file_exists("users")){
        mkdir("users");
    }

    foreach ($users as $name => $password){
        if(!file_exists("users/". $name)){
            mkdir("users/". $name);
        }  
    }

    if(filter_has_var ( INPUT_POST, "submit")){
        $postInput = $_POST;

        if(array_key_exists($postInput["user"], $users) && $users[$postInput["user"]] === $postInput["password"]){
            header("Location:http://192.168.64.2/WEB_2020/Uebung7/angemeldet.php?user=". $postInput["user"]);
        } else {
            echo "<h2> Falsche Anmeldedaten<h2>";
        }
    }

    
?>

