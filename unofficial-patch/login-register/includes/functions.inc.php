<?php

//Registration Functions
function emptyInputRegistration($firstName, $lastName, $username, $email, $phone, $password, $repeatPassword) {
    $result;

    if(empty($firstName) || empty($lastName) || empty($username) || empty($email) || empty($phone) || empty($password) || empty($repeatPassword)) {
        $result = true;
    }
    else $result = false;

    return $result;
}

function invalidUsername($username) {
    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else $result =  false;

    return $result;
}

function invalidEmail($email) {
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else $result =  false;

    return $result;
}

function pwdStrength($password) {
    $result;

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function pwdMatch($password, $repeatPassword) {
    $result;

    if($password != $repeatPassword) {
        $result = true;
    }
    else $result =  false;

    return $result;
}

function userKeysExists($conn, $username, $email) {
    $sql = "SELECT * FROM Users WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=sqlfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstName, $lastName, $username, $email, $phone, $password) {
    $sql = "INSERT INTO Users(FirstName, LastName, Username, Password, Email, Phone) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=sqlfail");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 

    mysqli_stmt_bind_param($stmt, "sssssi", $firstName, $lastName, $username, $hashedPassword, $email, $phone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../Index.php?registration=completed");
    exit();
}

//create survey function
function createSurvey($conn, $surveyName, $surveyDescription, $startDate, $endDate) {
    $statusSearch = findStatus($conn, "Active");
    $statusId = $statusSearch["StatusId"];

    $sql = "INSERT INTO Surveys(Name, Description, StartDateTime, EndDateTime, UserId, StatusId) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../createsurvey.php?error=sqlfail");
        exit();
    }
    
    session_start();
    mysqli_stmt_bind_param($stmt, "ssssii", $surveyName, $surveyDescription, $startDate, $endDate, $_SESSION["UserId"], $statusId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../createsurvey.php?survey=created");
    exit();
}

function findStatus($conn, $statusName) {
    $sql = "SELECT StatusId FROM Statuses WHERE Name = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../createsurvey.php?error=sqlfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $statusName);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);

    return $row;

    mysqli_stmt_close($stmt);
}

//Login Functions
function emptyInputLogin($email, $password) {
    $result;

    if(empty($email) || empty($password)) {
        $result = true;
    }
    else $result = false;

    return $result;
}

function verifyPassword($conn, $password){
    $passwordSeacrh = userKeysExists($conn, $email, $password);

    $hashPass = $passwordSeacrh["Password"];
    $check = password_verify($password, $hashPass);

    $verified;
    if($check == true)
        $verified = true;
    else $verified = false;

    return $verified;
}

function loginUser($conn, $email, $password) {
    $emailExists = userKeysExists($conn, $email, $email);

    if($emailExists == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else {
        session_start();
        $_SESSION["UserId"] = $emailExists["UserId"];

        header("location: ../Mainmenu.php?login=successful");
        exit();
    }
    
}