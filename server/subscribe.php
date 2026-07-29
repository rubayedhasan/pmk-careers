<?php
// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

if (isset($_POST["subscription_user"])) {
    $email = $_POST["subscription_user"] ?? "";
    echo $email;

    // QUERY:: inset to database 
    $subscription_query = $dbConnection->prepare("INSERT INTO pmk_subscribe (email) VALUES (?)");
    $subscription_query->bind_param("s", $email);
    $outcome_subscription_query = $subscription_query->execute();

    if ($outcome_subscription_query) {
        header("Location: ../index.php");
    }
}
