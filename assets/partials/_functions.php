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

    function exist_routes($conn, $viaCities, $depdate, $deptime)
    {
        $sql = "SELECT * FROM `routes` WHERE route_cities='$viaCities' AND route_dep_date='$depdate' AND route_dep_time='$deptime'";

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
        {
            $row = mysqli_fetch_assoc($result);   
            return $row["id"];
        }
        return false;
    }

    function exist_buses($conn, $busno)
    {
        $sql = "SELECT * FROM `buses` WHERE bus_no='$busno'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_assoc($result);   
            return $row["id"];
        }
        return false;
    }

    function exist_booking($conn, $customer_id, $route_id)
    {
        $sql = "SELECT * FROM `bookings` WHERE customer_id='$customer_id' AND route_id='$route_id'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_assoc($result);   
            return $row["id"];
        }
        return false;
    }

    function bus_assign($conn, $busno)
    {
        $sql = "UPDATE buses SET bus_assigned=1 WHERE bus_no='$busno'";
        $result = mysqli_query($conn, $sql);
    }

    function bus_free($conn, $busno)
    {
        $sql = "UPDATE buses SET bus_assigned=0 WHERE bus_no='$busno'";
        $result = mysqli_query($conn, $sql);
    }

    function busno_from_routeid($conn, $id)
    {
        $sql = "SELECT * from routes WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row)
        {
            return $row["bus_no"];
        }
        return false;
    }
?>