<!-- To get buses: send req to : http://localhost:8000/assets/partials/_getBuses.php -->

<?php
    require '_functions.php';

    $conn = db_connect();

    if(!$conn)
        die("Connection Failed");

    if(isset($_GET["id"]))
    {   
        $id = $_GET["id"];
        $sql = "Select * from buses where id=$id;";
    }
    else
        $sql = "Select * from buses";

    $result = mysqli_query($conn, $sql);
    $busArr = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $busArr[] = $row;
    }

    print(json_encode($busArr));
?>