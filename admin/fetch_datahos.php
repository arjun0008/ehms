<?php
// Get the doc_id from the XHR request
$hos_id = $_GET['doc_id'];

// Include your database connection file or establish a database connection
include "inc/config.php";

// Prepare the query with a placeholder for the doc_id
$query = "SELECT * FROM hospitals WHERE hospital_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $hos_id);

$sql = "SELECT COUNT(*) AS employee_count FROM doctors WHERE hospital_id = '$hos_id'";
$res2 = mysqli_query($conn,$sql);
if(!$res2){
    die("Error:".mysqli_error($conn));
}
$row2 = mysqli_fetch_assoc($res2);

// Execute the query
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch all rows as an associative array
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$employeeCount = $row2['employee_count'];

$newRow = array('emp_count' => $employeeCount);
$rows = array_merge($rows, $newRow);

// Encode the data as JSON
$jsonData = json_encode($rows);

// Set the response header to JSON
header('Content-Type: application/json');

// Send the JSON data back to the XHR request
echo $jsonData;

// Close the database connection
mysqli_close($conn);
?>
