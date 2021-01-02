<?php
//variable declaration
$name = $nameErr = "";
$gender = $genderErr = "";
$email = $emailErr = "";
$password = $passwordErr = "";
$address = $addressErr = "";
$phone = $phoneErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = input_filter($_POST["name"]);
    }

    //email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = input_filter($_POST["email"]);
    }


    //phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = input_filter($_POST["phone"]);
    }

    //address
    if (empty($_POST["address"])) {
        $addressErr = "Phone is required";
    } else {
        $address = input_filter($_POST["address"]);
    }


    //password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    }

    //gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = input_filter($_POST["gender"]);
    }
}


//filter input sanitize. php.net manual
function input_filter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
//    $data = filter_input(INPUT_POST, $data, FILTER_SANITIZE_STRING);

    return $data;
}