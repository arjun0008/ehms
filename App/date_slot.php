<?php
    include "inc/config.php";

    $_GET["date_value"];
    $date_str = $_GET["date_value"];
    $date = strtotime($date_str);
    $date_formatted = date('Y-m-d', $date);
    $doc_id = $_GET["doc_id"];

    $query = "SELECT * FROM `appointments` WHERE `doc_id` = '$doc_id' AND `date` = '$date_formatted'";
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