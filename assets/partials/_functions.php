<?php
    function db_connect()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'bus-booking';

        $conn = mysqli_connect($servername, $username, $password, $database);
        return $conn;
    }

    function exist_user($conn, $username)
    {
        $sql = "SELECT * FROM `users` WHERE user_name='$username'";
        
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
            return true;
        return false;
    }

    function exist_routes($conn, $viaCities, $time)
    {
        $sql = "SELECT * FROM `routes` WHERE route_cities='$viaCities' AND route_timing='$time'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_assoc($result);
            
            return $row["id"];
        }
        return false;
    }

    function exist_customers($conn, $name, $phone)
    {
        $sql = "SELECT * FROM `customers` WHERE customer_name='$name' AND customer_phone='$phone'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
            return true;
        return false;
    }

    function exist_buses($conn, $busno)
    {
        $sql = "SELECT * FROM `buses` WHERE bus_no='$busno'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
            return true;
        return false;
    }
?>