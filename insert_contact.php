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

// Fetching data
$firstname = $lastname = $description = "";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$description = $_POST["description"];

// Validations
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstNameError = $lastNameError = $descriptionError = ""; // errors

    if (empty($firstname)) $firstNameError = "First Name field is empty";
    else {
        $name = test_input($firstname);

        if (!preg_match("/^[a-zA-Z]*$/", $name))
            $firstNameError = "Only letters and white spaces allowed";
    }

    if (empty($lastname)) $lastNameError = "Last Name field is empty";
    else {
        $name = test_input($lastname);

        if (!preg_match("/^[a-zA-Z]*$/", $name))
            $lastNameError = "Only letters and white spaces allowed";
    }

    if (empty($description)) $descriptionError = "description field is empty";
}
// End of Validations

if ($firstNameError === "" && $lastNameError === "" && $descriptionError === "") {
    $sql = "INSERT INTO contact (firstname,lastname,description)
  VALUES ('$firstname','$lastname','$description')";
} else echo $firstNameError . "<br>" . $lastNameError . "<br>" . $descriptionError . "<br>Record not stored";

if ($conn->query($sql) === TRUE) echo "Thank you for your feedback";
else echo "Error: " . $sql . "<br>" . $conn->error;
