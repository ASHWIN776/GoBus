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

    <!-- Add Routes -->
    <?php
        /*
            1. Check if an admin is logged in
            2. Check if the request method is POST
            3. Check if the $_POST key 'submit' exists
        */
        if($loggedIn && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
        {
            // Should be validated client-side
            $viaCities = strtoupper($_POST["viaCities"]);
            $cost = $_POST["stepCost"];
            $time = $_POST["time"];
    
            // echo "<pre>";
            // var_export($_POST);
            // echo "</pre>";
    
            $route_exists = exist_routes($conn,$viaCities,$time);
            $route_added = false;
    
            if(!$route_exists)
            {
                // Route is unique, proceed
                $sql = "INSERT INTO `routes` (`route_cities`, `route_timing`, `route_step_cost`, `route_created`) VALUES ('$viaCities', '$time', '$cost', current_timestamp());";
                $result = mysqli_query($conn, $sql);
    
                if($result)
                    $route_added = true;
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
    
        ?>

            <section id="route">
                <div id="head">
                    <h4>Route Status</h4>
                    <div id="search">
                        <div id="wrapper">
                            <input type="text" name="search" placeholder="Search">
                            <a href="#"><i class="fas fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div id="route-results">
                    <div>
                        <button id="add-button" class="button btn-sm"type="button"data-bs-toggle="modal" data-bs-target="#addModal">ADD <i class="fas fa-plus"></i></button>
                        
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
                                        <input type="text" class="form-control" id="viaCities" name="viaCities" placeholder="Comma Separated List">
                                    </div>
                                    <div class="mb-3">
                                        <label for="stepCost" class="form-label">Step Cost</label>
                                        <input type="text" class="form-control" id="stepCost" name="stepCost">
                                    </div>
                                    <div class="mb-3">
                                        <label for="time" class="form-label">Timing</label>
                                        <select name="time" id="time">
                                            <option value="day">
                                                Day
                                            </option>
                                            <option value="night">
                                                Night    
                                            </option>
                                        </select>
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
                        <button id="filter-button" class="button btn-sm">FILTER <i class="fas fa-filter"></i></button>
                    </div>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Via Cities</th>
                            <th>Time</th>
                            <th>Step Cost</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                            $resultSql = "SELECT * FROM `routes` ORDER BY route_created DESC";
                            
                            $resultSqlResult = mysqli_query($conn, $resultSql);

                            while($row = mysqli_fetch_assoc($resultSqlResult))
                            {
                                // echo "<pre>";
                                // var_export($row);
                                // echo "</pre>";
                                $route_id = $row["route_id"];
                                $route_cities = $row["route_cities"];
                                $route_time = $row["route_timing"];
                                $route_step_cost = $row["route_step_cost"];
                                ?>
                                <tr>
                                    <td>
                                        <?php 
                                        echo $route_id;?>
                                    </td>
                                    <td>
                                        <?php 
                                        echo $route_cities;?>
                                    </td>
                                    <td>
                                        <?php 
                                        echo $route_time;?>
                                    </td>
                                    <td>
                                        <?php 
                                        echo $route_step_cost;?>/-
                                    </td>
                                    <td>
                                        <button class="button edit-button">Edit</button>
                                        <button class="button delete-button">Delete</button>
                                    </td>
                                </tr>
                            <?php 
                            }
                        
                        ?>
                    </table>
                </div>
            </section>
        </div>
    </main>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>