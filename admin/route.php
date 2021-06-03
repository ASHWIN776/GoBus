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
                        <button id="add-button" class="button btn btn-sm btn-primary"type="button"data-bs-toggle="modal" data-bs-target="#exampleModal">ADD <i class="fas fa-plus"></i></button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
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
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Night</td>
                            <td>200/-</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Night</td>
                            <td>200/-</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1729</td>
                            <td>Tirur, Thrissur, Aluva, Ernakulam</td>
                            <td>Day</td>
                            <td>200/-</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
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