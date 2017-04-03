<?php
    session_start();
    require ('app/management/database.php');
    require ('app/SQLHandler.php');
    $SQLhandler = new \app\SQLHandler();
    if (isset($_SESSION['username']) && $SQLhandler->GetVerified($_SESSION['username']) == true)
    {
        header("Location: download/fishythingy.zip");
    }
    elseif (!isset($_SESSION['username']))
    {
        $message = "Please login to download the game!";
        $_SESSION['message'] = $message;
        header("Location: index.php");
    }
    elseif ($SQLhandler->GetVerified($_SESSION['username']) == '0')
    {
        $message = "Please verify your account to download the game!";
        $_SESSION['message'] = $message;
        header("Location: index.php");
    }

?>