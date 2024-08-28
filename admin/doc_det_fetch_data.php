<?php
include "inc/config.php";

// Get the docId parameter from the request
if (isset($_GET['docId']) && is_numeric($_GET['docId'])) {
  $docId = $_GET['docId'];

  // Fetch doctor data
  $doctorQuery = "SELECT * FROM doctors WHERE doc_id = ?";
  $doctorStmt = mysqli_prepare($conn, $doctorQuery);
  mysqli_stmt_bind_param($doctorStmt, "i", $docId);
  mysqli_stmt_execute($doctorStmt);
  $doctorResult = mysqli_stmt_get_result($doctorStmt);
  $doctorData = mysqli_fetch_assoc($doctorResult);

  // Fetch hospital data
  $hosId = $doctorData['hospital_id'];
  $hospitalQuery = "SELECT * FROM hospitals WHERE hospital_id = ?";
  $hospitalStmt = mysqli_prepare($conn, $hospitalQuery);
  mysqli_stmt_bind_param($hospitalStmt, "i", $hosId);
  mysqli_stmt_execute($hospitalStmt);
  $hospitalResult = mysqli_stmt_get_result($hospitalStmt);
  $hosData = mysqli_fetch_assoc($hospitalResult);

  // Fetch appointment data
  $appointmentQuery = "SELECT * FROM appointments WHERE doc_id = ? AND `date` >= CURDATE() AND `status` != 'canceled'";
  $appointmentStmt = mysqli_prepare($conn, $appointmentQuery);
  mysqli_stmt_bind_param($appointmentStmt, "i", $docId);
  mysqli_stmt_execute($appointmentStmt);
  $appointmentResult = mysqli_stmt_get_result($appointmentStmt);
  $appointmentData = mysqli_fetch_all($appointmentResult, MYSQLI_ASSOC);

  // Create an array to hold the fetched data
  $data = [
    'doctorData' => $doctorData,
    'appointmentData' => $appointmentData,
    'hosData' => $hosData
  ];

  // Encode the data as JSON and send the response
  header('Content-Type: application/json');
  echo json_encode($data);
} else {
  // Handle invalid docId parameter
  echo "Invalid docId parameter";
}
?>
