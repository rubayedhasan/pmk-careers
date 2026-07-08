<?php

session_start();

// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

// signup functionality 
if (isset($_POST["userEmailAddress"])) {
    $setUserFullName = $_POST["userFullName"];
    $setPhoneNumber = $_POST["userContactNumber"];
    $setUserEmailAddress = $_POST["userEmailAddress"];
    $userAgreeTerms = $_POST["termsCheck"];


    // validation:: phone number right pattern
    if (!preg_match('/^01[0-9]{9}$/', $setPhoneNumber)) {
        echo "
        <script>
            alert('Invalid Phone Number');
            window.location.href = '../includes/career-signup.php';
        </script>
    ";
        // close the database connection 
        exit();
    }

    // validation:: email right syntax
    if (!filter_var($setUserEmailAddress, FILTER_VALIDATE_EMAIL)) {
        echo "
            <script>
                alert('Invalid Email Address');
                window.location.href = '../includes/career-signup.php';
            </script>
        ";
        // close the database connection 
        exit();
    }

    // validation:: unique phone number check
    $checkContactQuery = "SELECT * FROM signup_user WHERE phone_number = '$setPhoneNumber'";
    $checkContact = $dbConnection->query($checkContactQuery);

    if ($checkContact->num_rows > 0) {
        echo "
            <script>
                alert('This Phone Number Has Registered Before');
                window.location.href = '../includes/career-signup.php';
            </script>
        ";
        // close the database connection 
        exit();
    }

    // validation:: unique email address check 
    $checkEmailQuery = "SELECT * FROM signup_user WHERE email = '$setUserEmailAddress'";
    $checkEmail = $dbConnection->query($checkEmailQuery);
    if ($checkEmail->num_rows > 0) {
        echo "
            <script>
                alert('This Email Has Registered Before');
                window.location.href = '../includes/career-signup.php';
            </script>
        ";

        // close the database connection 
        exit();
    }

    // set custom user id for signup user 
    $customUserId = "PMKU-" . $setPhoneNumber;


    $userDetails = $dbConnection->prepare("INSERT INTO signup_user
    (user_id,user_name,phone_number,email,agree_terms)

    VALUES(?,?,?,?,?)
    ");

    $connectionOutcome = $userDetails->execute([$customUserId, $setUserFullName, $setPhoneNumber, $setUserEmailAddress,  $userAgreeTerms]);

    if ($connectionOutcome) {
        $_SESSION["user"] = ["userEmail" => $setUserEmailAddress, "userPhoneNumber" => $setPhoneNumber, "userId" => $customUserId];
        echo "
        <script>
            alert('You have Signup Successfully');
            window.location.href='../index.php';
        </script>
        ";

        // close the database connection 
        exit();
    } else {
        echo "
        <script>
            alert('You have Failed to Signup');
            window.location.href='../includes/career-signup.php';
        </script>
        ";

        // close the database connection 
        exit();
    }
}
