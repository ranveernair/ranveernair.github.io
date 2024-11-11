<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdata";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get data from the form
$email = $_POST["email"];
$message = $_POST["message"];

// Escape special characters to prevent SQL injection
$email = mysqli_real_escape_string($conn, $email);
$message = mysqli_real_escape_string($conn, $message);

// Create SQL statement
$sql = "INSERT INTO `contacts` (email, message) VALUES ('$email', '$message')";

// Execute the query
if (mysqli_query($conn, $sql)) {
  echo "Thank you for contacting me! Your message has been sent successfully.";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

?>