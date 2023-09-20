<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$title = $_POST['title'];
$content = $_POST['content'];

// Insert the announcement into the database
$sql = "INSERT INTO announcements (title, content) VALUES ('$title', '$content')";
if ($conn->query($sql) === TRUE) {
  echo "Announcement added successfully!";
} else {
  echo "Error adding announcement: " . $conn->error;
}

// Close the database connection
$conn->close();
header("Location:announcement_success.html");
?>
