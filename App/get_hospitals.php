<?php
    include "inc/config.php";

    //$hos_id = $_GET['hos_id'];

    $query = "SELECT * FROM hospitals";
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