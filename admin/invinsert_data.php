<?php
// Include your database connection file or establish a database connection
include "inc/config.php";

// Retrieve form data
$name = $_POST['fname'];
$category = $_POST['category'];
$price = $_POST['price'];
$description = $_POST['desc'];
$quantity = $_POST['quantity'];

// Sanitize and validate the form data (perform necessary checks)

// Insert data into the database
$query = "INSERT INTO `inventory` (`name`, `category`, `price`, `description`, `quantity`) VALUES ('$name', '$category', '$price', '$description', '$quantity')";
$result = mysqli_query($conn, $query);
  // Insertion successful
  if(!$result) {
    die("Connection failed: " . mysqli_error($conn));
  }
// Close the database connection
mysqli_close($conn);
?>
