<?php
// Assume you have fetched the username from the database and stored it in the $username variable

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the username from the database table
$sql = "SELECT name FROM adminlogin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the first row and get the username value
    $row = $result->fetch_assoc();
    $username = $row["name"];
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat&family=Libre+Baskerville:ital@0;1&family=Ysabeau+SC:wght@100&display=swap" rel="stylesheet">
    <style>
        .container1 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px; /* Set the desired height of the container */
        }

        .container img {
            max-width: 100%;
            max-height: 100%;
        }
        .welcome-box {
        
            padding: 10px;
            margin:0px;
            text-align: center;
        }
    </style>
    <title> Admin Home Page</title>
</head>

<body>
    <nav class="navbar">
        <!-- LOGO -->
        <div class="logo">Sports Event Management-Admin Login</div>

        <!-- NAVIGATION MENU -->
        <ul class="nav-links">

            <!-- USING CHECKBOX HACK -->
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>

            <!-- NAVIGATION MENUS -->
            <div class="menu">
                <li><a href="./addevents.html">Add Events</a></li>
                <!--<li class="services">
                    <a href="/">Events</a>
                    <ul class="dropdown">
                        <li><a href="/">Basketball </a></li>
                        <li><a href="/">Football</a></li>
                        <li><a href="/">Cricket</a></li>
                        <li><a href="/">Badminton</a></li>
                        <li><a href="/">Throwball</a></li>
                        <li><a href="/"></a>Carroms</li>
                        <li><a href="/">Volleyball</a></li>
                        <li><a href="/">Chess</a></li>
                        <li><a href="/">Table Tennis</a></li>

                    </ul>

                </li>-->

                <li><a href="./update_result.html">Update Results</a></li>
                <li><a href="./announcement.html">Add Announcements</a></li>
            </div>
        </ul>
    </nav>
    <div class="container">
    </div>
</body>
</html>