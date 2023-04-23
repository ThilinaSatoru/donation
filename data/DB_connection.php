<?php


$connect = new mysqli("localhost","root","","users");

    if ($connect -> connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }


?>