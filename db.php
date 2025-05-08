<?php
$host = "localhost";
$user = "root";
$password = ""; // Replace with your database password
$database = "grand_dragon";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>


