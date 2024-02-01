<?php

if(isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($email, $password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    //checks if the password is the same 
    if(verifyPassword($conn, $password) == true);
    {
        loginUser($conn, $email, $password);
    }
}
else {
    header("location: ../login.php");
    exit();
}