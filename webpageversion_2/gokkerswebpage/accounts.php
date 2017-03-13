<?php
    $connection = mysqli_connect("localhost", "root", "", "gokkers") or die("ERROR: Could not connect!" . mysqli_connect_error());

    if (isset($_POST['username']) && !empty ($_POST['username']))
    {
        $username = $_POST['username'];

    }
    if (isset($_POST['password']) && !empty ($_POST['password']))
    {
        $password = $_POST['password'];

    }
    if (isset($_POST['email']) && !empty ($_POST['email']))
    {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "Email is valid.";
        }
        else
        {
            echo "Email is invalid.";
        }
    }
            $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
            if(mysqli_query($connection, $sql))
            {
                echo "You successfully registered an account!";
                $message = "You successfully registered an account!";
            }
            else
            {
                echo "An error has occurred while registering";
            }
            header("Location: index.php?message=$message");
?>