<?php
    include "inc/config.php";

    $pat_name = $_GET['pat_name'];
    $pat_dob = $_GET['pat_dob'];
    $pat_ph = $_GET['pat_ph'];

    $query = "SELECT * FROM `patients` WHERE `name` = '$pat_name' AND `dob` = '$pat_dob' AND `phone_no` = '$pat_ph'";
    $result = mysqli_query($conn,$query);

    $data = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    // Free memory associated with result
    mysqli_free_result($result);

    
    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);

?>