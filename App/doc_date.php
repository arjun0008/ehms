<?php
    include "inc/config.php";

    $doc_id = $_GET["doc_id"];

    $query = "SELECT * FROM doctors WHERE doc_id = '$doc_id'";
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