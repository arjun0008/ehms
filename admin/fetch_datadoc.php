<?php
// Get the doc_id from the XHR request
$doc_id = $_GET['doc_id'];

// Include your database connection file or establish a database connection
include "inc/config.php";

// Prepare the query with a placeholder for the doc_id
$query = "SELECT * FROM doctors WHERE doc_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $doc_id);

// Execute the query
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch all rows as an associative array
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Encode the data as JSON
$jsonData = json_encode($rows);

// Set the response header to JSON
header('Content-Type: application/json');

// Send the JSON data back to the XHR request
echo $jsonData;

// Close the database connection
mysqli_close($conn);
?>
