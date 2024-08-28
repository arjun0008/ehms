<?php
    include "inc/config.php";
    $name = $_GET['pat_name'];
    $dob = $_GET['pat_dob'];
    $phno = $_GET['pat_phno'];

    $query = "SELECT * FROM `appointments` WHERE `pat_id` = (SELECT `patient_id` FROM `patients` WHERE `name` = '$name' AND `phone_no` = '$phno' AND `dob` = '$dob') AND `status` != 'Prescribed' AND `status` != 'canceled' AND `date` >= CURDATE()";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Query failed: " . mysqli_error($conn));
    }
    $data = array();
    // if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
            $doc_id = $row['doc_id'];
            $query1 = "SELECT * FROM doctors where doc_id = '$doc_id'";
            $result1 = mysqli_query($conn,$query1);
            if(!$result1){
                die("Query failed: " . mysqli_error($conn));
            }
            while($row1 = mysqli_fetch_assoc($result1)){
                $doc_name = $row1['name'];
                $data[] = array_merge($row, ['doc_name' => $doc_name]);
            }
        }
    // }
    // else{
    //     $data[] = 
    // }
    // Free memory associated with result
    mysqli_free_result($result);

    
    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
    
?>