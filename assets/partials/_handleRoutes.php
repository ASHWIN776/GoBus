<?
    require '_functions.php';

    $conn = db_connect();

    if(!$conn)
        die("Oh Shoot!! Connection Failed");
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
    {
        $viaCities = $_POST["viaCities"];
        $cost = $_POST["stepCost"];
        $time = $_POST["time"];
    }


?>