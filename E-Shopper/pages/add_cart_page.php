<?php 
$sessionId = session_id();
$cartProducts = $application->getCartProductsBySessionId($sessionId);
if(isset($_GET['status'])){
	$cartId = $_GET['cart_id'];
	$application->removeProductFromCartById($cartId);
}

if(isset($_POST['quantity_update'])){
	$application->updateProductQuantityByCartId($_POST);
}

?>

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php
						$subTotal = 0; 
						foreach($cartProducts as $cart){ 
					?>
					<tr>
						<td class="cart_product">
							<a href=""><img width="100" height="100" src="admin/<?php echo $cart['product_image']; ?>" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href=""><?php echo $cart['product_name']; ?></a></h4>
						</td>
						<td class="cart_price">
							<p>BDT <?php echo $cart['product_price']; ?></p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="" method="post">
									<input type="hidden" name="cart_id" value="<?php echo $cart['cart_id']; ?>">
									<input class="cart_quantity_input" name="quantity" value="<?php echo $cart['quantity']; ?>" autocomplete="off" size="2" type="text">
									<button type="submit" name="quantity_update">Update</button>
								</form>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">BDT 
							<?php 
							$total =  $cart['quantity']*$cart['product_price']; 
							echo $total;
							$subTotal += $total; 
							?>
								
							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="?status=remove_product&cart_id=<?php echo $cart['cart_id']; ?>"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<table class="table table-bordered">
			<tr>
				<th class="text-left" width="50%">Sub Totoal</th>
				<th class="text-right">BDT <?php echo $subTotal; ?> /=</th>
			</tr>
			<tr>
				<th class="text-left">Vat Total</th>
				<th class="text-right">BDT <?php $vat = ($subTotal*15)/100; echo $vat;  ?> /=</th>
			</tr>
			<tr>
				<th class="text-left">Grand Total</th>
				<th class="text-right">BDT <?php $_SESSION['order_total']=$subTotal+$vat; echo $subTotal+$vat; ?> /=</th>
			</tr>
		</table>

		<table class="table">
			<tr>
				<td class="text-left" width="50%"><a href="index.php" class="btn btn-primary">Continue Shopping</a></td>
				<td class="text-right">
					<?php if(@$_SESSION['customer_id'] == NULL && @$_SESSION['shipping_id'] == NULL){
						?>
						<a href="checkout.php" class="btn btn-primary">Checkout</a>
						<?php
					}elseif(@$_SESSION['customer_id'] != NULL && @$_SESSION['shipping_id'] == NULL){
						?>
						<a href="shipping.php" class="btn btn-primary">Checkout</a>
						<?php

					}elseif($_SESSION['customer_id'] != NULL && $_SESSION['shipping_id'] != NULL){
						?>
						<a href="payment.php" class="btn btn-primary">Checkout</a>
						<?php
					} ?>
					
				</td>
			</tr>
		</table>



	</div>
</section>