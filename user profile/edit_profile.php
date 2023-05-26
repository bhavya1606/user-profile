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

<h2>Edit Profile</h2>
<form action="update_profile.php" method="POST">
  <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br>
  <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
  <input type="submit" name="update" value="Update Profile">
</form>

<a href="profile.php">Back to Profile</a>

<?php
// Close the database connection
mysqli_close($conn);
?>
