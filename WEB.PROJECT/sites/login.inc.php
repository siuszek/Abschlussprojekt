<?php
    $users = array();
    //my personal login . can be multiple listed 
    $users["julia.koblmiller@gmail.com"] = "password";
    $users["julia.koblmiller@gmail.com"] = "password";
   
    //set cookie to user name and password 
    if(isset($_COOKIE['username']) and isset($_COOKIE['password'])){
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['password'] = $_COOKIE['password'];
    }
//if login form is submitted 
    if(isset($_POST['login'])){
        //the post values are abgelegt in a Loginusername variable
            $loginUsername = $_POST["username"];
            $loginPassword = $_POST["password"];
//if a loginusername is set and then login/password are equivalent 
            if(isset($users[$loginUsername]) && $users[$loginUsername] === $loginPassword){

                $_SESSION['username'] = htmlentities($loginUsername); //function converts characters to HTML entities.
                $_SESSION['password'] = htmlentities($loginPassword);
                $_SESSION['patientendaten'] = array(); //the patient data is saved into an array 
                
                if(isset($_POST['remember'])){ //if remember the session is clickled 
                    setcookie('username',  $_SESSION['username'], time()+600); // 10 min 
                    setcookie('password', $_SESSION['password'], time()+600);  //cookies are set password and username 
                }

                header('Location: index.php?signup=success'); //login specific header is set (successful login/signup)

            }else{
                header('Location: index.php?signup=error'); //if not an error appears 
            }
    }
    if(isset($_POST['logout'])){ //when u click logout the sessions are destroyed 
        session_destroy();
        if(isset($_COOKIE['username']) and isset($_COOKIE['password'])){ // to destroy cookies u have to set them back 
            setcookie('username', $_SESSION['username'], time()-700); // -10+ min
            setcookie('password', $_SESSION['password'], time()-700); 
        }
        header('Location: index.php'); //header is set to the index php
    }
?>