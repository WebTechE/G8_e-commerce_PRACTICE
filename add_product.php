<?php

$types = array(
    'image/png',
    'image/jpg',
    'image/jpeg'
);
if($_FILES['photo']){
    if(in_array($_FILES['photo']['type'], $types) !== false && $_FILES['photo']['size'] < 3*1024*1024){
        move_uploaded_file($_FILES['photo']['tmp_name'], "assets/images/".$_FILES['photo']['name']);
    }
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
        <li><a href="#" class="menu-item">Profile</a></li><br>
        <li><a href="admin.php" class="menu-item">All Products</a></li>
        <li><a href="add_product.php" class="menu-item">Add New Products</a></li>
        <li><a href="admin_user.php" class="menu-item">All Users</a></li>
        <li><a href="#" class="menu-item">Order List</a></li><br>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
<div class="container" id="main">

    <h1 class="maintitle">
        <i class="fas fa-store"></i> <br> Admin Dashboard
    </h1>

    <pre>
        <p>
            <?php print_r($_FILES) ?>
        </p>
    </pre>

    <div class="wordsc helement" id="words">
            <div class="formc">
                <form id="form01" method="post" enctype="multipart/form-data">
                    <h3>Add Product</h3>
                    <fieldset>
                        <label for="name">Name</label>
                        <input type="text" placeholder="Full Name" id="name" name="name">
                        <label for="definition">Definition</label>
                        <input type="text" placeholder="Definition" id="definition" name="definition">
                        <label for="price">Price</label>
                        <input type="number" placeholder="Price" id="price" name="price">
                        <label for="quantity">Quantity</label>
                        <input type="number" placeholder="Quantity" id="quantity" name="quantity">
                        <div class="row">
                            <input type="radio" id="available" name="isavailable" value="Available">
                            <label for="available" style="margin-right: 10px;">Available</label>
                            <input type="radio" id="unavailable" name="isavailable" value="Not Available">
                            <label for="unavailable">Not Available</label>
                        </div>
                        
                        <label for="photo"></label>
                        <input type="file" name="photo" id="photo"> <br>
                        <input class="button-primary" type="submit" value="Submit">
                        <input type="hidden" name="action" id="action" value="login">
                    </fieldset>
                </form>
            </div>
        
            </div>
        <hr>
</div>
</div>
</body>
</html>