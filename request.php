<?php include('header.php') ?>
	<div class="card">
		<div class="container">
			<h1 class="header text-center">
				Request An Invite
			</h1>
			<div class="row">
				<div class="col-xs-offset-1 col-md-offset-3 col-md-6">
					<form action="thank-you.php" method="post">
					  <div class="form-group">
					    <label for="name">Name:</label>
					    <input type="text" class="form-control" name="name" required="required">
					  </div>	
					  <div class="form-group">
					    <label for="email">Email address:</label>
					    <input type="email" class="form-control" name="email" required="required">
					  </div>
					  <div class="form-group">
					    <label for="phone-no">Phone Number</label>
					    <input type="number" class="form-control" name="phone_no" required="required">
					  </div>
					  <div class="form-group">
					    <label for="city">City</label>
					    <input type="text" class="form-control" name="city" required="required">
					  </div>
					  <div class="form-group">
					  <label>Gender</label>
					  
					  <label class="radio-inline"><input type="radio" name="radio" value="male" checked>Male</label>
					  <label class="radio-inline"><input type="radio" name="radio" value="female">Female</label>
					  
					  </div>
					  <input type="submit" class="btn btn-primary" name="form-submit">
					</form>
				</div>	
			</div>	
		</div>
	</div>
	
<?php include('footer.php') ?>
