<!-- Show these admin pages only when the admin is logged in -->
<?php  require '../assets/partials/_admin-check.php';   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buses</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <?php 
        require '../assets/styles/admin.php';
        require '../assets/styles/admin-options.php';
    ?>
</head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';?>
            <section id="bus">
                <div id="head">
                    <h2>Bus Status</h2>
                    <div id="search">
                        <div id="wrapper">
                            <input type="text" name="search" placeholder="Search">
                            <a href="#"><i class="fas fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div id="bus-results">
                    <div>
                        <button id="add-button" class="btn">ADD <i class="fas fa-plus"></i></button>
                    <button id="filter-button" class="btn">FILTER <i class="fas fa-filter"></i></button>
                    </div>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Route ID</th>
                            <th>Bus Name</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <td>2002</td>
                            <td>1729</td>
                            <td>Pilsburg</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2002</td>
                            <td>1729</td>
                            <td>Pilsburg</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2002</td>
                            <td>1729</td>
                            <td>Pilsburg</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2002</td>
                            <td>1729</td>
                            <td>Pilsburg</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2002</td>
                            <td>1729</td>
                            <td>Pilsburg</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2002</td>
                            <td>1729</td>
                            <td>Pilsburg</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2002</td>
                            <td>1729</td>
                            <td>Pilsburg</td>
                            <td>
                                <button class="btn edit-button">Edit</button>
                                <button class="btn delete-button">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2002</td>
                            <td>1729</td>
                            <td>Pilsburg</td>
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
</body>
</html>