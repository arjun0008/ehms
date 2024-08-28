<?php
// Include your database connection file or establish a database connection
include "inc/config.php";

// Retrieve the record ID from the request
$recordId = $_GET['rid'];

// Initialize the response array
$response = array();

// Fetch record details
$query = "SELECT * FROM records WHERE id = '$recordId'";
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if ($result) {
    // Fetch the record data
    $recordData = mysqli_fetch_assoc($result);

    // Fetch patient details
    $patientId = $recordData['pid'];
    $queryPatient = "SELECT * FROM patients WHERE patient_id = '$patientId'";
    $resultPatient = mysqli_query($conn, $queryPatient);

    // Check if the patient query executed successfully
    if ($resultPatient) {
        // Fetch the patient data
        $patientData = mysqli_fetch_assoc($resultPatient);

        // Fetch doctor details
        $doctorId = $recordData['did'];
        $queryDoctor = "SELECT name, specialization FROM doctors WHERE doc_id = '$doctorId'";
        $resultDoctor = mysqli_query($conn, $queryDoctor);

        // Check if the doctor query executed successfully
        if ($resultDoctor) {
            // Fetch the doctor data
            $doctorData = mysqli_fetch_assoc($resultDoctor);

            // Add record, patient, and doctor data to the response array
            $response['record'] = $recordData;
            $response['patient'] = $patientData;
            $response['doctor'] = $doctorData;
        } else {
            $response['error'] = "Error in executing the doctor query: " . mysqli_error($conn);
        }
    } else {
        $response['error'] = "Error in executing the patient query: " . mysqli_error($conn);
    }
} else {
    $response['error'] = "Error in executing the record query: " . mysqli_error($conn);
}

// Convert the response array to JSON
$jsonResponse = json_encode($response);

// Send the JSON response
header('Content-Type: application/json');
echo $jsonResponse;

// Close the database connection
mysqli_close($conn);
?>
