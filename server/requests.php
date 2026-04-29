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
    $setUserPassword = $_POST["userPasswordKey"];
    $userAgreeTerms = $_POST["termsCheck"];

    $userDetails = $dbConnection->prepare("INSERT INTO user_list
    (name,address,phone_number,email,password,aggree_terms)

    VALUES(?,?,?,?,?,?)
    ");

    $connectionOutcome = $userDetails->execute([$setUserFullName, $setUserAddress, $setPhoneNumber, $setUserEmailAddress, $setUserPassword, $userAgreeTerms]);

    if ($connectionOutcome) {
        $_SESSION["user"] = ["userEmail" => $setUserEmailAddress, "userPassword" => $setUserPassword];
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

    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];

    // database query 
    $userQuery = "SELECT *FROM user_list WHERE email='$userEmail' and password='$userPassword'";

    // query result
    $userData = $dbConnection->query($userQuery);

    if ($userData->num_rows === 1) {
        $_SESSION["user"] = ["userEmail" => $userEmail, "userPassword" => $userPassword];

        echo "
        <script>
            alert('You have Login Successfully');
            window.location.href='../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('You have Failed to Login');
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
