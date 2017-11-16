<?php 
session_start();
if(isset($_SESSION["is_user_logged_in"]) && $_SESSION["is_user_logged_in"]==true)
{
	header("Location: /dashboard.php");
}
?>
<?php include('header.php') ?>
	<div class="card">
		<div class="container">
			<h1 class="header text-center">
				Login Page
			</h1>
			<div class="row">
				<div class="col-xs-offset-1 col-md-offset-3 col-md-6">
					<form action="dashboard.php" method="post">
					  <div class="form-group">
					    <label for="name">User Name:</label>
					    <input type="text" class="form-control" name="username" required="required">
					  </div>
					  <div class="form-group">
					    <label for="pwd">Password:</label>
					    <input type="password" class="form-control" name="userpass" required="required">
					  </div>
					  <input type="submit" class="btn btn-primary" name="form-submit">
					</form>
				</div>	
			</div>	
		</div>
	</div>
	 
<?php include('footer.php') ?>
