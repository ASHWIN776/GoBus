<?php
    require '_functions.php';

    $conn = db_connect();

    if(!$conn)
        die("Oh Shoot!! Connection Failed");

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
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

        header("location: /admin/route.php?routes_added=$route_added&route_exists=$route_exists");
    }


?>