<?php
/*$server_name="localhost:3306";
$username="root";
$password='';
$database_name='login';
$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	 $username = $_POST['username'];
	 $password= $_POST['password'];

	 $sql_query = "INSERT INTO admin(username,password) VALUES ('$username','$password')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo "New Details Entry inserted successfully !";
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
header("Location:index.html");*/
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "login";
$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");

    if ($query) {
        $row_count = mysqli_num_rows($query);

        if ($row_count == 0) {
            echo '<script>alert("register!");</script>';
            echo '<script>window.location.href = "index.html";</script>';
            exit();
        } else {
            $sql_query = "INSERT INTO admin(email, password) VALUES ('$email', '$password')";

            if (mysqli_query($conn, $sql_query)) {
                echo "New Details Entry inserted successfully!";
            } else {
                echo "Error: " . $sql . " " . mysqli_error($conn);
            }
        }
    } else {
        echo "Query execution failed: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: index.php");
    exit();
}
?>