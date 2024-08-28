<?php 
    include "inc/config.php";

    $fid = $_GET['id'];
    $query1 = "UPDATE `feedbacks` SET `status` = 'read' WHERE `id` = '$fid'";
    $result1 = mysqli_query($conn,$query1);

    $query = "SELECT * FROM `feedbacks` WHERE `id` = '$fid'";
    $result = mysqli_query($conn,$query);

    $data = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;

    }
    
    $sql = "SELECT COUNT(*) as `count` FROM feedbacks WHERE status = 'unread'";
    $resultc = mysqli_query($conn, $sql);
    $rowc = mysqli_fetch_assoc($resultc);
    $data['count'] = $rowc['count'];
    
    // Free memory associated with result
    mysqli_free_result($result);

    
    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
?>