<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active left">	
				<?php 
					foreach($recommendedProductsA as $rProduct){
				?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img width="200" height="200" src="admin/<?php echo $rProduct['product_image']; ?>" alt="">
								<h2>BDT <?php echo $rProduct['product_price']; ?></h2>
								<a href="product_details.php?product_id=<?php echo $rProduct['product_id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>



			<div class="item next left">
				<?php 
					foreach($recommendedProductsD as $rProduct){
				?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img width="200" height="200" src="admin/<?php echo $rProduct['product_image']; ?>" alt="">
								<h2>BDT <?php echo $rProduct['product_price']; ?></h2>
								<a href="product_details.php?product_id=<?php echo $rProduct['product_id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		  </a>
		  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		  </a>			
	</div>
</div><!--/recommended_items-->