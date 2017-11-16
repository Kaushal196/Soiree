<?php include('header.php') ?>

   <div class="container">
   	<?php 
   		$name 	  = $_POST['name'];
   		$email 	  = $_POST['email'];
   		$phone_no = $_POST['phone_no'];
   		$city 	  = $_POST['city'];
   		$gender   = $_POST['radio'];

   		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "soiree";


		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT email FROM requests";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) {
       			$prev_email = $row['email'];
       			if($email == $prev_email)
				{
					echo '<div class="alert alert-danger" role="alert">Oh! It seems you’ve already requested before. If you are someone else, please check your entries and try again.</div>';
					die();
				}
            }
           
		}
		
		$sql1 = "INSERT INTO requests (name, email, phone_no, city, gender) VALUES ('$name', '$email', '$phone_no', '$city', '$gender')";
		if ($conn->query($sql1) === TRUE) {
		    echo '<div class="alert alert-success" role="alert">Thank You! Your request has been successfully saved. The host will review and update you on your request.</div>' ;
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
			
		$conn->close();

   		
   		
   	?>
   	  
   	  
   </div>
	
<?php include('footer.php') ?>
