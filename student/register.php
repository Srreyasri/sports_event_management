<?php
$server_name="localhost:3306";
$username="root";
$password="";
$database_name="login";
$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	 $name = $_POST['name'];
	 $department= $_POST['department'];
     $phoneno = $_POST['phoneno'];
	 $rollno= $_POST['rollno'];
     $email = $_POST['email'];
	 $password= $_POST['password'];
     $confirmpassword= $_POST['confirmpassword'];
	 $sql_query = "INSERT INTO register(name,department,phoneno,rollno,email,password,confirmpassword) VALUES ('$name','$department','$phoneno','$rollno','$email','$password',$confirmpassword)";

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
header("Location:login.html");
?>