<?php
session_start([
    'cookie_lifetime' => 300,
]);

include_once 'inc/functions.php';

$_user_id = $_SESSION['id'] ?? 0;

//setting cookie
setcookie('userIdCookie', $_user_id, time() + 300);

$_user_name = $_SESSION['name'] ?? '';
if (!$_user_id) {
    header("Location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="panel">
<div class="sidebar">
    <h4>Menu</h4>
    <ul class="menu">
        <li><a href="#" class="menu-item">Profile <?php echo "(" . $_user_name . ")"; ?></a></li>
        <br>
        <li><a href="admin.php" class="menu-item" data-target="words">All Products</a></li>
        <li><a href="add_product.php" class="menu-item">Add New Products</a></li>
        <li><a href="admin_user.php" class="menu-item" data-target="users">All Users</a></li>
        <li><a href="#" class="menu-item">Order List</a></li>
        <br>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="container" id="main">
    <h1 class="maintitle">
        <i class="fas fa-store"></i> <br> Admin Dashboard
    </h1>

    <div class="wordsc helement" id="words">
        <div class="row">
            <div class="column column-50">
                <div class="alpha">
                    <select id="alpha">
                        <option value="all">All Catagory</option>
                        <option value="e">Electronics</option>
                        <option value="g">Groceries</option>
                        <option value="h">Health & Beauty</option>
                    </select>

                </div>
            </div>

            <div class="column column-50">
                <form action="" method="POST">
                    <!--                    <button class="float-right" name="submit" value="submit">Search</button>-->
                    <input type="text" name="search" id="myInput" onkeyup="productSearch()" class="float-right"
                           style="width: 50%; margin-right:20px;"
                           placeholder="Search">
                </form>
            </div>
        </div>
    </div>
    <hr>

    <table class="words" id="myTable">
        <thead>
        <tr>
            <th>#Id</th>
            <th width="20%">Name</th>
            <th>Definition</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $words = getProducts();


        if (count($words) > 0) {
            $length = count($words);
            for ($i = 0; $i < $length; $i++) {
                ?>
                <tr>
                    <td><?php echo $words[$i]['id']; ?></td>
                    <td><?php echo $words[$i]['product_name']; ?></td>
                    <td><?php echo $words[$i]['product_brand']; ?></td>
                    <td><?php echo $words[$i]['product_price']; ?></td>
                    <td><?php echo $words[$i]['product_quantity']; ?></td>
                    <td class="status"><?php echo $words[$i]['product_status']; ?></td>
                    <td><a class="button button-outline" href="#">view</a></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>


</div>
<script src="//code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="assets/js/script.js?1"></script>
</body>
</html>