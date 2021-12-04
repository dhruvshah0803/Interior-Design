<?php
$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create database
$sql = "CREATE DATABASE PROJECT";

if ($conn->query($sql) === TRUE) {
    echo "database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
