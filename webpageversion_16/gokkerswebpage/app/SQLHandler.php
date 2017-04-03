<?php
/**
 * Created by PhpStorm.
 * User: D181761
 * Date: 20-3-2017
 * Time: 14:17
 */

namespace app;
use \PDO;
class SQLHandler
{
    private $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect("mysql-fish.alwaysdata.net", "fish_root", "FishyThingy", "fish_gokkers") or die("ERROR: Could not connect!" . mysqli_connect_error());
        //$this->connection = mysqli_connect("localhost", "root", "", "gokkers") or die("ERROR: Could not connect!" . mysqli_connect_error());


    }

    public function InsertData($username, $passwordEncrypt, $email)
    {
        $sql = "INSERT INTO tbl_users (username, password, email) VALUES ('$username', '$passwordEncrypt', '$email')";
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
        $loginQuery = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$passwordEncrypt'";

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

    public function GetVerified($username)
    {
        $query = "SELECT * FROM tbl_users WHERE username = '$username'";
        $sql = mysqli_query($this->connection, $query);


        $rows = mysqli_fetch_assoc($sql);

        if ($rows["username"] == null)
        {
            return false;
        }
        else
        {
            if ($rows['activated_at'] == '0' || $rows['activated_at'] == null)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    public function SetVerified($username)
    {
        $query = "SELECT * FROM tbl_users WHERE username = '$username'";

        $sql = mysqli_query($this->connection, $query);
        $rows = mysqli_fetch_assoc($sql);

//
            if ($rows["activated_at"] == "0" || $rows["activated_at"] == null)
            {
                var_dump($rows);
                $query = "UPDATE tbl_users SET activated_at='1' WHERE username='$username'";
                $sql = mysqli_query($this->connection, $query);
                $message = "Account verified";
                return true;
            }
            else
            {
                $message = "Account already verified";
                return false;
            }
    }
}