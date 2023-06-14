<?php
// Database credentials
$servername = "161.132.38.147";
$username = "reyes03";
$password = "3l3m3nt";
$dbname = "proyectophp";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
