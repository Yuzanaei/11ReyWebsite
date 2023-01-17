<?php

$hostname = "localhost";
$database_username = "root";
$database_password = "";
$database_name = "crud_customer";

$db_connect = mysqli_connect($hostname, $database_username, $database_password, $database_name);
if (!$db_connect){
    die("Tidak Dapat Terhubung ke Database: " . mysqli_connect_error());
}
?>