<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MBATECH";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE appointments (
firstname VARCHAR(30) NOT NULL,
email VARCHAR(50),
address1 VARCHAR(50),
city VARCHAR(30),
state_name VARCHAR(30),
zip INT(30),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
