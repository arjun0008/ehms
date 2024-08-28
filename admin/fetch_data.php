<?php
// Include your database connection file or establish a database connection
include "inc/config.php";

// Check if the patientId parameter is provided
if (isset($_GET['patientId'])) {
  // Retrieve the patientId from the request
  $patientId = $_GET['patientId'];

  // Initialize the response array
  $response = array();

  // Fetch patient details
  $queryPatient = "SELECT * FROM patients WHERE patient_id = ?";
  $stmtPatient = mysqli_prepare($conn, $queryPatient);
  mysqli_stmt_bind_param($stmtPatient, "i", $patientId);
  mysqli_stmt_execute($stmtPatient);
  $resultPatient = mysqli_stmt_get_result($stmtPatient);
  $patient = mysqli_fetch_assoc($resultPatient);

  // Add patient details to the response
  $response['patient'] = $patient;

  // Fetch records
  $queryRecords = "SELECT * FROM records WHERE pid = ?";
  $stmtRecords = mysqli_prepare($conn, $queryRecords);
  mysqli_stmt_bind_param($stmtRecords, "i", $patientId);
  mysqli_stmt_execute($stmtRecords);
  $resultRecords = mysqli_stmt_get_result($stmtRecords);
  $records = array();
  while ($row = mysqli_fetch_assoc($resultRecords)) {
    $records[] = $row;
  }

  // Add records to the response
  $response['records'] = $records;

  // Fetch appointments
  $queryAppointments = "SELECT * FROM appointments WHERE pat_id = ? AND `status` != 'canceled' AND `status` != 'Prescribed' AND `date` >= CURDATE()";
  $stmtAppointments = mysqli_prepare($conn, $queryAppointments);
  mysqli_stmt_bind_param($stmtAppointments, "i", $patientId);
  mysqli_stmt_execute($stmtAppointments);
  $resultAppointments = mysqli_stmt_get_result($stmtAppointments);
  $appointments = array();
  while ($row = mysqli_fetch_assoc($resultAppointments)) {
    $appointments[] = $row;
  }

  // Add appointments to the response
  $response['appointments'] = $appointments;

  // Return the response as JSON
  header("Content-Type: application/json");
  echo json_encode($response);
} else {
  // PatientId parameter is not provided
  echo "Patient ID is required";
}
?>
