<?php
/**
 * Created by PhpStorm.
 * User: D181761
 * Date: 20-3-2017
 * Time: 14:17
 */

namespace app;


class SQLHandler
{

    private $connection;
    public function __construct()
    {
        $this->connection = mysqli_connect("mysql-fish.alwaysdata.net", "fish_root", "FishyThingy", "fish_gokkers") or die("ERROR: Could not connect!" . mysqli_connect_error());
    }

    public function InsertData($username, $passwordEncrypt, $email)
    {
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$passwordEncrypt', '$email')";
        if(mysqli_query($this->connection, $sql))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function GetData($username, $passwordEncrypt)
    {
        $loginQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$passwordEncrypt'";

        $sql = mysqli_query($this->connection, $loginQuery);

        $rows = mysqli_fetch_assoc($sql);

        if ($rows["username"] == null || $rows["password"] == null)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}