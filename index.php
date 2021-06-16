<?php
    require 'assets/partials/_functions.php';
    $conn = db_connect();    

    if(!$conn) 
        die("Connection Failed");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Bookings</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS -->
    <?php 
        require 'assets/styles/styles.php'
    ?>
</head>
<body>
    <?php
    
    if(isset($_GET["booking_added"]))
    {
        if($_GET["booking_added"])
        {
            echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successful!</strong> Booking Added, your PNR is <span style="font-weight:bold; color: #272640;">'. $_GET["pnr"] .'</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else{
            // Show error alert
            echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Booking already exists
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pnr-search"]))
    {
        $pnr = $_POST["pnr"];

        $sql = "SELECT * FROM bookings WHERE booking_id='$pnr'";
        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if($num)
        {
            $row = mysqli_fetch_assoc($result);
            $route_id = $row["route_id"];
            $customer_id = $row["customer_id"];
            
            $customer_name = get_from_table($conn, "customers", "customer_id", $customer_id, "customer_name");

            $customer_phone = get_from_table($conn, "customers", "customer_id", $customer_id, "customer_phone");

            $customer_route = $row["customer_route"];
            $booked_amount = $row["booked_amount"];

            $booked_seat = $row["booked_seat"];
            $booked_timing = $row["booking_created"];

            $dep_date = get_from_table($conn, "routes", "route_id", $route_id, "route_dep_date");

            $dep_time = get_from_table($conn, "routes", "route_id", $route_id, "route_dep_time");

            $bus_no = get_from_table($conn, "routes", "route_id", $route_id, "bus_no");
            ?>

            <div class="alert alert-dark alert-dismissible fade show" role="alert">
            
            <h4 class="alert-heading">Booking Information!</h4>
            <p>
                <button class="btn btn-sm btn-success"><a href="assets/partials/_download.php" class="link-light">Download</a></button>
            </p>
            <hr>
                <p class="mb-0">
                    <ul class="pnr-details">
                        <li>
                            <strong>PNR : </strong>
                            <?php echo $pnr; ?>
                        </li>
                        <li>
                            <strong>Customer Name : </strong>
                            <?php echo $customer_name; ?>
                        </li>
                        <li>
                            <strong>Customer Phone : </strong>
                            <?php echo $customer_phone; ?>
                        </li>
                        <li>
                            <strong>Route : </strong>
                            <?php echo $customer_route; ?>
                        </li>
                        <li>
                            <strong>Bus Number : </strong>
                            <?php echo $bus_no; ?>
                        </li>
                        <li>
                            <strong>Booked Seat Number : </strong>
                            <?php echo $booked_seat; ?>
                        </li>
                        <li>
                            <strong>Departure Date : </strong>
                            <?php echo $dep_date; ?>
                        </li>
                        <li>
                            <strong>Departure Time : </strong>
                            <?php echo $dep_time; ?>
                        </li>
                        <li>
                            <strong>Booked Timing : </strong>
                            <?php echo $booked_timing; ?>
                        </li>

                </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }
        else{

        }
        
    ?>
        
    <?php }
    ?>
    <header>
        <nav>
            <div>
                    <a href="#" class="nav-item nav-logo">gobus</a>
                    <a href="#" class="nav-item">Gallery</a>
            </div>
                
            <ul>
                <li><a href="#" class="nav-item">Home</a></li>
                <li><a href="#about" class="nav-item">About</a></li>
                <li><a href="#contact" class="nav-item">Contact</a></li>
            </ul>
            <div>
                <a href="#" class="login nav-item" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fas fa-sign-in-alt" style="margin-right: 0.4rem;"></i>Login</a>
                <a href="#pnr-enquiry" class="pnr nav-item">PNR Enquiry</a>
            </div>
        </nav>
    </header>
    <!-- Login Modal -->
    <?php require 'assets/partials/_loginModal.php'; 
        require 'assets/partials/_getJSON.php';

        $routeData = json_decode($routeJson);
        $busData = json_decode($busJson);
        $customerData = json_decode($customerJson);
    ?>
    

    <section id="home">
        <div id="route-search-form">
            <h1>Find Routes</h1>
            <form id="routeForm" action="routes.php" method="POST">
                <div>
                    <label for="source">Source</label>
                    <!-- Source Search -->
                <div class="searchQuery">
                    <input class="searchInput" type="text" id="source_state" name="source_state" placeholder="State*">
                    <div class="sugg">
                    </div>
                </div>
                    <!-- Source City  -->
                <div class="searchQuery">
                    <input class="searchInput" type="text" id="source" name="source" placeholder="City*">
                    <div class="sugg">
                    </div>
                </div>
                </div>
                <div>
                    <label for="destination">Destination</label>
                    <div class="searchQuery">
                        <input class="searchInput" type="text" id="destination_state" name="destination_state" placeholder="State*">
                        <div class="sugg">
                        </div>
                    </div>
                    <div class="searchQuery">
                        <input class="searchInput" type="text" id="destination" name="destination" placeholder="City*">
                        <div class="sugg">
                        </div>
                    </div>
                </div>
                <div>
                    <label for="departure">Date of Departure</label>
                    <input type="date" id="departure" name="departure" min="<?php 
                                date_default_timezone_set("Asia/Kolkata");
                                echo date("Y-m-d");?>">
                </div>
                <div>
                    <button type="submit" name="search" >Search</button>
                </div>
            </form>
        </div>
    </section>
    <div id="block">
        <section id="info-num">
            <figure>
                <img src="assets/img/route.svg" alt="Bus Route Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num counter" data-target="<?php echo count($routeData); ?>">999</span>
                    <span class="icon-name">routes</span>
                </figcaption>
            </figure>
            <figure>
                <img src="assets/img/bus.svg" alt="Bus Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num counter" data-target="<?php echo count($busData); ?>">999</span>
                    <span class="icon-name">bus</span>
                </figcaption>
            </figure>
            <figure>
                <img src="assets/img/customer.svg" alt="Happy Customer Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num counter" data-target="<?php echo count($customerData); ?>">999</span>
                    <span class="icon-name">happy customers</span>
                </figcaption>
            </figure>
            <figure>
                <img src="assets/img/ticket.svg" alt="Instant Ticket Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num"><span class="counter" data-target="20">999</span> SEC</span> 
                    <span class="icon-name">Instant Tickets</span>
                </figcaption>
            </figure>
        </section>
        <section id="pnr-enquiry">
            <div id="pnr-form">
                <h2>PNR ENQUIRY</h2>
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">
                    <div>
                        <input type="text" name="pnr" id="pnr" placeholder="Enter PNR">
                    </div>
                    <button type="submit" name="pnr-search">Submit</button>
                </form>
            </div>
        </section>
        <section id="about">
            <div>
                <h1>About Us</h1>
                <h4>Wanna know were it all started?</h4>
                <p>
                    Lorem ipsum dolor sit amet consecteturadipisicing elit. Perferendis soluta voluptas eaque, numquam veritatis aperiam expedita deleniti, nesciunt cum alias velit. Cupiditate commodi
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus cum nisi ea optio unde aliquam quia reprehenderit atque eum tenetur! 
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed placeat debitis corporis voluptates modi quibusdam quidem voluptatibus illum, maiores sequi.
                </p>
            </div>
        </section>
        <section id="contact">
            <div id="contact-form">
                <h1>Contact Us</h1>
                <form action="">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <div></div>
                </form>
            </div>
        </section>
        <footer>
            <p>
                <i class="far fa-copyright"></i> 2021 | Made with &#10084;&#65039; by Ashwin Anil, Alwin Poulose and Faris Mohammed
            </p>
        </footer>
    </div>
    <!-- COVID Modal -->
    <!-- Modal -->
    <div class="modal fade" id="covidModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" form="routeForm" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- External JS -->
    <script src="assets/scripts/main.js"></script>
</body>
</html>