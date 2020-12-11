<?php 
if(isset($_GET['status'])){
	$status = $_GET['status'];
	if($status == 'customer_logout'){
		$application->customerLogout();
	}
}

?>

<div class="header-middle"><!--header-middle-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo pull-left">
					<a href="index.html"><img src="assets/images/home/logo.png" alt="" /></a>
				</div>
				<div class="btn-group pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
							USA
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">Canada</a></li>
							<li><a href="#">UK</a></li>
						</ul>
					</div>
					
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
							DOLLAR
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">Canadian Dollar</a></li>
							<li><a href="#">Pound</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="shop-menu pull-right">
					<ul class="nav navbar-nav">
						<li><a href="checkout.php"><i class="fa fa-user"></i> Account</a></li>
						<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
						<li><a href="add_cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
						<?php if(isset($_SESSION['customer_id'])){
						?>
						<li><a href="?status=customer_logout"><i class="fa fa-lock"></i> Logout</a></li>
						<?php
						}else{
						?>
						<li><a href="checkout.php"><i class="fa fa-key"></i> Login</a></li>
						<?php
						} 
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div><!--/header-middle-->