<?php

if(isset($_POST["submit"])) {
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeat_password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputRegistration($firstName, $lastName, 
            $username, $email, $phone, $password, $repeatPassword) !== false) {
        header("location: ../registration.php?error=emptyinput");
        exit();
    }

    if(invalidUsername($username) !== false) {
        header("location: ../registration.php?error=invalidusername");
        exit();
    }
    
    if(invalidEmail($email) !== false) {
        header("location: ../registration.php?error=invalidemail");
        exit();
    }

    if(userKeysExists($conn, $username, $email) !== false) {
        header("location: ../registration.php?error=userkeystaken");
        exit();
    }

    if(pwdStrength($password) !== false) {
        header("location: ../registration.php?error=passwordweak");
        exit();
    }

    if(pwdMatch($password, $repeatPassword) !== false) {
        header("location: ../registration.php?error=passwordsdontmatch");
        exit();
    }

    createUser($conn, $firstName, $lastName, $username, $email, $phone, $password);
}
else {
    header("locationlocation: ../registration.php");
    exit();
}