<?php
    include_once 'inc/validation.php';
    include_once 'inc/functions.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="home">
<div class="container" id="main">
<!--  Logo  -->
    <h1 class="maintitle">
        <i class="fas fa-store"></i> <br/>G8 E-commerce
    </h1>

<!--  form  -->
    <div class="row navigation">
        <div class="column column-60 column-offset-20">
            <div class="formaction">
                <!-- path (index.php, registration.php) -->
                <a href="index.php" id="login">Login</a> | <a href="registration.php" id="register">Register Account</a>
            </div>
            <div class="formc">
                <form id="form01" method="post" action="tasks.php">
                    <h3>Registration</h3>
                    <fieldset>
                        <label for="name">Name <span style="color:red;">* <?php echo $nameErr; ?></span></label>
                        <input type="text" placeholder="Full Name" id="name" name="name" value="<?php echo $name; ?>">
                        <label for="email">Email <span style="color:red;">* <?php echo $emailErr; ?></span></label>
                        <input type="text" placeholder="Email Address" id="email" name="email" value="<?php echo $email; ?>">
                        <label for="password">Password <span style="color:red;">* <?php echo $passwordErr; ?></span></label>
                        <input type="password" placeholder="Password" id="password" name="password">
                        <label for="address">Address <span style="color:red;">* <?php echo $addressErr; ?></span></label>
                        <input type="text" placeholder="address" id="address" name="address" value="<?php echo $address; ?>">
                        <label for="phone">Phone <span style="color:red;">* <?php echo $phoneErr; ?></span></label>
                        <input type="text" placeholder="phone" id="phone" name="phone" value="<?php echo $phone; ?>">

                        <p>
                            <?php
                            $status = $_GET['status'] ?? 0;
                            if ($status) {
                                echo "<span style=\"color:red;\">".getStatusMessage($status)."</spna>";
                            }
                            ?>
                        </p>

                        <input class="button-primary" type="submit" value="Submit">
                        <input type="hidden" name="action" id="action" value="register">
                    </fieldset>
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>