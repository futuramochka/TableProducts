<?php
    require_once('createTableDB.php');

    $server = 'localhost';
    $login  = 'root';
    $password = '123';
    $nameDatabase = 'newdb';

    $connect = new CProduct($server,$login,$password,$nameDatabase);
    $connect->connectDB();
?>