<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PROJECT";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE employee (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
contact VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";
$sql = "CREATE TABLE contact (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
description VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table employee created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
