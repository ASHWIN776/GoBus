<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seats</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- External CSS -->
    <?php 
        require '../assets/styles/admin.php';
        require '../assets/styles/admin-options.php';
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
            <section id="seat">
                <div id="head">
                    <h2>Seat Status</h2>
                    <div id="search">
                        <div id="wrapper">
                            <input type="text" name="search" placeholder="Search">
                            <a href="#"><i class="fas fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div id="main">
                    <form action="" method="GET">
                        <input type="text" id="bus-no" name="bus-no" placeholder="Bus Number">
                        <button>Search</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
</body>
</html>