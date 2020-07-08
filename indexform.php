<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Info</title>
</head>
<body>
<div class ="container">
    <h1> Form with PHP </h1>
    
    <form class ="form-horizontal" method ="get" action ="auswertung.php">
     <div class="form-group">
            <label for="Salutation" class ="col-sm-2 control-label"> Salutation</label>
            <div class ="col-sm-10">
                <input type ="text" value="" class="form-control" id="Salutation" name ="Salutation" placeholder ="Salutation">
            </div>
        </div>
        
     <div class="form-group">
            <label for="Firstname" class ="col-sm-2 control-label"> Firstname</label>
            <div class ="col-sm-10">
                <input type ="text" value="" class="form-control" id="Firstname" name ="Firstname" placeholder ="Firstname">
            </div>
        </div>
        
     <div class="form-group">
            <label for="Lastname" class ="col-sm-2 control-label"> Lastname</label>
            <div class ="col-sm-10">
                <input type ="text" value="" class="form-control" id="Lastname" name ="Lastname" placeholder ="Lastname">
            </div>
        </div>
        
     <div class="form-group">
            <label for="Address" class ="col-sm-2 control-label"> Address</label>
            <div class ="col-sm-10">
                <input type ="text" class="form-control" id="Address" name ="Address" placeholder ="Address">
            </div>
        </div>
        
        <div class="form-group">
            <label for="Zipcode" class ="col-sm-2 control-label"> Zipcode</label>
            <div class ="col-sm-10">
                <input type ="text" class="form-control" id="Zipcode" name ="Zipcode" placeholder ="Zipcode">
            </div>
        </div>
        
        <div class="form-group">
            <label for="City" class ="col-sm-2 control-label"> City</label>
            <div class ="col-sm-10">
                <input type ="text" class="form-control" id="City" name ="City" placeholder ="City">
            </div>
        </div>
        
         <div class="form-group">
            <label for="Username" class ="col-sm-2 control-label"> Username</label>
            <div class ="col-sm-10">
                <input type ="text" class="form-control" id="Username" name ="Username" placeholder ="Username">
            </div>
        </div>
        
         <div class="form-group">
            <label for="Email" class ="col-sm-2 control-label"> Email</label>
            <div class ="col-sm-10">
                <input type ="email" class="form-control" id="Email" name ="Email" placeholder ="@gmail.com">
            </div>
        </div>
        
         <div class="form-group">
            <label for="Password" class ="col-sm-2 control-label"> Password</label>
            <div class ="col-sm-10">
                <input type ="password" class="form-control" id="Password" name ="Password">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="co-sm-offset-2 col-sm-10">
                <button type ="submit" name="submit" class ="btn btn-default">Confirm
                </button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

