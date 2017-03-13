<?php
    $connection = mysqli_connect("localhost", "root", "", "gokkers");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $sql = mysqli_query($connection, $loginQuery);

    $rows = mysqli_fetch_assoc($sql);

    if ($rows["username"] == null || $rows["password"] == null)
    {
        die("Login incorrect.");
    }
    else
    {
        $message =  "You are logged in as " . $rows["username"];
    }

    header("Location: index.php?message=$message");
?>