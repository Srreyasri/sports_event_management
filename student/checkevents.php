
<!DOCTYPE html>
<html>
<head>
<title>Check Events</title>
<style>
body {
    background-color: #f5f5f5;
}
.container {
padding: 50px;
text-align: center;
}

table {
border-collapse: collapse;
width: 100%;
color: black;
font-family: Arial, sans-serif;
font-size: 16px;
text-align: left;
border:3px solid black;
}

table th {
background-color: rgb(228, 137, 85);
color: white;
font-weight: bold;
padding: 10px;
border:1px solid black;
}

table td {
padding: 10px;
border:1px solid black;
}

table tr:nth-child(even) {
background-color: #f2f2f2;
}

h1 {
text-align: center;
padding: 20px;
color: #333;
}

h2 {
text-align: center;
padding-top: 20px;
margin-bottom: 0;
}

a {
color: #007bff;
text-decoration: none;
}

a:hover {
text-decoration: underline;
}

</style>
</head>
<body>
    <h1>Available Events</h1>
    <div class="container">
        <table>
            <tr>
                <th>Event Name</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Event Time</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "login");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT EventName, Type, startdate, enddate, eventtime FROM addevent";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["EventName"]. "</td>
                        <td>" . $row["Type"] . "</td>
                        <td>". $row["startdate"]. "</td>
                        <td>".$row["enddate"]."</td>
                        <td>" . $row["eventtime"] . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No events available</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <h2><a href="./regevent.html">Register Now!</a></h2>
    </div>
</body>
</html>