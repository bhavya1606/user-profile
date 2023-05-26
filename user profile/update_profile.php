<?php
// Start the session to access user information
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

// Get the username from the session
$username = $_SESSION['username'];

// Connect to the database
$conn = mysqli_connect("localhost", "username", "password", "task_manager");

// Get form data
$newUsername = $_POST['username'];
$newEmail = $_POST['email'];

// Update user data in the database
$query = "UPDATE users SET username = '$newUsername', email = '$newEmail' WHERE username = '$username'";
mysqli_query($conn, $query);

// Update the username in the session
$_SESSION['username'] = $newUsername;

// Close the database connection
