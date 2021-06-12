<!-- Show these admin pages only when the admin is logged in -->
<?php  require '../assets/partials/_admin-check.php';   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- External CSS -->
    <?php
        require '../assets/styles/admin.php';
        require '../assets/styles/admin-options.php';
    ?>
</head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';?>
<!-- Add, Edit and Delete Bookings -->
<?php
        /*
            1. Check if an admin is logged in
            2. Check if the request method is POST
        */
        if($loggedIn && $_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST["submit"]))
            {
                /*
                    ADDING Bookings
                 Check if the $_POST key 'submit' exists
                */
                // Should be validated client-side
                // echo "<pre>";
                // var_export($_POST);
                // echo "</pre>";
                // die;
                $customer_id = $_POST["cid"];
                $customer_name = $_POST["cname"];
                $customer_phone = $_POST["cphone"];
                $route_id = $_POST["route_id"];
                $route_source = $_POST["sourceSearch"];
                $route_destination = $_POST["destinationSearch"];
                $route = $route_source . " &rarr; " . $route_destination;
                $booked_seat = $_POST["seatInput"];
                $amount = $_POST["bookAmount"];
                // $dep_timing = $_POST["dep_timing"];

                $booking_exists = exist_booking($conn,$customer_id,$route_id);
                echo $booking_exists;
                $booking_added = false;
        
                if(!$booking_exists)
                {
                    // Route is unique, proceed
                    $sql = "INSERT INTO `bookings` (`customer_id`, `route_id`, `customer_route`, `booked_amount`, `booked_seat`, `booking_created`) VALUES ('$customer_id', '$route_id','$route', '$amount', '$booked_seat', current_timestamp());";
                    echo $sql;

                    $result = mysqli_query($conn, $sql);
                    // Gives back the Auto Increment id
                    $autoInc_id = mysqli_insert_id($conn);
                    echo $autoInc_id;
                    // If the id exists then, 
                    if($autoInc_id)
                    {
                        $key = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                        $code = "";
                        for($i = 0; $i < 5; ++$i)
                            $code .= $key[rand(0,strlen($key) - 1)];
                        
                        // Generates the unique bookingid
                        $booking_id = $code.$autoInc_id;
                        
                        $query = "UPDATE `bookings` SET `booking_id` = '$booking_id' WHERE `bookings`.`id` = $autoInc_id;";
                        $queryResult = mysqli_query($conn, $query);

                        if(!$queryResult)
                            echo "Not Working";
                    }

                    if($result)
                        $booking_added = true;
                }
    
                if($booking_added)
                {
                    // Show success alert
                    echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful!</strong> Booking Added
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
            if(isset($_POST["edit"]))
            {
                // EDIT ROUTES
                $cname = $_POST["cname"];
                $cphone = $_POST["cphone"];
                $id = $_POST["id"];
                $id_if_customer_exists = exist_customers($conn,$cname,$cphone);

                if(!$id_if_customer_exists || $id == $id_if_customer_exists)
                {
                    $updateSql = "UPDATE `customers` SET
                    `customer_name` = '$cname',
                    `customer_phone` = '$cphone' WHERE `customers`.`id` = '$id';";

                    $updateResult = mysqli_query($conn, $updateSql);
                    $rowsAffected = mysqli_affected_rows($conn);
    
                    $messageStatus = "danger";
                    $messageInfo = "";
                    $messageHeading = "Error!";
    
                    if(!$rowsAffected)
                    {
                        $messageInfo = "No Edits Administered!";
                    }
    
                    elseif($updateResult)
                    {
                        // Show success alert
                        $messageStatus = "success";
                        $messageHeading = "Successfull!";
                        $messageInfo = "Customer details Edited";
                    }
                    else{
                        // Show error alert
                        $messageInfo = "Your request could not be processed due to technical Issues from our part. We regret the inconvenience caused";
                    }
    
                    // MESSAGE
                    echo '<div class="my-0 alert alert-'.$messageStatus.' alert-dismissible fade show" role="alert">
                    <strong>'.$messageHeading.'</strong> '.$messageInfo.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                else{
                    // If customer details already exists
                    echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Customer already exists
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }

            }
            if(isset($_POST["delete"]))
            {
                // DELETE BOOKING
                $id = $_POST["id"];
                // Delete the booking with id => id
                $deleteSql = "DELETE FROM `bookings` WHERE `bookings`.`id` = $id";

                $deleteResult = mysqli_query($conn, $deleteSql);
                $rowsAffected = mysqli_affected_rows($conn);
                $messageStatus = "danger";
                $messageInfo = "";
                $messageHeading = "Error!";

                if(!$rowsAffected)
                {
                    $messageInfo = "Record Doesnt Exist";
                }

                elseif($deleteResult)
                {   
                    $messageStatus = "success";
                    $messageInfo = "Booking Details deleted";
                    $messageHeading = "Successfull!";
                }
                else{

                    $messageInfo = "Your request could not be processed due to technical Issues from our part. We regret the inconvenience caused";
                }

                // Message
                echo '<div class="my-0 alert alert-'.$messageStatus.' alert-dismissible fade show" role="alert">
                <strong>'.$messageHeading.'</strong> '.$messageInfo.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
        ?>
        <?php
            $resultSql = "SELECT * FROM `bookings` ORDER BY booking_created DESC";
                            
            $resultSqlResult = mysqli_query($conn, $resultSql);

            if(!mysqli_num_rows($resultSqlResult)){ ?>
                <!-- Bookings are not present -->
                <div class="container mt-4">
                    <div id="noCustomers" class="alert alert-dark " role="alert">
                        <h1 class="alert-heading">No Bookings Found!!</h1>
                        <p class="fw-light">Be the first person to add one!</p>
                        <hr>
                        <div id="addCustomerAlert" class="alert alert-success" role="alert">
                                Click on <button id="add-button" class="button btn-sm"type="button"data-bs-toggle="modal" data-bs-target="#addModal">ADD <i class="fas fa-plus"></i></button> to add a booking!
                        </div>
                    </div>
                </div>
            <?php }
            else { ?>   
            <section id="booking">
                <div id="head">
                    <h4>Booking Status</h4>
                    <div id="search">
                        <div id="wrapper">
                            <a href="#"><i class="fas fa-search"></i></a>
                            <input type="text" name="search" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div id="booking-results">
                    <div>
                        <button id="add-button" class="button btn-sm"type="button"data-bs-toggle="modal" data-bs-target="#addModal">ADD <i class="fas fa-plus"></i></button>
                        <button id="filter-button" class="button btn-sm">FILTER <i class="fas fa-filter"></i></button>
                    </div>
                    <table>
                        <tr>
                            <th>PNR</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Bus Number</th>
                            <th>Route</th>
                            <th>Booked Seat</th>
                            <th>Amount</th>
                            <th>Departure Timing</th>
                            <th>Booked Timing</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_assoc($resultSqlResult))
                            {
                                    // echo "<pre>";
                                    // var_export($row);
                                    // echo "</pre>";
                                $id = $row["id"];
                                $customer_id = $row["customer_id"];
                                $route_id = $row["route_id"];

                                $pnr = $row["booking_id"];

                                $customer_name = get_from_table($conn, "customers","customer_id", $customer_id, "customer_name");
                                
                                $customer_phone = get_from_table($conn,"customers","customer_id", $customer_id, "customer_phone");

                                $bus_no = get_from_table($conn, "routes", "route_id", $route_id, "bus_no");

                                $route = $row["customer_route"];

                                $booked_seat = $row["booked_seat"];
                                
                                $booked_amount = $row["booked_amount"];

                                $dep_date = get_from_table($conn, "routes", "route_id", $route_id, "route_dep_date");

                                $dep_time = get_from_table($conn, "routes", "route_id", $route_id, "route_dep_time");

                                $booked_timing = $row["booking_created"];
                        ?>
                        <tr>
                            <td>
                                <?php 
                                    echo $pnr;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $customer_name;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $customer_phone;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $bus_no;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $route;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $booked_seat;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $booked_amount;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $dep_date . " , ". $dep_time;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $booked_timing;
                                ?>
                            </td>
                            <td>
                                <button class="button edit-button " data-link="<?php echo $_SERVER['REQUEST_URI']; ?>" data-id="<?php 
                                                echo $id;?>" data-name="<?php 
                                                echo $customer_name;?>" data-phone="<?php 
                                                echo $customer_phone;?>"
                                                >Edit</button>
                                            <button class="button delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php 
                                                echo $id;?>">Delete</button>
                            </td>
                        </tr>
                        <?php 
                        }
                    ?>
                    </table>
                </div>
            </section>
            <?php } ?> 
        </div>
    </main>
    <?php
    // Route JSON
        $rtSql = "Select * from routes";
        $resultrtSql = mysqli_query($conn, $rtSql);
        $arr = array();
        if(mysqli_num_rows($resultrtSql))
            while($row = mysqli_fetch_assoc($resultrtSql))
                $arr[] = $row;
        $routeJson = json_encode($arr);
    
    // Customer JSON
        $ctSql = "Select * from customers";
        $resultctSql = mysqli_query($conn, $ctSql);
        $arr = array();
        if(mysqli_num_rows($resultctSql))
            while($row = mysqli_fetch_assoc($resultctSql))
                $arr[] = $row;
        $customerJson = json_encode($arr);
    
    // Seats JSON
        $stSql = "Select * from seats";
        $resultstSql = mysqli_query($conn, $stSql);
        $arr = array();
        if(mysqli_num_rows($resultstSql))
            while($row = mysqli_fetch_assoc($resultstSql))
                $arr[] = $row;
        $seatJson = json_encode($arr);
        
    ?>
    <!-- All Modals Here -->
    <!-- Add Route Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Book here</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addBookingForm" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                            <!-- Passing Route JSON -->
                            <input type="hidden" id="routeJson" name="routeJson" value='<?php echo $routeJson; ?>'>
                            <!-- Passing Customer JSON -->
                            <input type="hidden" id="customerJson" name="customerJson" value='<?php echo $customerJson; ?>'>
                            <!-- Passing Seat JSON -->
                            <input type="hidden" id="seatJson" name="seatJson" value='<?php echo $seatJson; ?>'>

                            <div class="mb-3">
                                <label for="cid" class="form-label">Customer ID</label>
                                <!-- Search Functionality -->
                                <div class="searchQuery">
                                    <input type="text" class="form-control searchInput" id="cid" name="cid">
                                    <div class="sugg">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cname" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="cname" name="cname" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="cphone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="cphone" name="cphone" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="routeSearch" class="form-label">Route</label>
                                <!-- Search Functionality -->
                                <div class="searchQuery">
                                    <input type="text" class="form-control searchInput" id="routeSearch" name="routeSearch">
                                    <div class="sugg">
                                    </div>
                                </div>
                            </div>
                            <!-- Send the route_id -->
                            <input type="hidden" name="route_id" id="route_id">
                            <!-- Send the departure timing too -->
                            <input type="hidden" name="dep_timing" id="dep_timing">

                            <div class="mb-3">
                                <label for="sourceSearch" class="form-label">Source</label>
                                <!-- Search Functionality -->
                                <div class="searchQuery">
                                    <input type="text" class="form-control searchInput" id="sourceSearch" name="sourceSearch">
                                    <div class="sugg">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="destinationSearch" class="form-label">Destination</label>
                                <!-- Search Functionality -->
                                <div class="searchQuery">
                                    <input type="text" class="form-control searchInput" id="destinationSearch" name="destinationSearch">
                                    <div class="sugg">
                                    </div>
                                </div>
                            </div>
                            <!-- Seats Diagram -->
                            <div class="mb-3">
                                <table id="seatsDiagram">
                                    <tr>
                                    <td data-name="1">1</td>
                                    <td data-name="2">2</td>
                                    <td data-name="3">3</td>
                                    <td data-name="4">4</td>
                                    <td data-name="5">5</td>
                                    <td data-name="6">6</td>
                                    <td data-name="7">7</td>
                                    <td data-name="8">8</td>
                                    <td data-name="9">9</td>
                                    <td data-name="10">10</td>
                                    </tr>
                                    <tr>
                                    <td data-name="11">11</td>
                                    <td data-name="12">12</td>
                                    <td data-name="13">13</td>
                                    <td data-name="14">14</td>
                                    <td data-name="15">15</td>
                                    <td data-name="16">16</td>
                                    <td data-name="17">17</td>
                                    <td data-name="18">18</td>
                                    <td data-name="19">19</td>
                                    <td data-name="20">20</td>
                                    </tr>
                                    <tr>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td data-name="21">21</td>
                                    <td data-name="22">22</td>
                                    <td data-name="23">23</td>
                                    <td data-name="24">24</td>
                                    <td data-name="25">25</td>
                                    <td data-name="26">26</td>
                                    <td data-name="27">27</td>
                                            <td class="space">&nbsp;</td>
                                    <td data-name="28">28</td>
                                    <td data-name="29">29</td>
                                    </tr>
                                    <tr>
                                    <td data-name="30">30</td>
                                    <td data-name="31">31</td>
                                    <td data-name="32">32</td>
                                    <td data-name="33">33</td>
                                    <td data-name="34">34</td>
                                    <td data-name="35">35</td>
                                    <td data-name="36">36</td>
                                    <td class="space">&nbsp;</td>
                                    <td data-name="37">37</td>
                                    <td data-name="38">38</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-auto">
                                    <label for="seatInput" class="col-form-label">Seat Number</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="seatInput" class="form-control" name="seatInput" readonly>
                                </div>
                                <div class="col-auto">
                                    <span id="seatInfo" class="form-text">
                                    Select from the above figure, Maximum 1 seat.
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="bookAmount" class="form-label">Amount</label>
                                <input type="text" class="form-control" id="bookAmount" name="bookAmount" readonly>
                            </div>
                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- Add Anything -->
                    </div>
                    </div>
                </div>
        </div>
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-circle"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="text-center pb-4">
                    Are you sure?
                </h2>
                <p>
                    Do you really want to delete this route id? <strong>This process cannot be undone.</strong>
                </p>
                <!-- Needed to pass id -->
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="delete-form"  method="POST">
                    <input id="delete-id" type="hidden" name="id">
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="delete-form" name="delete" class="btn btn-danger">Delete</button>
            </div>
            </div>
        </div>
    </div>
    <script src="../assets/scripts/admin_booking.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>