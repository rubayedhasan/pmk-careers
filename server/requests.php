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


    // validation:: phone number right pattern
    if (!preg_match('/^01[0-9]{9}$/', $setPhoneNumber)) {
        echo "
        <script>
            alert('Invalid Phone Number');
            window.location.href = '../includes/career-signup.php';
        </script>
    ";
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
        exit();
    }


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
        exit();
    } else {
        echo "
        <script>
            alert('You have Failed to Signup');
            window.location.href='../includes/career-signup.php';
        </script>
        ";
        exit();
    }
} elseif (isset($_POST["login-button"])) {

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
        exit();
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
        exit();
    } else {
        echo "
        <script>
            alert('You Are not Registered. Please Signup first');
            window.location.href='../includes/career-login.php';
        </script>
        ";
        exit();
    }
} elseif ($_GET["logout"]) {
    session_unset();
    echo "
        <script>
            alert('You have Logout Successfully');
            window.location.href='../index.php';
        </script>
        ";
    exit();
} else if (isset($_POST["applyBtn"])) {
    if ($_SESSION["user"]["userPhoneNumber"]) {
        header("location:../includes/apply.php");
        exit();
    } else {
        header("location:../includes/career-login.php");
        exit();
    }
} else {
    // nothing 
}
