<?php
// Assuming you have established a database connection
// and stored it in the $conn variable
include "inc/config.php";
// Check if the ID is provided and is a valid integer
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    // Get the ID from the request
    $id = $_GET['id'];

    // Prepare the query with a placeholder for the ID
    $query = "SELECT `name` FROM patients WHERE patient_id = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Check if the prepare statement was successful
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the name from the result
        if ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];

            // Create an associative array with the name
            $data = array('name' => $name);

            // Encode the data as JSON
            $jsonData = json_encode($data);

            // Set the response header to JSON
            header('Content-Type: application/json');

            // Send the JSON data back to the client
            echo $jsonData;
        } else {
            // Handle case when no patient is found with the given ID
            $errorData = array('error' => 'Patient not found');
            $jsonData = json_encode($errorData);
            header('Content-Type: application/json');
            echo $jsonData;
        }
    } else {
        // Handle prepare statement error
        $errorData = array('error' => 'Error preparing statement');
        $jsonData = json_encode($errorData);
        header('Content-Type: application/json');
        echo $jsonData;
    }
} else {
    // Handle case when ID is not provided or is not a valid integer
    $errorData = array('error' => 'Invalid ID');
    $jsonData = json_encode($errorData);
    header('Content-Type: application/json');
    echo $jsonData;
}

// Close the database connection
mysqli_close($conn);
?>
