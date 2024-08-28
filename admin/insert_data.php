<?php
// Get form data
$name = $_POST['ename'];
$gender = $_POST['esex'];
$phone = $_POST['ephno'];
$dob = $_POST['edob'];
$email = $_POST['eemail'];
$address = $_POST['ead'];
$wd = $_POST['ewd'];
$spec = $_POST['espec'];
$hos = $_POST['hos'];
$use_word = "password";

// Upload image file
$target_dir = "dp/"; // Folder to store the uploaded files
$target_file = $target_dir . basename($_FILES['dp']['name']);

// Check if a file is selected
if ($_FILES['dp']['name']) {
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check file size (optional)
  if ($_FILES['dp']['size'] > 500000) {
    echo "File size is too large. Please select a smaller file.";
    exit;
  }

  // Allow only certain file formats (e.g., JPEG, PNG)
  if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
    echo "Only JPG, JPEG, and PNG files are allowed.";
    exit;
  }

  // Check if the file upload is successful
  if (move_uploaded_file($_FILES['dp']['tmp_name'], $target_file)) {
    echo "The file " . basename($_FILES['dp']['name']) . " has been uploaded successfully.";
  } else {
    echo "Sorry, there was an error uploading your file.";
    exit;
  }
}

// Insert data into the database
include "inc/config.php";

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Prepare the query (to prevent SQL injection)
$query = "INSERT INTO doctors (`name`, `gender`, `dob`, `phone_no`, `email`, `address`, `specialization`, `hospital_id`, `working_days`, `dp`, `username`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    die("Error in preparing statement: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssssssssssss", $name, $gender, $dob, $phone, $email, $address, $spec, $hos, $wd, $_FILES['dp']['name'], $email, $use_word);

if (!mysqli_stmt_execute($stmt)) {
    die("Error in executing statement: " . mysqli_error($conn));
}

// Rest of your code (e.g., file upload, redirection, etc.)

mysqli_stmt_close($stmt);
mysqli_close($conn);
