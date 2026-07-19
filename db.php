<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$database = "logistics_db";

// Create Connection
$conn = new mysqli(
    $servername,
    $username,
    $password,
    $database
);

// Check Connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

?>