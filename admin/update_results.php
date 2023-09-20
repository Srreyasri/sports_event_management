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
$studentId = $_POST['studentId'];
$sport = $_POST['sport'];
$score = $_POST['score'];

// Update the sports results in the database
$sql = "UPDATE sports_results SET score='$score' WHERE student_id='$studentId' AND sport='$sport'";
if ($conn->query($sql) === TRUE) {
  echo "Sports result updated successfully!";
} else {
  echo "Error updating sports result: " . $conn->error;
}

// Close the database connection
$conn->close();
header("Location:update_result_success.html");
?>
