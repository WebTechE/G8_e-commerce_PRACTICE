<?php
session_start();

include_once "config_db.php";
include_once "inc/functions.php";
include_once "inc/validation.php";

$statusCode = 0;
$action = $_POST['action'] ?? '';

//db connection
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connection, "utf8");
if (!$connection) {
    throw new Exception("Cannot connect to database");
} else {
    if ('register' == $action) {

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($email && $password) {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users(name, email, password, phone, address) VALUES('{$name}','{$email}','{$hash}','{$phone}','{$address}')";
            mysqli_query($connection, $query);
            if (mysqli_error($connection)) {
                echo $statusCode = 1;
            } else {
                echo $statusCode = 3;
            }
        } else {
            $statusCode = 2;
        }
        header("Location: registration.php?status={$statusCode}");
    } elseif ('login' == $action) {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($email && $password) {
            $query = "SELECT id, name, password FROM users WHERE email='{$email}'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                $_password = $data['password'];
                $_id = $data['id'];
                $_name = $data['name'];
                if (password_verify($password, $_password)) {
                    $_SESSION['id'] = $_id;
                    $_SESSION['name'] = $_name;
                    header("Location: admin.php");
                    die();
                } else {
                    echo $statusCode = 4;
                }
            } else {
                echo $statusCode = 5;
            }
        } else {
            $statusCode = 2;
        }
        header("Location: index.php?status={$statusCode}");
    } elseif ('addproduct' == $action) {
        $pro_name = $_REQUEST['name'] ?? '';
        $pro_definition = $_REQUEST['definition'] ?? '';
        $pro_price = $_REQUEST['price'] ?? 0;
        $pro_quantity = $_REQUEST['quantity'] ?? 0;
        $pro_status = $_REQUEST['isavailable'] ?? '';
        $pro_image = $_REQUEST['photo'] ?? '';

        $_user_id = $_SESSION['id'];

//        $dd = $_FILES['photo']['name'];
////        echo $dd;

        photoChecking('photo');

        //TODO
        //PHOTO adding path

        $_user_id = $_SESSION['id'] ?? 0;
        if ($pro_name && $pro_definition && $pro_price && $pro_quantity && $_user_id) {
            $query = "INSERT INTO product(product_name, product_price, product_brand, product_quantity, product_status, product_image) VALUES ('{$pro_name}','{$pro_price}','{$pro_definition}','{$pro_quantity}','{$pro_status}', '{$_user_id}')";
//           echo $query;
            mysqli_query($connection, $query);
        }
        header("Location: admin.php");
    }
}

