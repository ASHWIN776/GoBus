<!-- Show these admin pages only when the admin is logged in -->
<?php  require '../assets/partials/_admin-check.php';   ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
            <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
        <!-- External CSS -->
        <?php 
        require '../assets/styles/admin.php';
        require '../assets/styles/signup.php';
    ?>
    </head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';?>

            <section id="add-admin">
                <div>
                    <div id="signupForm">
                        <h2>ADMIN SIGNUP</h2>
                        <form action="../assets/partials/_handleSignup.php" method="POST">
                            <div>
                                <input type="text" name="firstName" placeholder="First Name*">
                                <input type="text" name="lastName" placeholder="Last Name*">
                            </div>
                            <div>
                                <input type="text" name="username" placeholder="Username*">
                            </div>
                            <div>
                                <input type="text" name="password" placeholder="Password*">
                            </div>
                            <div>
                                <input type="text" name="confPassword" placeholder="Confirm Password*">
                                <span>Password should be more than 8 characters</span>
                            </div>
                            <button id="signup-btn" type="submit" name="signup">SIGNUP</button>
                        </form>
                    </div>
                </div>
                <div>
                </div>
            </section>
        </div>  
</body>
</html>