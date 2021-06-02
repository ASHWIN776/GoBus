<?php

    require '_functions.php';
    $conn = db_connect();

    // Getting user details
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result))
    {
        $user_fullname = $row["user_fullname"];
        $user_name = $row["user_name"];
    }
?>

<header>
        <nav id="navbar">
            <ul>
                <li class="nav-item">
                    <?php 
                        echo $user_name;
                    ?>
                </li>
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
                <h3>
                    <?php  echo $user_name;  ?>
                </h3>
                <p>Senior Developer</p>
            </div>
            <ul id="options">
                <li class="option">
                    <a href="#">
                        Dashboard
                    </a>
                </li>
                <li class="option">
                    <a href="./booking.php">
                        Bookings
                    </a>
                </li>
                <li class="option">
                    <a href="./bus.php">
                        Buses
                    </a>
                </li>
                <li class="option">
                    <a href="./route.php">
                        Routes    
                    </a>
                </li>
                <li class="option">
                    <a href="./seat.php">
                        Seats
                    </a>
                </li>
                <li class="option">
                    <a href="./customer.php">
                        Customers
                    </a>
                </li>
                <li class="option">
                    <a href="./signup.php">
                        Add New Admin        
                    </a>
                </li>
            </ul>
        </div>
        <div id="main-content">
            <section id="welcome">
                <ul>
                    <li class="welcome-item">Welcome, 
                        <?php 
                            echo $user_fullname;
                        ?>
                    </li>
                    <li class="welcome-item">
                        <button id="logout">
                            <a href="../assets/partials/_logout.php">LOGOUT</a>
                        </button>
                    </li>
                </ul>
            </section>