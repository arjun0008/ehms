<?php

include "inc/config.php";

// Retrieve form data
$name = $_POST['fname'];
$gender = $_POST['sex'];
$phone = $_POST['phno'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$housename = $_POST['hn'];
$place = $_POST['place'];
$address = $housename.", ".$place;


// Insert data into the database
$sql = "INSERT INTO `patients` (`name`, `gender`, `phone_no`, `dob`, `email`, `address`) 
        VALUES ('$name', '$gender', '$phone', '$dob', '$email', '$address')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
