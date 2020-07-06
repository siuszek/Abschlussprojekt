<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="mysheet.css">
    <title>Patientenverwaltung</title>
</head>

<body>
    <?php 
    $current_site = isset($_GET["site"]) ? $_GET["site"] : "home";
    session_start();
    include "sites/login.inc.php";
    include "sites/nav.inc.php";
    if(isset($_GET['signup'])){
        if($_GET['signup']=='success'){
            echo '<div class="alert alert-success alert-dismissible"><a>YOU ARE LOGGED IN</a></div>';
        }
        else if($_GET['signup']=='error'){
            echo '<div class="alert alert-danger alert-dismissible"><a>Ungültiger Login</a></div>';
        }
    }
    include "sites/Patient.php";
    include "sites/content.inc.php";
    include "sites/footer.inc.php"
    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>