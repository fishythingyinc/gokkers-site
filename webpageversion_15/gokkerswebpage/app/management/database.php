<?php
    $connection = new PDO('mysql:host=localhost;dbname=pdo_login', 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>