<?php 
$productId = $_GET['product_id'];
$product = $application->getProductDetailsById($productId);

// $recommendedProductsD = $application->getRecommandedProductsD();

if(isset($_POST['add_to_cart'])){
	$application->addToCart($_POST);
}

?>
<section>
	<div class="container">
		<div class="row">
			<?php require_once('includes/left_sidebar.php'); ?>
			
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="admin/<?php echo $product['product_image']; ?>" alt="">
								<h3><?php echo $product['product_name']; ?></h3>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="assets/images/product-details/new.jpg" class="newarrival" alt="">
								<h2><?php echo $product['product_name']; ?></h2>
								<img src="assets/images/product-details/rating.png" alt="">
								<span>
									<form action="" method="post">
										<span>BDT <?php echo $product['product_price']; ?></span>
										<label>Quantity:</label>
										<input name="quantity" value="1" type="text">
										<input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
										<button type="submit" class="btn btn-fefault cart" name="add_to_cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									</form>
								</span>
								<p><b>Manufacturer:</b> <?php echo $product['manufacturer_name'] ?></p>
								<a href=""><img src="assets/images/product-details/share.png" class="share img-responsive" alt=""></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane active" id="details">
								<div class="col-sm-12">
									<p><?php echo $product['product_long_description']; ?></p>
								</div>
							</div>
						</div>
					</div><!--/category-tab-->
					
					<?php require_once('includes/recommended_items.php'); ?>
					
				
			
		</div>
	</div>
</section>