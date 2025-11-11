<?php
$servername = "localhost";
$username = "root";
$password = ""; // Termux default root has no password
$dbname = "branch_directory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
