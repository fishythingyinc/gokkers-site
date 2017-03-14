<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "gokkers");

$username = $_POST['username'];
$password = $_POST['password'];

$loginQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

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

}

header("Location: index.php?message=$message");
?>