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

// Fetch user data from the database
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<h2>User Profile</h2>
<p><strong>Username:</strong> <?php echo $user['username']; ?></p>
<p><strong>Email:</strong> <?php echo $user['email']; ?></p>

<a href="edit_profile.php">Edit Profile</a>
<a href="logout.php">Logout</a>

<?php
// Close the database connection
mysqli_close($conn);
?>
