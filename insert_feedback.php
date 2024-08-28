<?php

include "inc/config.php";

// Get the form inputs from the POST request
$name = $_POST['fname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Perform any required validation and sanitization of the form inputs

// Perform any further operations or database insertions using the variables
$query = "INSERT INTO `feedbacks` (`name`, `email`, `subject`, `message`, `date`) VALUES ('$name', '$email', '$subject', '$message',CURDATE())";
$result = mysqli_query($conn,$query);

if(!$query){
    die("Error:".mysqli_error($conn));
}

// Send a response back to the AJAX request
echo 'Form data received and processed successfully!';

mysqli_close($conn);
?>
