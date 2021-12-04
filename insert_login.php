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
$firstname = $lastname = $contact = "";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$contact = $_POST["contact"];

// Validations
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $firstNameError = $lastNameError = $contactError = ""; // errors

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

  if (empty($contact)) $contactError = "Contact field is empty";
  else {
    if (strlen($contact) != 10) $contactError = "Contact must be 10 digits";
    else {
      $name = test_input($contact);

      if (!preg_match("/^[0-9]*$/", $name))
        $contactError = "Only digits allowed";
    }
  }

}
// End of Validations

if ($firstNameError === "" && $lastNameError === "" && $contactError === "") {
  $sql = "INSERT INTO employee(firstname,lastname,contact)
  VALUES ('$firstname','$lastname','$contact')";

  if ($conn->query($sql) === TRUE) header("Location:index.html");
  else echo "Error: " . $sql . "<br>" . $conn->error;
}
else echo $firstNameError . "<br>" . $lastNameError . "<br>" . $contactError . "<br>Record not stored";
