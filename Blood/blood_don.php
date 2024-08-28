<?php
    include "inc/config.php";

    $fname = $_GET['fname'];
    $gender = $_GET['gender'];
    $dob = $_GET['dob'];
    $phno = $_GET['phno'];

    $query = "SELECT * FROM `donor_camp` WHERE `name` = '$fname' AND `gender` = '$gender' AND `dob` = '$dob' AND `phone_no` = '$phno'";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Query failed: " . mysqli_error($conn));
    }
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