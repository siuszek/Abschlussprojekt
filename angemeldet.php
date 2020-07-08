<!DOCTYPE html>


<?php

    if($_SERVER['REQUEST_METHOD'] === 'GET'){ //get method of collecting user data 
        if(empty($_GET["user"])){
            $user = "Unknown";
        }else{
            $user = $_GET["user"];
        }
		
        $Pfad = "users/". $user. "/"; //pfad (directory path) is saved seperately in text file
		
		
        file_put_contents("Pfad.txt", $Pfad);
    }

//the post method of getting the username data 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
		
		
        if(empty($_POST["user"])){
            $user = "Unknown";
        }else{
            $user = $_POST["user"];
        }

//the textfile with the directory path is read = simplicity
        $Pfad = file_get_contents("Pfad.txt");

//previously called at the "upload" file button 
        if(filter_has_var(INPUT_POST, "andOrd")){
            $Pfad .= $_POST["andOrd"]."/";
            file_put_contents("Pfad.txt", $Pfad);
        }
		
		
        if(!empty($_FILES["file"]) && $_FILES["file"]["name"] !== "") {
            
			//this is the file location saved in a variable 
            $tmpLocation = $_FILES["file"]["tmp_name"];
			//this is the file name saved in a variable 
            $tmpName = $_FILES["file"]["name"];
            
			
            $neu=FALSE;
            $counter=1; //can get 1 file

//takes the file handle of the current directory 
            $HANDLEold= opendir($Pfad);
            $oFile= array();
            while ($item = readdir($HANDLEold)){ //takes 1 items out, and can read files until there is nothing left to read 
                if($item !== "." && $item !==".."){ //are the items visible"? . = directory .. one above
                    $oFile[] =$item; //new array takes on all items that were read
                }
            }
            closedir($HANDLEold); //handle must always be closed after opening 


            $TemporaryName = pathinfo($tmpName)["filename"];  
            $ExtendedName= pathinfo($tmpName)["extension"]; 

            while(!$neu) {
                $neu = TRUE;
				
                foreach($oFile as $key => $item) {
                    if($tmpName === $item){
                        $neu=FALSE;
                    }
                }
                $counter++;

                if($neu){
                    break;
                }else{
					
                    $tmpName = $TemporaryName. "(" . $counter. ").". $ExtendedName;
                }
            }
			

// moved the combined directory path + tmp file name to the temporary directory location
            if (move_uploaded_file($tmpLocation, $Pfad . $tmpName)){
                echo "File uploaded";
            }else{
                echo "Problem Beim Upload"; //error message 
            }
            echo "<br>";
        }

//add a new folder to the directory 
        
		if(filter_has_var(INPUT_POST, "neuO")){
			
			//the ordner cannot be empty (name)
            if($_POST["ordner"] !== ""){
				
                $ordner = $_POST["ordner"]; //the ordner name is saved ina sep. variable
				
                if(file_exists($Pfad.$ordner)){ //the order name,already exhists and is present in directory path
                    echo "Ordner ist schon vorhanden! <br>";
                }else{
					
                    mkdir($Pfad. $ordner); //if not its created 
                }
            }
        }


        if(filter_has_var(INPUT_POST, "loeschDat")){ //single upload to del
			//unlinked the data connected with the directory path 
            if(unlink($Pfad . str_replace("Delete: ", "", $_POST["loeschDat"]))){   //button aufruf           
                    echo "Datei gelöscht <br>"; //message to user
            }else{
                   echo "Problem Beim Löschen<br>"; //message to user 
            }
        }
		
        // str_replace : takes a value from each array and uses them to search and replace on subject 
		
        if(filter_has_var(INPUT_POST, "loeschOrd")){ //want to delete folder

			 //folder must be empty or only have 1 item to be deleted !
            if(!(count(scandir($Pfad . str_replace("Delete: ", "", $_POST["loeschOrd"])))==2)){
                echo "Ordner ist nicht leer. Bitte zuerst leeren! <br>";
            }else{
				
                if(rmdir($Pfad. str_replace("Delete: ", "", $_POST["loeschOrd"]))){              
                    echo "Ordner gelöscht <br>";
                }else{
                    echo "Problem Beim Löschen<br>";
                }
            }
        }
		
		
		if(filter_has_var(INPUT_POST, "dirAbove")){ //with the zuruck button you go one directory above 
			if(dirname($Pfad) === "users"){ //if u are already in the users folder, u cannot travel up another directory 
				echo "Zugriff verweigert! ";
			}else{
			$Pfad=dirname($Pfad) . "/"; //if not path is added to current directory path 
			file_put_contents("Pfad.txt",$Pfad); //path is entered in a tezt file 
			}
		}
	}
	
	
	
        $handle = opendir($Pfad);
        $file = array(); //create array to be filled with read dir files 


        while($item=readdir($handle)){ //opens the directory and reads through every file, saving each one in a file[] array
            if ($item !== "." && $item !== ".." ){ //searching cur & directory above
                $file[] = $item; 
            }
        }
		
        closedir($handle); //must close all handles opened
?>


<html lang="de">
    <head>
        <title>Dropbox</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
    <div class=container>
            <br><br>
        <h3> Angemeldet als: <?php echo $user ?> </h3>
        <br><br>
        <form class="form-inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="form-group mx-sm-3 mb-2">
                <input  name="user" value="<?php echo $user ?>" hidden> 
                <input type="text" class="form-control" name="ordner" placeholder="Neuer Ordner">
                <button type="submit" class="btn btn-primary" name="neuO">Neuer Ordner</button>
            </div>
        </form>
        <br><br>
        <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="form-group">
                <input  name="user" value="<?php echo $user ?>" hidden> 
                <input type="file" class="form-control-file" name="file">
                <br>
                <button type="submit" name="submit" class="btn btn-primary">UPLOAD</button>
            </div>
        </form>
		<form class="form-inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="form-group mx-sm-3 mb-2">
                <input  name="user" value="<?php echo $user ?>" hidden> 
                <button type="submit" class="btn btn-primary" name="dirAbove">Zurück</button>
            </div>
        </form>
        <h2> Dateien im Ordner: <?php echo ltrim($Pfad, "users/"); ?></h2>

        <ul>
            <?php 
			foreach($file as $key => $item){ 
			?><li><?php
                    if(pathinfo($item, PATHINFO_EXTENSION)===""){
                        ?><form class="form-inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>"> 
                            <input  name="user" value="<?php echo $user ?>" hidden> 
                            <input type="submit"  name="andOrd" value = "<?php echo $item ?>">
                            <input type="submit" name="loeschOrd" value = "<?php echo "Delete: " . $item?>">
                        </form><?php
                    }else{
                        echo $item;
                        ?><form class="form-inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>"> 
                        <input  name="user" value="<?php echo $user ?>" hidden> 
                        <input type="submit"  name="loeschDat" value = "<?php echo "Delete: " . $item ?>">
                    </form><?php
                    } 
                    ?></li><?php
            }
            ?>
        

        </ul>
    
    </div>  
    </body>
</html>
