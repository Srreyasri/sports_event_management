<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $name = $_POST['name'];
  $department = $_POST['department'];
  $rollno = $_POST['rollno'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $event = $_POST['event'];

  // Validate the form data (you can add more validation as needed)
  if (empty($name) || empty($department) || empty($phone) || empty($email) || empty($event)) {
    echo "Please fill in all the required fields.";
  } else {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO registrations (name, department,rollno, phone, email, event) VALUES (?, ?,?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $department,$rollno, $phone, $email, $event);
    if ($stmt->execute()) {
      echo "Registration successful.";
    } else {
      echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
  }
}
header("Location:regeventsuccess.html");

?>
