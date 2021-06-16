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
    $destination_state = strtoupper($_POST["destination_state"]);

    
    $sql = "SELECT * FROM routes WHERE route_dep_date='$dep_date'";
    $result = mysqli_query($conn, $sql);
    $no_results = mysqli_num_rows($result);
    $count = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        $citiesArr = explode(",",$row["route_cities"]);
        
        // Search the tables if we have any routes thats matches the form details
        if(!in_array($source, $citiesArr) || !in_array($destination, $citiesArr) || !(array_search($source, $citiesArr) < array_search($destination, $citiesArr)))
            continue;
        $count++;
    }

    $sql = "SELECT * FROM routes WHERE route_dep_date='$dep_date'";
    $result = mysqli_query($conn, $sql);
    $no_results = mysqli_num_rows($result);


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
    <div id="covidInfo">

    </div>
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
                <li class="searched-route-item" id="">Total Results : <span id="result-num">
                    <?php 
                        echo $count;
                    ?>
                </span></li>
                <li class="searched-route-item"><?php echo $source; ?> <span class="arrow">&rarr;</span> <?php echo $destination; ?>
                <li class="searched-route-item" id="date">
                <?php 
                    // Changing format from yyyy-mm-dd to dd-mm-yyyy
                    $dep_date = implode("-",(array_reverse(explode("-", $dep_date))));
                    
                    echo $dep_date;

                ?></li>
            </ul>
        </section>
        <section id="searched-results">
        <?php 
            while($row = mysqli_fetch_assoc($result))
            {
                $citiesArr = explode(",",$row["route_cities"]);
                
                // Search the tables if we have any routes that matches the form details
                if(!in_array($source, $citiesArr) || !in_array($destination, $citiesArr) || !(array_search($source, $citiesArr) < array_search($destination, $citiesArr)))
                    continue;

                
                
                $route_id = $row["route_id"];
                $route_dep_time = $row["route_dep_time"];
                $route_stepCost = $row["route_step_cost"];
                $bus_no = $row["bus_no"];

                $source_idx = array_search($source, $citiesArr);
                $dest_idx = array_search($destination, $citiesArr);

                $viaCities = false;
                if($source_idx + 1 != $dest_idx)
                {
                    $viaCities = implode(",", array_slice($citiesArr, $source_idx + 1, $dest_idx - $source_idx));
                }

                $booking_amount = ($dest_idx - $source_idx) * $route_stepCost;
                
                $booked_seats = get_from_table($conn,"seats", "bus_no", $bus_no, "seat_booked");
                    
                $booked_seatsArr = [];

                if($booked_seats)
                $booked_seatsArr = explode(",", $booked_seats);

                $no_available_seats = 38 - count($booked_seatsArr);
                ?>
                <div class="searched-container">
                    <div class="searched-result-item">
                        <div class="route-id">
                            <p>
                                <?php echo $route_id; ?>
                            </p>
                        </div>
                        <div class="timing">
                            <p>
                                <?php 
                                    echo $route_dep_time;
                                ?>
                            </p>
                        </div>
                        <div class="route-desc" data-dest="<?php echo $destination_state; ?>">
                            <p class="main-route">
                                <span class="source-route">
                                    <?php 
                                        echo $source;
                                    ?>
                                </span> 
                                <span class="arrow">&rarr;</span> 
                                <span class="dest-route">
                                    <?php 
                                        echo $destination;
                                    ?>
                                </span>
                            </p>
                            <p class="cities">
                                <?php if($viaCities){ ?>
                                    <span class="via">Via</span> 
                                    <?php 
                                        echo $viaCities;
                                }
                                else{ ?>
                                    <span class="via">Direct</span>
                                <?php }
                                ?>
                            </p>
                        </div>
                        <div class="seats-desc">
                            <div>
                                <span class="num-seats">
                                <!-- Total or taken?? -->
                                <?php 
                                    echo $no_available_seats;
                                ?>
                            </span> seats
                            </div>
                        </div>
                        <div class="booking-desc">
                            <p class="price"><i class="fas fa-rupee-sign"></i> 
                                <?php 
                                    echo $booking_amount;
                                ?></p>
                            <button class="book-seat-btn" data-busno="<?php 
                            echo $bus_no;?>" data-seats="<?php echo $booked_seats; ?>" data-routeid="<?php echo $route_id; ?>" data-amount="<?php echo $booking_amount; ?>" data-source="<?php echo $source; ?>" data-destination="<?php echo $destination; ?>">
                                Select Seats
                            </button>
                        </div>
                    </div>
                <!-- Book Row -->
                <div class="bookContainer">
                
                </div>
            </div>
        <?php  }?>
        </section>
    </main>
    <script src="assets/scripts/booking.js"></script>
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>