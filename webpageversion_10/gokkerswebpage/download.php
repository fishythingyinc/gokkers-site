<?php
    session_start();
    require ('app/SQLHandler.php');
    $SQLhandler = new \app\SQLHandler();
    if (isset($_SESSION['username']) && $SQLhandler->GetVerified($_SESSION['username']) == true)
    {
        header("Location: download/fishythingy.zip");
    }
    elseif ($SQLhandler->GetVerified($_SESSION['username']) == '0')
    {
        $message = "Please verify your account to download the game!";
        $_SESSION['message'] = $message;
        header("Location: index.php");
    }
    else
    {
        $message = "Please login to download the game!";
        $_SESSION['message'] = $message;
        header("Location: index.php");
    }

?>