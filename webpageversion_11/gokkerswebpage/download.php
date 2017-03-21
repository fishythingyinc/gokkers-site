<?php
    session_start();
    if (isset($_SESSION['username']))
    {
        header("Location: download/fishythingy.zip");
    }
    else
    {
        $message = "Please login to download the game!";
        $_SESSION['message'] = $message;
        header("Location: index.php");
    }
?>