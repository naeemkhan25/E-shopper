<?php 
$customerId = $_SESSION['customer_id'];
$customer = $application->getCustomerInformationById($customerId);

if(isset($_POST['continue'])){
	$application->saveShippingAddress($_POST);
}
?>

<section><!--form-->
	<div class="container">
		<div class="row" style="margin-bottom: 100px; margin-top: 50px;">
			<div class="col-sm-12">
				<div class="login-form"><!--login form-->
					<h2 style="color: green;">Dear <strong style="color: gray;"><?php echo $_SESSION['customer_name']; ?></strong> , Please give your sipping address to deliver your valuable order.</h2>
					<form action="" method="post">
						<!-- <?php if(isset($message['customer_name'])){ echo $message['customer_name']; } ?> -->
						<input placeholder="Name" type="text" name="customer_name" value="<?php echo $customer['customer_name']; ?>">
						<input placeholder="Phone Number" type="text" name="customer_phone" value="<?php echo $customer['customer_phone']; ?>">
						<input placeholder="Email Address" type="email" name="customer_email" value="<?php echo $customer['customer_email']; ?>">
						<input placeholder="District" type="text" name="customer_district" value="<?php echo $customer['customer_district']; ?>">
						<input placeholder="Address" type="text" name="customer_address" value="<?php echo $customer['customer_address']; ?>">
						<button type="submit" name="continue" class="btn btn-default">Continue</button>
					</form>
					
				</div><!--/login form-->
			</div>
		</div>
	</div>
</section>