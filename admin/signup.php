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
    <header>
        <nav id="navbar">
            <ul>
                <li class="nav-item">ADMIN</li>
                <li class="nav-item">
                    <img class="adminDp" src="../assets/img/admin_pic.jpg" alt="Admin Profile Pic" width="22px" height="22px">
                </li>
            </ul>
        </nav>
    </header>
    <main id="container">
        <div id="sidebar">
            <div>
                <img class="adminDp" src="../assets/img/admin_pic.jpg" alt="Admin Profile Pic">
                <h3>Admin</h3>
                <p>Senior Developer</p>
            </div>
            <ul id="options">
                <li class="option">
                    <a href="./dashboard.html">
                        Dashboard
                    </a>
                </li>
                <li class="option">
                    <a href="./booking.html">
                        Bookings
                    </a>
                </li>
                <li class="option">
                    <a href="./bus.html">
                        Buses
                    </a>
                </li>
                <li class="option">
                    <a href="./route.html">
                        Routes    
                    </a>
                </li>
                <li class="option">
                    <a href="./seat.html">
                        Seats
                    </a>
                </li>
                <li class="option">
                    <a href="./customer.html">
                        Customers
                    </a>
                </li>
                <li class="option">
                    <a href="./signup.html">
                        Add New Admin        
                    </a>
                </li>
            </ul>
        </div>
        <div id="main-content">
            <section id="welcome">
                <ul>
                    <li class="welcome-item">Welcome Admin</li>
                    <li class="welcome-item">
                        <button id="logout">
                            LOGOUT
                        </button>
                    </li>
                </ul>
            </section>
            <section id="add-admin">
                <div>
                    <div id="signupForm">
                        <h2>ADMIN SIGNUP</h2>
                        <form action="" method="POST">
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