<?php

session_start();

// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

// logout functionality 
if ($_GET["logout"]) {
    session_unset();
    echo "
        <script>
            alert('You have Logout Successfully');
            window.location.href='../index.php';
        </script>
        ";
}
