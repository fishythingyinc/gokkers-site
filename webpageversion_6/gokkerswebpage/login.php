<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "gokkers");

$username = $_POST['username'];
$password = $_POST['password'];
$passwordEncrypt = md5($password);

$loginQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$passwordEncryptx'";

$sql = mysqli_query($connection, $loginQuery);

$rows = mysqli_fetch_assoc($sql);

if ($rows["username"] == null || $rows["password"] == null)
{
    $message = "Login incorrect";
}
else
{
    $message =  "You are successfully logged in!";
    $_SESSION['username'] = $username;
    $_SESSION['message'] = $message;
}

header("Location: index.php");
?>