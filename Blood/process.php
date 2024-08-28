<?php

include "inc/config.php";

// Retrieve form data
$name = $_POST['fname'];
$gender = $_POST['gender'];
$phone = $_POST['phno'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$bloodGroup = $_POST['bgroup'];
$address = $_POST['address'];


// Insert data into the database
$sql = "INSERT INTO `donor_camp` (`name`, `gender`, `phone_no`, `dob`, `email`, `blood_group`, `address`) 
        VALUES ('$name', '$gender', '$phone', '$dob', '$email', '$bloodGroup', '$address')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
