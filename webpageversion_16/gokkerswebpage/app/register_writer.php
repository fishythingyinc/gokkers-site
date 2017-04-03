<?php
    require "../app/management/database.php";

    if(isset($_POST['username']) && !empty ($_POST['username'])) {
        $username = $_POST['username'];
    }
    if(isset($_POST['password']) && !empty ($_POST['password'])) {
        $password = $_POST['password'];
    }
    if (isset($_POST['email']) && !empty ($_POST['email'])) {
        $email = $_POST['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Succesfully registered! You can now login.";
        }
        else {
            $message = "Invalid email.";
        }
    }

    $sql = "INSERT INTO tbl_users (username, password, email, activated_at) VALUES ('$username', '$password', '$email', 0)";
    $connection->query($sql);

    header("Location: ../index.php?message=$message");
?>