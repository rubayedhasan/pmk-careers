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
        echo "Failed to insert";
    }
}
