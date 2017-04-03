<?php
namespace app;
use \PDO;
    $connection = new PDO('mysql:host=mysql-fish.alwaysdata.net;dbname=fish_gokkers', 'fish_root', 'FishyThingy');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>