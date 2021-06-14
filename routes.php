<?php
    require 'assets/partials/_functions.php';
    $conn = db_connect();    

    if(!$conn) 
        die("Connection Failed");

    if(!$_SERVER["REQUEST_METHOD"] == "POST" || !isset($_POST["search"]))
    {
        header("location: index.php");
        exit;
    }

    $source = strtoupper($_POST["source"]);
    $destination = strtoupper($_POST["destination"]);
    $dep_date = $_POST["departure"];

    
    $sql = "SELECT * FROM routes WHERE route_dep_date='$dep_date'";
    $result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes Search Page</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS -->
    <?php require 'assets/styles/search_routes.php'?>
</head>
<body>
    <header>
        <nav id="navbar">
            <div>
                <a href="#" class="nav-item nav-logo">Logo</a>
                <a href="#" class="nav-item">Gallery</a>
            </div>
            <ul>
                <li><a href="#" class="nav-item">Home</a></li>
                <li><a href="#about" class="nav-item">About</a></li>
                <li><a href="#contact" class="nav-item">Contact</a></li>
            </ul>
            <div>
                <a href="#" class="login nav-item"><i class="fas fa-sign-in-alt" style="margin-right: 0.4rem;"></i>Login</a>
                <a href="#pnr-enquiry" class="pnr nav-item">PNR Enquiry</a>
            </div>
        </nav>
    </header>
    <main id="container">
        <section id="searched-route">
            <ul>
                <li class="searched-route-item" id="">Total Results : <span id="result-num">100</span></li>
                <li class="searched-route-item"><?php echo $source; ?> <span class="arrow">&rarr;</span> <?php echo $destination; ?>
                <li class="searched-route-item" id="date"><?php echo $dep_date; ?></li>
            </ul>
        </section>
        <section id="searched-results">
        <?php 
            while($row = mysqli_fetch_assoc($result))
            {
                $citiesArr = explode(",",$row["route_cities"]);
                
                // Search the tables if we have any routes thats matches the form details
                if(!in_array($source, $citiesArr) || !in_array($destination, $citiesArr) || !(array_search($source, $citiesArr) < array_search($destination, $citiesArr)))
                    continue;
                
                $route_id = $row["route_id"];
                $route_dep_time = $row["route_dep_time"];
                $route_stepCost = $row["route_step_cost"];

                $source_idx = array_search($source, $citiesArr);
                $dest_idx = array_search($destination, $citiesArr);

                $viaCities = implode(",", array_slice($citiesArr, $source_idx, $dest_idx - $source_idx));

                $booking_amount = ($dest_idx - $source_idx) * $route_stepCost;
            

                ?>

                <div id="searched-result-item">
                    <div id="route-id">
                        <p>
                            <?php echo $route_id; ?>
                        </p>
                    </div>
                    <div id="timing">
                        <p>
                            <?php 
                                echo $route_dep_time;
                            ?>
                        </p>
                    </div>
                    <div id="route-desc">
                        <p id="main-route">
                            <span id="source-route">
                                <?php 
                                    echo $source;
                                ?>
                            </span> 
                            <span class="arrow">&rarr;</span> 
                            <span id="dest-route">
                                <?php 
                                    echo $destination;
                                ?>
                            </span>
                        </p>
                        <p id="cities">
                            <span class="via">Via</span> 
                            <?php 
                                echo $viaCities;
                            ?>
                        </p>
                    </div>
                    <div id="seats-desc">
                        <div>
                            <span id="num-seats">
                            <!-- Total or taken?? -->
                            30
                        </span> seats
                        </div>
                    </div>
                    <div id="booking-desc">
                        <p id="price"><i class="fas fa-rupee-sign"></i> 
                            <?php 
                                echo $booking_amount;
                            ?></p>
                        <button id="book-seat-btn">
                            Select Seats
                        </button>
                    </div>
                </div>
           <?php  }
        
        ?>
        </section>
    </main>
</body>
</html>