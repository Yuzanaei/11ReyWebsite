<?php
include "database_conn.php";

if(count($_POST) > 0) {
    $customer_id = $_POST["customer_id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST ["email"];

    $query =
    "UPDATE customers set customer_id='" . 
    $customer_id . 
    "', firstname='" . 
    $firstname . 
    "', lastname='" . 
    $lastname . 
    "', email='" . 
    $email . 
    "' WHERE customer_id='" . 
    $customer_id . 
    "'";

    if (mysqli_query($db_connect, $query)) {
        $message = 2;
    } else {
        $message = 4;
    }
}
header("Location:index.php?message=" . $message . "");
?>