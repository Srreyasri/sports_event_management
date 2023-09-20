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
	 $EventName = $_POST['EventName'];
	 $Type= $_POST['Type'];
     $startdate = $_POST['startdate'];
	 $enddate= $_POST['enddate'];
     $eventtime = $_POST['eventtime'];
	 $sql_query = "INSERT INTO addevent(EventName,Type,startdate,enddate,eventtime) VALUES ('$EventName','$Type','$startdate','$enddate','$eventtime')";

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
header("Location:eventsuccess.html");
?>