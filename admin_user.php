<?php
session_start([
    'cookie_lifetime' => 300,
]);

include_once 'inc/functions.php';

$_user_id = $_SESSION['id'] ?? 0;
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
        <li><a href="admin.php" class="menu-item">All Products</a></li>
        <li><a href="add_product.php" class="menu-item">Add New Products</a></li>
        <li><a href="admin_user.php" class="menu-item">All Users</a></li>
        <li><a href="#" class="menu-item">Order List</a></li>
        <br>
        <li><a href="index.php">Logout</a></li>
    </ul>
</div>
<div class="container" id="main">

    <h1 class="maintitle">
        <i class="fas fa-store"></i> <br> Admin Dashboard
    </h1>
    <div class="wordsc helement" id="users">
        <div class="row">
            <div class="column column-50">
                <div class="alpha">
                    <select id="alpha">
                        <option value="all">All User</option>
                        <option value="Admin">Admin</option>
                        <option value="Employee">Employees</option>
                        <option value="Customer">Customers</option>
                    </select>

                </div>
            </div>

            <div class="column column-50">
                <form action="" method="POST">
                    <button class="float-right" name="submit" value="submit">Search</button>
                    <input type="text" name="search" id="numb"  class="float-right" style="width: 50%; margin-right:20px;"
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
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_POST['submit'])){
            $serachedText = $_POST['search'];
            $users = getUsers($serachedText);
        }else {
            $users = getUsers();
        }

        if (count($users) > 0) {
            $length = count($users);
            for ($i = 0; $i < $length; $i++) {
                ?>
                <tr>
                    <td><?php echo $users[$i]['id']; ?></td>
                    <td><?php echo $users[$i]['name']; ?></td>
                    <td><?php echo $users[$i]['email']; ?></td>
                    <td><?php echo $users[$i]['phone']; ?></td>
                    <td><?php echo $users[$i]['address']; ?></td>
                    <td><a class="button button-outline" href="#">view</a></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>