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
                                <form action="../assets/partials/_handleRoutes.php" method="POST">
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
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="button edit-button">Edit</button>
                                <button class="button delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="button edit-button">Edit</button>
                                <button class="button delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="button edit-button">Edit</button>
                                <button class="button delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="button edit-button">Edit</button>
                                <button class="button delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="button edit-button">Edit</button>
                                <button class="button delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="button edit-button">Edit</button>
                                <button class="button delete-button">Delete</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </div>
    </main>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>