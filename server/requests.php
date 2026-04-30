<?php

session_start();

// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

// signup functionality 
if (isset($_POST["userEmailAddress"])) {
    $setUserFullName = $_POST["userFullName"];
    $setUserAddress = $_POST["userAddress"];
    $setPhoneNumber = $_POST["userContactNumber"];
    $setUserEmailAddress = $_POST["userEmailAddress"];
    $userAgreeTerms = $_POST["termsCheck"];

    $userDetails = $dbConnection->prepare("INSERT INTO signup_user
    (name,address,phone_number,email,agree_terms)

    VALUES(?,?,?,?,?)
    ");

    $connectionOutcome = $userDetails->execute([$setUserFullName, $setUserAddress, $setPhoneNumber, $setUserEmailAddress,  $userAgreeTerms]);

    if ($connectionOutcome) {
        $_SESSION["user"] = ["userEmail" => $setUserEmailAddress, "userPhoneNumber" => $setPhoneNumber];
        echo "
        <script>
            alert('You have Signup Successfully');
            window.location.href='../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('You have Failed to Signup');
            window.location.href='../includes/career-signup.php';
        </script>
        ";
    }
} elseif (isset($_POST["login-button"])) {

    $userPhoneNumber = $_POST["userMobileNumber"];
    $userEmail = null;

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
} elseif ($_GET["logout"]) {
    session_unset();
    echo "
        <script>
            alert('You have Logout Successfully');
            window.location.href='../index.php';
        </script>
        ";
} else {
    // nothing 
}
