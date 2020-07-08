<!DOCTYPE html>

<?php

if (!file_exists("img")){
    mkdir("img");
}

$pfad = "img/";
//upload
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_FILES["file"]) && $_FILES["file"]["name"] !== "") {
			
        $tmpLocation = $_FILES["file"]["tmp_name"];
        $tmpName = $_FILES["file"]["name"];

        move_uploaded_file($tmpLocation, $pfad . $tmpName);
    }
}

$handle = opendir($pfad);
$alles = array();


while($item=readdir($handle)){
    if ($item !== "." && $item !== ".." ){
        $alles[] = $item;
    }
}

closedir($handle);
?>

<html lang="de">
    <head>
        <title>Gallery</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    </head>
    <body>
    <div class="container  container-border">
    <h3> Gallery</h3>
        <div class="row border border-dark rounded">
            <div class="col-md-2">
                
                <h6> Img-Upload </h6>
                <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="file"  name="file"> 
                        <input type="submit" name="photosubmit" value="Upload">
                </form>
            </div>
        
            <div class="col-md-9 col-md-offset-1">
            <?php 
                foreach($alles as $item){ 
                ?><a data-fancybox="gallery" href="<?php echo $pfad . $item ?>"> 
                    <img class="img-thumbnail rounded ml-auto mr-auto" width="200" src="<?php echo $pfad . $item  ?>">
                </a><?php
                }
                ?>
            </div>		
        </div>  
    </div>  
    </body>
</html>



