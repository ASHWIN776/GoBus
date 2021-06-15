<?php 
    require '_functions.php';
    $conn = db_connect();    

    if(!$conn) 
        die("Connection Failed");

    if(!$_SERVER["REQUEST_METHOD"] == "POST" || !isset($_POST["book"]))
    {
        header("location: index.php");
        exit;
    }

    // echo "<pre>";
    // var_export($_POST);
    // echo "</pre>";
    // die;

    $customer_name = ucfirst($_POST["firstName"]) . " " . ucfirst($_POST["lastName"]);
    $customer_phone = $_POST["phone"];
    $customer_seat = $_POST["seat_selected"];
    $route_id = $_POST["route_id"];
    $booked_amount = $_POST["booked_amount"];
    $customer_route = $_POST["source"] . " &rarr; " . $_POST["destination"];

    $id_customer_exists = exist_customers($conn, $customer_name, $customer_phone);
    $customer_added = false;

    if(!$id_customer_exists)
    {
        // Route is unique, proceed
        $sql = "INSERT INTO `customers` (`customer_name`, `customer_phone`, `customer_created`) VALUES ('$customer_name', '$customer_phone', current_timestamp());";

        $result = mysqli_query($conn, $sql);

        // Gives back the Auto Increment id
        $autoInc_id = mysqli_insert_id($conn);
        // If the id exists then, 
        if($autoInc_id)
        {
            $code = rand(1,99999);
            // Generates the unique userid
            $customer_id = "CUST-". $code . $autoInc_id;
                        
            $query = "UPDATE `customers` SET `customer_id` = '$customer_id' WHERE `customers`.`id` = $autoInc_id;";
            $queryResult = mysqli_query($conn, $query);

            if(!$queryResult)
                echo "Not Working";
        }

        if($result)
            $customer_added = true;
    }

    if($id_customer_exists)
        $customer_id = $id_customer_exists;
    
    // Now Book the seat
    $booking_exists = exist_booking($conn,$customer_id,$route_id);
    $booking_added = false;
    $booking_id = false;
    
    if(!$booking_exists)
    {
        // Route is unique, proceed
        $sql = "INSERT INTO `bookings` (`customer_id`, `route_id`, `customer_route`, `booked_amount`, `booked_seat`, `booking_created`) VALUES ('$customer_id', '$route_id','$customer_route', '$booked_amount', '$customer_seat', current_timestamp());";
        echo $sql;

        $result = mysqli_query($conn, $sql);
        // Gives back the Auto Increment id
        $autoInc_id = mysqli_insert_id($conn);
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
    
    // Update the Seats table
    if($booking_added)
    {
        $bus_no = get_from_table($conn, "routes", "route_id", $route_id, "bus_no");
        $seats = get_from_table($conn, "seats", "bus_no", $bus_no, "seat_booked");

        if($seats)
        {
            $seats .= "," . $customer_seat;
        }
        else 
            $seats = $customer_seat;

        $updateSeatSql = "UPDATE `seats` SET `seat_booked` = '$seats' WHERE `seats`.`bus_no` = '$bus_no';";
        mysqli_query($conn, $updateSeatSql);
    }


    header("location: /index.php?booking_added=$booking_added&pnr=$booking_id");
    exit();
?>