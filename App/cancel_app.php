<?php
    include "inc/config.php";

    $app_id = $_GET['id'];

    $query = "UPDATE `appointments` SET `status` = 'canceled' WHERE `appointments`.`appointment_id` = '$app_id'";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("Query failed: " . mysqli_error($conn));
    }
?>