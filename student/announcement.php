<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Announcements</title>
  <link rel="stylesheet" href="style4.css">
</head>
<body>
  <div class="container">
    <h1>Student Announcements</h1>
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

    // Fetch announcements from the database
    $sql = "SELECT * FROM announcements";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='announcement'>";
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p>" . $row['content'] . "</p>";
        echo "</div>";
      }
    } else {
      echo "No announcements found.";
    }

    // Close the database connection
    $conn->close();
    ?>
  </div>
</body>
</html>
