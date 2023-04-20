<?php
session_start();
unset($_SESSION["loggedUser"]);
header('Refresh: 2; URL = ../login.php');
?>