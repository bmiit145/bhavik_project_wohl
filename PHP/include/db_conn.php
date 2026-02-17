<?php
// db_conn.php

$host = "localhost";
$user = "root";
$password = "";
$database = "wohl";

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
