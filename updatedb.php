<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "soiree";
	$value = $_POST['status'];
	$id = $_POST['id'];
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
	if($value == 1)
	{
		$sql = "UPDATE requests SET status='1' WHERE id=$id";
		if ($conn->query($sql) === TRUE) {
			
			header("Location: /dashboard.php");
			// echo $value;
		 //    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . $conn->error;
		}
	}
	else
	{
		$sql = "UPDATE requests SET status='2' WHERE id=$id";
		if ($conn->query($sql) === TRUE) {
		    header("Location: /dashboard.php");
		} else {
		    echo "Error updating record: " . $conn->error;
		}
	}	
	
?>