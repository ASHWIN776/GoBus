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
    <!-- CSS -->
    <?php
        require '../assets/styles/admin.php';
        require '../assets/styles/dashboard.php';
    ?>
</head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';?>

            <section id="dashboard">
                <h3>Status</h3>
                <div id="status">
                    <div id="Booking" class="info-box status-item">
                        <div class="heading">
                            <h5>Bookings</h5>
                            <div class="info">
                                <i title="Details about the bookings" class="fas fa-info-circle"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Bookings</p>
                            <p class="num">24</p>
                        </div>
                        <a href="./booking.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Bus" class="info-box status-item">
                        <div class="heading">
                            <h5>Buses</h5>
                            <div class="info">
                                <i title="Details about the buses"  class="fas fa-info-circle"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Buses</p>
                            <p class="num">69</p>
                        </div>
                        <a href="./bus.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Route" class="info-box status-item">
                        <div class="heading">
                            <h5>Routes</h5>
                            <div class="info">
                                <i title="Details about the routes" class="fas fa-info-circle"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Routes</p>
                            <p class="num">9</p>
                        </div>
                        <a href="./route.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Seat" class="info-box status-item">
                        <div class="heading">
                            <h5>Seats</h5>
                            <div class="info">
                                <i title="Details about the seats" class="fas fa-info-circle"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Seats</p>
                            <p class="num">50</p>
                        </div>
                        <a href="./seat.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <h3>User</h3>
                <div id="user">
                    <div id="Customer" class="info-box user-item">
                        <div class="heading">
                            <h5>Customers</h5>
                            <div class="info">
                                <i title="Details about the customers" class="fas fa-info-circle"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Customers</p>
                            <p class="num">100</p>
                        </div>
                        <a href="./customer.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Admin" class="info-box user-item">
                        <div class="heading">
                            <h5>Admins</h5>
                            <div class="info">
                                <i title="Details about the admins" class="fas fa-info-circle"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Admins</p>
                            <p class="num">6</p>
                        </div>
                        <a href="#admin">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <h3>Admin</h3>
                <div id="admin">
                    <div class="info-box admin-item">
                        <img src="../assets/img/admin1.png" alt="Profile Pic">
                        <h4>Admin - 1</h4>
                        <p class="bio">Front End Developer</p>
                    </div>
                    <div class="info-box admin-item">
                        <img src="../assets/img/admin2.png" alt="Profile Pic" >
                        <h4>Admin - 2</h4>
                        <p class="bio">Front End Developer</p>
                    </div>
                    <div class="info-box admin-item">
                        <img src="../assets/img/admin3.png" alt="Profile Pic" >
                        <h4>Admin - 3</h4>
                        <p class="bio">Front End Developer</p>
                    </div>
                    <div class="info-box admin-item">
                        <img src="../assets/img/admin4.png" alt="Profile Pic" >
                        <h4>Admin - 4</h4>
                        <p class="bio">Front End Developer</p>
                    </div>
                    <div class="info-box admin-item">
                        <img src="../assets/img/admin5.png" alt="Profile Pic" >
                        <h4>Admin - 5</h4>
                        <p class="bio">Front End Developer</p>
                    </div>
                    <div class="info-box admin-item">
                        <img src="../assets/img/admin6.png" alt="Profile Pic" >
                        <h4>Admin - 6</h4>
                        <p class="bio">Front End Developer</p>
                    </div>
                </div>
                <h3>Activity</h3>
                <div id="activity">
                    <h4>Activity here</h4>
                </div>
            </section>
        </div>
    </main>
</body>
</html>