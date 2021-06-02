<!-- Show these admin pages only when the admin is logged in -->
<?php  require '../assets/partials/_admin-check.php';   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seats</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- External CSS -->
    <?php 
        require '../assets/styles/admin.php';
        require '../assets/styles/admin-options.php';
    ?>
</head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';?>

            <section id="seat">
                <div id="head">
                    <h2>Seat Status</h2>
                    <div id="search">
                        <div id="wrapper">
                            <input type="text" name="search" placeholder="Search">
                            <a href="#"><i class="fas fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div id="main">
                    <form action="" method="GET">
                        <input type="text" id="bus-no" name="bus-no" placeholder="Bus Number">
                        <button>Search</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
</body>
</html>