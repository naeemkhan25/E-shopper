<?php 
$categoryId = $_GET['category_id'];
$products = $application->getProductsByCategoryId($categoryId);




?>
<section>
		<div class="container">
			<div class="row">
				<?php require_once('includes/left_sidebar.php'); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php foreach($products as $product){ ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img width="50" height="250" src="admin/<?php echo $product['product_image']; ?>" alt="">
										<h2><?php echo $product['product_price']; ?> TK</h2>
										<p><?php echo $product['product_name']; ?></p>
										<a href="product_details.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo $product['product_price']; ?> TK</h2>
											<p><?php echo $product['product_name']; ?></p>
											<a href="product_details.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
										</div>
									</div>
								</div>	
							</div>
						</div>
						<?php } ?>

						<div class="col-md-12">
							<ul class="pagination">
								<li class="active"><a href="">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href="">»</a></li>
							</ul>
						</div>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>