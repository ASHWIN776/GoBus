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
        
?>