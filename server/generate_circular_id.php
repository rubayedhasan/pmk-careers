<?php

// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;


$category = strtoupper(trim($_POST['category']));
$year = date("Y");
$prefix = $category . $year;

$sql = "SELECT circular_id
        FROM publish_circular
        WHERE circular_id LIKE '$prefix%'
        ORDER BY circular_id DESC
        LIMIT 1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $lastSequence = (int)substr($row['circular_id'], -4);
    $nextSequence = $lastSequence + 1;
} else {
    $nextSequence = 1;
}

echo $prefix . str_pad($nextSequence, 4, "0", STR_PAD_LEFT);


// close the database connection 
mysqli_close($dbConnection);
