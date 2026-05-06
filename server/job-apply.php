<?php

session_start();

// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

// apply functionality 
if (isset($_POST["applyBtn"])) {
    if ($_SESSION["user"]["userPhoneNumber"]) {
        header("location:../includes/apply.php");
    } else {
        header("location:../includes/career-login.php");
    }
}
