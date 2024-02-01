<?php

if(isset($_POST["submit"])){
    $surveyName = $_POST["survey_name"];
    $surveyDescription = $_POST["survey_description"];
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];
//    $surveyQuestion =$_POST["survey_Question"];
    //need to add description but dont know how 

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';



    createSurvey($conn, $surveyName, $surveyDescription, $startDate, $endDate);
}
else{
    header("location: ../createsurvey.php");
    exit();
}