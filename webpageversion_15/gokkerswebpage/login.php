<?php
require "../app/management/database.php";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$stmt = $connection->prepare($sql);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result == false){
    $message = "Incorrect login";
}
else {
    $message = "You are successfully logged in!";
    $_SESSION['username'] = $username;
    $_SESSION['message'] = $message;

}
header("Location: index.php?message=$message");
?>