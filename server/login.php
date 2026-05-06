<?php

session_start();

// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

// login functionality 
if (isset($_POST["login-button"])) {

    $userPhoneNumber = $_POST["userMobileNumber"];
    $userEmail = null;

    // validation:: check the phone number is valid 
    if (!preg_match('/^01[0-9]{9}$/', $userPhoneNumber)) {
        echo "
        <script>
            alert('Invalid Phone Number');
            window.location.href = '../includes/career-login.php';
        </script>
    ";
    }

    // database query 
    $userQuery = "SELECT *FROM signup_user WHERE phone_number ='$userPhoneNumber'";

    // query result
    $userData = $dbConnection->query($userQuery);

    if ($userData->num_rows === 1) {
        foreach ($userData as $data) {
            $userEmail = $data["email"];
        }
        $_SESSION["user"] = ["userEmail" => $userEmail, "userPhoneNumber" => $userPhoneNumber];

        echo "
        <script>
            alert('You have Login Successfully');
            window.location.href='../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('You Are not Registered. Please Signup first');
            window.location.href='../includes/career-login.php';
        </script>
        ";
    }
}
