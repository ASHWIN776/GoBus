<?php
    require '_functions.php';
    $conn = db_connect();    

    if(!$conn) 
        die("Connection Failed");

    if(isset($_GET["pnr"]))
    {
        $pnr = $_GET["pnr"];

        $route_id = get_from_table($conn, "bookings", "booking_id", $pnr, "route_id");

        $customer_id = get_from_table($conn, "bookings", "booking_id", $pnr, "customer_id");

        $customer_name = get_from_table($conn, "customers", "customer_id", $customer_id, "customer_name");

        $customer_phone = get_from_table($conn, "customers", "customer_id", $customer_id, "customer_phone");
        
        $customer_route = get_from_table($conn, "bookings", "booking_id", $pnr, "customer_route");

        $booked_amount = get_from_table($conn, "bookings", "booking_id", $pnr, "booked_amount");

        $booked_seat = get_from_table($conn, "bookings", "booking_id", $pnr, "booked_seat");

        $booked_timing = get_from_table($conn, "bookings", "booking_id", $pnr, "booking_created");

        $dep_date = get_from_table($conn, "routes", "route_id", $route_id, "route_dep_date");

        $dep_time = get_from_table($conn, "routes", "route_id", $route_id, "route_dep_time");

        $bus_no = get_from_table($conn, "routes", "route_id", $route_id, "bus_no");

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li{
            list-style-type: none;
            padding-left: 0;
        }
    </style>
</head>

<body>
<li>
                            <strong>PNR : </strong>
                            <?php echo $pnr; ?>
                        </li>
                        <li>
                            <strong>Customer Name : </strong>
                            <?php echo $customer_name; ?>
                        </li>
                        <li>
                            <strong>Customer Phone : </strong>
                            <?php echo $customer_phone; ?>
                        </li>
                        <li>
                            <strong>Route : </strong>
                            <?php echo $customer_route; ?>
                        </li>
                        <li>
                            <strong>Bus Number : </strong>
                            <?php echo $bus_no; ?>
                        </li>
                        <li>
                            <strong>Booked Seat Number : </strong>
                            <?php echo $booked_seat; ?>
                        </li>
                        <li>
                            <strong>Departure Date : </strong>
                            <?php echo $dep_date; ?>
                        </li>
                        <li>
                            <strong>Departure Time : </strong>
                            <?php echo $dep_time; ?>
                        </li>
                        <li>
                            <strong>Booked Timing : </strong>
                            <?php echo $booked_timing; ?>
                        </li>
                        <div style="margin-top: 3rem;">    
                            <button>Print</button>
                        </div>

    <script>
        const printBtn = document.querySelector("button");

        printBtn.addEventListener("click", () => window.print());
    </script>
</body>
</html>