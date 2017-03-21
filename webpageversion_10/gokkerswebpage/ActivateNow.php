<?php
require ('app/Validator.php');
require ('app/SQLHandler.php');
$validator = new \app\Validator();
$SQLhandler = new \app\SQLHandler();
if (isset($_GET['message']) && isset($_GET['username']))
{
    $message = $_GET['message'];
    if ($validator->Verify($message) == true)
    {
        if ($SQLhandler->SetVerified($_GET['username']) == true)
        {
            $message = "Account verified";
        }
        else
        {
            $message = "There was a problem with verifying the account";
        }
    }
    else
    {
        $message = "There was a problem with verifying the account";
    }
}
else
{
    $message = "There was a problem with verifying the account";
}

//header("Location: index.php");