<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "branch_directory";
$socket = "/data/data/com.termux/files/usr/var/run/mysqld.sock"; // Termux MariaDB socket

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, null, $socket);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

