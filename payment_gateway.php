<?php
$firstname = $email = $cc = $cvv = $expyear = $zip = "";
$Errcc = $length = $Errname = $Errmail = $Errcvv = $Erryear = $Errzip = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    if (!preg_match("/^[a-zA-z]*$/", $firstname)) {
        $Errname = "Only alphabets and whitespace are allowed.";
        echo $Errname;
    } else {
        return true;
    }
    $email = $_POST["email"];
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    if (!preg_match($pattern, $email)) {
        $Errmail = "Email is not valid.";
        echo $Errmail;
    } else {
        return true;
    }
    $cc = strlen($_POST["cardnumber"]);
    $length = strlen($cc);
    if ($length < 16 && $length > 16) {
        $Errcc = "Credit card must have 16 digits.";
        echo $Errcc;
    } else {
        return true;
    }
    $cvv = $_POST["cvv"];
    if(!preg_match("/^[0-9]{3,4}$/", $cvv)){
        $Errcvv = "Invalid CVV number!";
        echo $Errcvv;
    } else{
        return true;
    }
    $zip = $_POST[$zip];
    $len = strlen($zip);
    if($len > 6 || $len < 5){
        $Errzip = "Enter valid zip code!";
        echo $Errzip;
    } else {
        return true;
    }
    $expyear = $_POST[$expyear];
    if($expyear < 2020){
        $Erryear = "Enter valid expiration year";
        echo $Erryear;
    } else {
        return true;
    }
}
?>