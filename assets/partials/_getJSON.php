<?php
    // Route JSON
    $rtSql = "Select * from routes";
    $resultrtSql = mysqli_query($conn, $rtSql);
    $arr = array();
    if(mysqli_num_rows($resultrtSql))
        while($row = mysqli_fetch_assoc($resultrtSql))
            $arr[] = $row;
        $routeJson = json_encode($arr);
    
    // Customer JSON
    $ctSql = "Select * from customers";
    $resultctSql = mysqli_query($conn, $ctSql);
    $arr = array();
    if(mysqli_num_rows($resultctSql))
        while($row = mysqli_fetch_assoc($resultctSql))
            $arr[] = $row;
    $customerJson = json_encode($arr);
    
    // Seats JSON
    $stSql = "Select * from seats";
    $resultstSql = mysqli_query($conn, $stSql);
    $arr = array();
    if(mysqli_num_rows($resultstSql))
        while($row = mysqli_fetch_assoc($resultstSql))
            $arr[] = $row;
    $seatJson = json_encode($arr);

    // Bus JSON
    $busSql = "Select * from buses";
    $resultBusSql = mysqli_query($conn, $busSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultBusSql))
        $arr[] = $row;
    $busJson = json_encode($arr);

    // Booking JSON
    $bookingSql = "Select * from bookings";
    $resultBookingSql = mysqli_query($conn, $bookingSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultBookingSql))
        $arr[] = $row;
    $bookingJson = json_encode($arr);
        
    // Admin JSON
    $adminSql = "Select * from users";
    $resultAdminSql = mysqli_query($conn, $adminSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultAdminSql))
        $arr[] = $row;
    $adminJson = json_encode($arr);
?>