<?php
    require '_functions.php';

    $conn = db_connect();

    if(!$conn)
        die("Oh Shoot!! Connection Failed");
    
    $user_exists = false;
    $signup_sucess = true;

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"]))
    {
        $fullName = $_POST["firstName"] . " " . $_POST["lastName"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check if the username already exists
        $user_exists = exist_user($conn, $username);

        if(!$user_exists)
        {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `user_fullname`, `user_password`, `user_created`) VALUES ('$username', '$fullName', '$hash', current_timestamp());";

            $result = mysqli_query($conn, $sql);
            
            if(!$result)
                $signup_sucess = false;
        }

        // Redirect Page
        header("location: /admin/signup.php?signup=$signup_sucess");
    }

?>