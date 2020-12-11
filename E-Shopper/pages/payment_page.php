<?php 
if(isset($_POST['complete_order'])){
	$application->completeOrder($_POST);
}

?>

<section><!--form-->
	<div class="container">
		<div class="row" style="margin-bottom: 100px; margin-top: 50px;">
			<div class="col-sm-12">
				<div class="login-form">
					<form action="" method="post">
						<table class="table table-bordered">
							<tr>
								<th colspan="2">
									<h2 style="color: green;">Dear <strong style="color: gray;"><?php echo $_SESSION['customer_name']; ?></strong> , Please choose your payment way to complete your valuable order.</h2>
								</th>
							</tr>
							<tr>
								<th>Cash on delivery</th>
								<th>
									<input type="radio" name="payment_type" value="cash_on_delivery">
								</th>
							</tr>
							<tr>
								<th>bKash</th>
								<th>
									<input type="radio" name="payment_type" value="bKash">
								</th>
							</tr>
							<tr>
								<th>DBBL Mobile Banking</th>
								<th>
									<input type="radio" name="payment_type" value="dbbl">
								</th>
							</tr>
							<tr>
								<th>Paypal</th>
								<th>
									<input type="radio" name="payment_type" value="paypal">
								</th>
							</tr>
							<tr>
								<th colspan="2">
									<button type="submit" name="complete_order" class="btn btn-default pull-right">Complete Order</button>
								</th>
							</tr>
						</table>
					</form>
					
				</div><!--/login form-->
			</div>
		</div>
	</div>
</section>