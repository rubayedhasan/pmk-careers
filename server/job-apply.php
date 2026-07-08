<?php

session_start();

// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

// apply functionality 
if (isset($_POST["applyBtn"])) {
    if ($_SESSION["user"]["userPhoneNumber"]) {
        header("location:../includes/job_application.php");

        // close the database connection 
        exit();
    } else {
        header("location:../includes/career-login.php");

        // close the database connection 
        exit();
    }
}
