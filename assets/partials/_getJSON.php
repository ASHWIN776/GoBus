
<?php
    require '_functions.php';

    $conn = db_connect();

    if(!$conn)
        die("Connection Failed");

    if(isset($_GET["query"]))
    {
        $table = $_GET["query"];
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            $sql = "Select * from $table where id=$id;";
        }
        else
            $sql = "Select * from $table;";
            
        $result = mysqli_query($conn, $sql);
        $arr = array();
        while($row = mysqli_fetch_assoc($result))
            $arr[] = $row;
        
            $json = json_encode($arr);
        print($json);
    }

?>