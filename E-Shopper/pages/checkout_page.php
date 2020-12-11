<?php 
if(isset($_POST['signup'])){
	$message = $application->signupCustomer($_POST);
}

if(isset($_POST['login'])){
	$message = $application->customerLogin($_POST);
}

?>

<section><!--form-->
	<div class="container">
		<div class="row" style="margin-bottom: 100px; margin-top: 50px;">
			<div class="col-md-12">
				<h3 class="text-danger text-center"><?php if(isset($message)){echo $message;} ?></h3>
			</div>
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>New User Signup!</h2>
					<form action="" method="post">
						<input placeholder="Name" type="text" name="customer_name">
						<input placeholder="Phone Number" type="text" name="customer_phone">
						<input placeholder="Email Address" type="email" name="customer_email">
						<input placeholder="Password" type="password" name="password">
						<input placeholder="District" type="text" name="customer_district">
						<input placeholder="Address" type="text" name="customer_address">
						<button type="submit" name="signup" class="btn btn-default">Signup</button>
					</form>
					
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>Login to your account</h2>
					<form action="" method="post">
						<input placeholder="Email Address" type="email" name="customer_email">
						<input placeholder="Password" type="password" name="password">
						<button type="submit" name="login" class="btn btn-default">Login</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section>