<?php
/**
 * Created by PhpStorm.
 * User: shoev
 * Date: 28-3-2017
 * Time: 14:13
 */
namespace app;
session_start();
require('app/SQLHandler.php');

class SessionHandler
{
    private $password;
    private $username;
    private $sqlHandler;
    public function __construct()
    {
        $sqlHandler = new \app\SQLHandler();
    }

    public function Logout()
    {
        session_start();
    // remove all session variables
        session_unset();

    // destroy the session
        session_destroy();
        header("Location: index.php");
    }

    public function Login($username, $password)
    {
        if ($this->sqlHandler->GetData($username, $password))
        {
            $message =  "You are successfully logged in!";
            $_SESSION['username'] = $username;
            $_SESSION['message'] = $message;
            if ($this->sqlHandler->GetVerified($username))
            {
                $_SESSION['ToS'] = $this->sqlHandler->GetVerified($username);
            }

        }
        else {
            $message = "Login incorrect";
            $_SESSION['message'] = $message;
        }


        header("Location: index.php");
    }
}