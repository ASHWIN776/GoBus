<!-- Show these admin pages only when the admin is logged in -->
<?php  require '../assets/partials/_admin-check.php';   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS -->
    <?php 
        require '../assets/styles/admin.php';
        require '../assets/styles/admin-options.php';
    ?>
</head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';?>

    <!-- Add, Edit and Delete Routes -->
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
                    ADDING ROUTES
                 Check if the $_POST key 'submit' exists
                */
                // Should be validated client-side
                $viaCities = strtoupper($_POST["viaCities"]);
                $cost = $_POST["stepCost"];
                $deptime = $_POST["dep_time"];
                $depdate = $_POST["dep_date"];
                $busno = $_POST["busno"];
                $route_exists = exist_routes($conn,$viaCities,$depdate, $deptime);
                $route_added = false;
        
                if(!$route_exists)
                {
                    // Route is unique, proceed
                    $sql = "INSERT INTO `routes` (`route_cities`,
                     `bus_no`, 
                     `route_dep_date`,
                     `route_dep_time`, `route_step_cost`, `route_created`) VALUES ('$viaCities','$busno', '$depdate','$deptime', '$cost', current_timestamp());";
                    $result = mysqli_query($conn, $sql);
                    
                    // Gives back the Auto Increment id
                    $autoInc_id = mysqli_insert_id($conn);
                    // If the id exists then, 
                    if($autoInc_id)
                    {
                        $code = rand(1,99999);
                        // Generates the unique userid
                        $route_id = "RT-".$code.$autoInc_id;
                        
                        $query = "UPDATE `routes` SET `route_id` = '$route_id' WHERE `routes`.`id` = $autoInc_id;";
                        $queryResult = mysqli_query($conn, $query);
                        if(!$queryResult)
                            echo "Not Working";
                    }
                    
                    if($result)
                    {
                        $route_added = true;
                        // The bus is now assigned, updating uses table
                        bus_assign($conn, $busno);
                    }
                }
    
                if($route_added)
                {
                    // Show success alert
                    echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful!</strong> Route Added
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                else{
                    
                    // Show error alert
                    echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Route already exists
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            if(isset($_POST["edit"]))
            {
                // EDIT ROUTES
                $viaCities = strtoupper($_POST["viaCities"]);
                $cost = $_POST["stepCost"];
                $id = $_POST["id"];
                $deptime = $_POST["dep_time"];
                $depdate = $_POST["dep_date"];
                $busno = $_POST["busno"];
                $oldBusNo = $_POST["old-busno"];

                $id_if_route_exists = exist_routes($conn,$viaCities,$depdate,$deptime);
           
                if(!$id_if_route_exists || $id == $id_if_route_exists)
                {
                    $updateSql = "UPDATE `routes` SET
                    `route_cities` = '$viaCities',
                    `bus_no`='$busno',
                    `route_dep_date` = '$depdate',
                    `route_dep_time` = '$deptime',
                    `route_step_cost` = '$cost' WHERE `routes`.`id` = '$id';";
            
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
                        // To assign the new bus, and free the old one
                        bus_assign($conn,$busno);
                        bus_free($conn, $oldBusNo);
                        // Show success alert
                        $messageStatus = "success";
                        $messageHeading = "Successfull!";
                        $messageInfo = "Route details Edited";
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
                else 
                {
                    // If route details already exists
                    echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Route details already exists
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }

            }
            if(isset($_POST["delete"]))
            {
                // DELETE ROUTES
                $id = $_POST["id"];
                // Get the bus_no from route_id
                $busno_toFree = busno_from_routeid($conn, $id);
                // Delete the route with id => id
                $deleteSql = "DELETE FROM `routes` WHERE `routes`.`id` = $id";
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
                    // echo $num;
                    // Show success alert
                    $messageStatus = "success";
                    $messageInfo = "Route Details deleted";
                    $messageHeading = "Successfull!";
                    // Free the bus assigned
                    bus_free($conn, $busno_toFree);
                }
                else{
                    // Show error alert
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
            $resultSql = "SELECT * FROM `routes` ORDER BY route_created DESC";
                            
            $resultSqlResult = mysqli_query($conn, $resultSql);
            if(!mysqli_num_rows($resultSqlResult)){ ?>
                <!-- Routes are not present -->
                <div class="container mt-4">
                    <div id="noRoutes" class="alert alert-dark " role="alert">
                        <h1 class="alert-heading">No Routes Found!!</h1>
                        <p class="fw-light">Be the first person to add one!</p>
                        <hr>
                        <div id="addRouteAlert" class="alert alert-success" role="alert">
                                Click on <button id="add-button" class="button btn-sm"type="button"data-bs-toggle="modal" data-bs-target="#addModal">ADD <i class="fas fa-plus"></i></button> to add a route!
                        </div>
                    </div>
                </div>
            <?php }
            else { ?>
                <!-- Routes Are present -->
                <section id="route">
                    <div id="head">
                        <h4>Route Status</h4>
                    </div>
                    <div id="route-results">
                        <div>
                            <button id="add-button" class="button btn-sm"type="button"data-bs-toggle="modal" data-bs-target="#addModal">ADD <i class="fas fa-plus"></i></button>
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Via Cities</th>
                                <th>Bus Number</th>
                                <th>Departure Date</th>
                                <th>Departure Time</th>
                                <th>Step Cost</th>
                                <th>Actions</th>
                            </thead>
                            <?php
                                while($row = mysqli_fetch_assoc($resultSqlResult))
                                {
                                        // echo "<pre>";
                                        // var_export($row);
                                        // echo "</pre>";
                                    $id = $row["id"];
                                    $route_id = $row["route_id"];
                                    $route_cities = $row["route_cities"];
                                    $route_dep_time = $row["route_dep_time"];
                                    $route_dep_date = $row["route_dep_date"];
                                    $route_step_cost = $row["route_step_cost"];
                                    $bus_no = $row["bus_no"];
                                        ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                echo $route_id;
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $route_cities;
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $bus_no;
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $route_dep_date;
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $route_dep_time;
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $route_step_cost;?>/-
                                        </td>
                                        <td>
                                            <button class="button edit-button " data-link="<?php echo $_SERVER['REQUEST_URI']; ?>" data-id="<?php 
                                                echo $id;?>" data-cities="<?php 
                                                echo $route_cities;?>" data-cost="<?php 
                                                echo $route_step_cost;?>" data-date="<?php 
                                                echo $route_dep_date;
                                            ?>" data-time="<?php 
                                            echo $route_dep_time;
                                            ?>" data-busno="<?php 
                                            echo $bus_no;
                                            ?>"
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
                <?php  }
            ?>
            </div>
    </main>
            <?php
                $busSql = "Select * from buses where bus_assigned=0";
                $resultBusSql = mysqli_query($conn, $busSql);
                $arr = array();
                while($row = mysqli_fetch_assoc($resultBusSql))
                    $arr[] = $row;
                $busJson = json_encode($arr);
            ?>
            <!-- Add Route Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add A Route</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addRouteForm" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                            <div class="mb-3">
                                    <label for="viaCities" class="form-label">Via Cities</label>
                                <input type="text" class="form-control" id="viaCities" name="viaCities" placeholder="Comma Separated List" required>
                                <span id="error">

                                </span>
                            </div>
                            <input type="hidden" id="busJson" name="busJson" value='<?php echo $busJson; ?>'>
                            <div class="mb-3">
                                <label for="busno" class="form-label">Bus Number</label>
                                <!-- Search Functionality -->
                                <div class="searchBus">
                                    <input type="text" class="form-control  busnoInput" id="busno" name="busno" required>
                                    <div class="sugg">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="stepCost" class="form-label">Step Cost</label>
                                <input type="text" class="form-control" id="stepCost" name="stepCost" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Departure Date</label>
                                <input type="date" name="dep_date" id="date" min="<?php 
                                date_default_timezone_set("Asia/Kolkata");
                                echo date("Y-m-d");?>" value="
                                <?php 
                                echo date("Y-m-d");
                                ?>
                                " required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Departure Time</label>
                                <input type="time" name="dep_time" id="time" min="
                                <?php
                                    echo date("H:i");
                                ?>
                                " required>
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
                    Do you really want to delete this route? <strong>This process cannot be undone.</strong>
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
    <!-- External JS -->
    <script src="../assets/scripts/admin_routes.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>