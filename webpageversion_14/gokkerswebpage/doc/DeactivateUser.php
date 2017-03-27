<?php
require ('../app/SQLHandler.php');
$sqlHandler = new \app\SQLHandler();

$query = "SELECT * FROM users WHERE username = '$username'";
$sql = mysqli_query($this->connection, $query);

$rows = mysqli_fetch_assoc($sql);

var_dump($rows); //die;
if ($rows["isValid"] == "0")
{
    var_dump($rows);
    //die();
    $query = "UPDATE tbl_users SET isValid='1' WHERE username='$username'";
    $sql = mysqli_query($this->connection, $query);
    $message = "Account verified";
    return true;
}
else
{
    $message = "Account already verified";
    return false;
}