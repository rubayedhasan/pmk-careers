<?Php
// local database connection 
// $hostName = "localhost";
// $userName = "root";
// $password = null;
// $database = "pmk_web";

// connect with server database 
$hostName = "103.139.165.100";
$userName = "pmk_others_pmk_web";
$password = "f474b63d30e68";
$database = "pmk_others_pmk_web";

// database connection 
$conn = new mysqli($hostName, $userName, $password, $database);
mysqli_set_charset($conn, "utf8mb4");

// validation connection 
if ($conn->connect_error) {
    die("Failed to connect the database" . $conn->connect_error);
}
