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
$firstname = $email = $address1 = $city = $state_name = $zip = $reg_date = "";
$firstname = $_POST["firstname"];
$email = $_POST["email"];
$address1 = $_POST["address1"];
$city = $_POST["city"];
$state_name = $_POST["state_name"];
$zip = $_POST["zip"];

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstNameError = $emailErr = "";
    if (empty($firstname)) $firstNameError = "First Name field is empty";
    else {
        $name = test_input($firstname);
        if (!preg_match("/^[a-zA-Z]*$/", $name))
            $firstNameError = "Only letters and white spaces allowed";
    }
    if (empty($email)) $emailErr = "Email field empty.";
    else {
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $emailErr = "Enter valid mail id!";
    }
}
if ($firstNameError === "" && $emailErr === "") {
    $sql = "INSERT INTO appointments (firstname,email,address1,city,state_name,zip)
VALUES ('$firstname', '$email', '$address1', '$city', '$state_name', '$zip')";
} else echo $firstNameError . "<br>" . $emailErr . "<br>Record not stored";

if ($conn->query($sql) === TRUE) {
    echo "Booked appointment successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}