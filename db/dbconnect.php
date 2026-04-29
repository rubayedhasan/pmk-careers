<?Php
$hostName = "localhost";
$userName = "root";
$password = null;
$database = "career_registration";

// database connection 
$conn = new mysqli($hostName, $userName, $password, $database);

// validation connection 
if ($conn->connect_error) {
    die("Failed to connect the database" . $conn->connect_error);
}
