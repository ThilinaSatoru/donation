<?php

    $connect = new mysqli("localhost", "root", "root", "users");

    if ($connect -> connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }


?>