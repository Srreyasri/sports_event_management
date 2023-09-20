<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student - Sports Results</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      border: 1px solid #ccc;
      background-color: #acbcd7;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>
  <h1>Student - Sports Results</h1>

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

  // Fetch sports results from the database
  $sql = "SELECT * FROM sports_results";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Student ID</th><th>Sport</th><th>Score</th></tr>";

    // Loop through each row of results and display them in a table
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["student_id"] . "</td><td>" . $row["sport"] . "</td><td>" . $row["score"] . "</td></tr>";
    }

    echo "</table>";
  } else {
    echo "No sports results found.";
  }

  // Close the database connection
  $conn->close();
  ?>
</body>
</html>
