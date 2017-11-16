<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Soiree</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!--navbar-->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">Soiree</a>
	    </div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	      	<?php
	      	if(isset($_POST['username']) && $_POST['userpass']){
	      	$username = $_POST['username'];
			$userpass = $_POST['userpass'];
			}
			else{
				if($_SESSION["is_user_logged_in"]==true)
		      	{
		      		$username = $_SESSION["logged_in_username"];
		      	}
		      	else
		      	{
		      		header("Location: /login.php");
		      	}
	      	}
			$servername = "localhost";
			$admin_name = "root";
			$admin_password = "";
			$dbname = "soiree";
			
	      	$conn = new mysqli($servername, $admin_name, $admin_password, $dbname);
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "SELECT * FROM users";
			$result = $conn->query($sql);
			?>
	        <li><a href="logout.php">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">
	<?php
		
		if ($result->num_rows > 0) 
		{
			$user_status = 0;
			while($row = $result->fetch_assoc()) {
       			$correct_username = $row['username'];
       			$correct_password = $row['password'];
				if($username == $correct_username )
				{
					$_SESSION["is_user_logged_in"] = true;
					$_SESSION["logged_in_username"]= $username;
					echo '<h1>Welcome '.$username.'!</h1>';
					$user_status = 1;
					
				}
			}
			
			if($user_status == 0)
			{
				showErrorMessage();
			}

		}

		else
		{
			showErrorMessage();
			
		}
		function showErrorMessage()
		{
			echo '<h1>Wrong Credentials! </h1>' ;
			echo '<a href="login.php"> Back to Login Page</a>';
			die();
		}
		
	?>
	</div>
	<div class="container">
		<div class="panel panel-default">
 			<div class="panel-heading">All Request</div>
			<table class="table table-responsive">
				<thead>
			      <tr>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Phone number</th>
			        <th>City</th>
			        <th>Gender</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php 
			      	$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "soiree";
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					} 
					$sql = "SELECT * FROM requests";
					$result = $conn->query($sql);
			      ?>
			      <?php
			      
			       while ($row = $result->fetch_assoc()) { ?>
			       			<?php $sId = $row['id'];?>
			        		<tr>
						        <td><?php echo $row['name']; ?></td>
						        <td><?php echo $row['email']; ?></td>
						        <td><?php echo $row['phone_no']; ?></td>
						        <td><?php echo $row['city'];?></td>
						        <td><?php echo $row['gender'];?></td>
						        <td>
						        	<?php if($row['status']==1) {?>
						        		<span class="label label-primary">Accepted</button><?php }?>
						        	<?php if($row['status']== 2) {?>
						        		<span class="label label-danger">Rejected</button><?php }?>
						        	<?php if($row['status']== 0){ ?>		
						        	<form method="post" action="updatedb.php">
						        	<input type="hidden" name="id" value="<?php echo $row['id'] ;?>">	
						        	<button type="submit" class="btn btn-success" name="status" value="1">Accept</button>
						        	<button type="submit" class="btn btn-danger" name="status" value="0">Reject</button>
						        	<?php }?>
						        	</form>
						        	<?php ?>
						        </td>
						    </tr>
			        	 	
			      <?php } ?>
			      
			    </tbody>
			</table>
		</div>
	</div>		