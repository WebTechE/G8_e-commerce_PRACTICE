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
    <div class="wordsc helement" id="words">
        <div class="row">
            <div class="column column-50">
                <div class="alphabets">
                    <select id="alphabets">
                        <option value="all">All Catagory</option>
                        <option value="A">A#</option>
                        <option value="B">B#</option>
                        <option value="C">C#</option>
                    </select>

                </div>
            </div>
            
            <div class="column column-50">
                <form action="" method="POST">
                    <button class="float-right" name="submit" value="submit">Search</button>
                    <input type="text" name="search" class="float-right" style="width: 50%; margin-right:20px;" placeholder="Search">
                </form>
            </div>
            </div>
        </div>
        <hr>

        <table class="words" >
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
                <td>1</td>
                <td>Chocolate</td>
                <td>20mg dark - Valrhona</td>
                <td>200</td>
                <td>10</td>
                <td>available</td>
                <td><a class="button button-outline" href="#">view</a></td>
            </tbody>
        </table>
    </div>

    <div class="formc helement" id="wordform" style="display: none;">
        <form action="tasks.php" method="post">
            <h4>Add New Word</h4>
            <fieldset>
                <label for="word">Word</label>
                <input type="text" name="word" placeholder="Word" id="word">
                <label for="Meaning">Meaning</label>
                <textarea name="meaning" placeholder="Meaning" id="Meaning" style="height:100px" rows="10"></textarea>
                <input type="hidden" name="action" value="addword">
                <input class="button-primary" type="submit" value="Add Word">
            </fieldset>
        </form>
    </div>

</div>
</body>
</html>