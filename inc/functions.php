<?php

//include_once '../config_db.php';

$connection = mysqli_connect('localhost', 'root', '', 'e-commerce');
mysqli_set_charset($connection, "utf8");
if (!$connection) {
    echo mysqli_error($connection);
    throw new Exception("Cannot connect to database");
}

function photoChecking(string $photo)
{
    $types = array(
        'image/png',
        'image/jpg',
        'image/jpeg'
    );
    if (isset($_FILES[$photo])) {
        if (in_array($_FILES[$photo]['type'], $types) !== false && $_FILES[$photo]['size'] < 3 * 1024 * 1024) {
            move_uploaded_file($_FILES[$photo]['tmp_name'], "assets/images/" . $_FILES[$photo]['name']);
        }
    }
}

function getStatusMessage($statusCode = 0)
{
    $status = [
        '0' => '',
        '1' => 'Duplicate Entry Try New EMAIL',
        '2' => 'All must be Fill up',
        '3' => 'User Created Successfully',
        '4' => 'Email or Password didn\'t match',
        '5' => 'Email doesn\'t exist',

    ];

    return $status[$statusCode];
}


function getProducts()
{
    global $connection;

    $query = "SELECT * FROM product";

    $result = mysqli_query($connection, $query);
    $data = [];
    while ($_data = mysqli_fetch_assoc($result)) {
        array_push($data, $_data);
    }
    return $data;

}

function getUsers($search = null)
{
    global $connection;
    if ($search) {
        $query = "SELECT * FROM users WHERE name LIKE '{$search}%'";
    } else {
        $query = "SELECT * FROM users";
    }

    $result = mysqli_query($connection, $query);
    $data = [];
    while ($_data = mysqli_fetch_assoc($result)) {
        array_push($data, $_data);
    }
    return $data;
}