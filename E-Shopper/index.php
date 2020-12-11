<?php 
require_once('classes/Application.php');
$application = new Application();
$manufacturers = $application->getAllPublishedManufacturers();
$categories = $application->getAllPublishedCategories();
$recommendedProductsA = $application->getRecommandedProducts('ASC');
$recommendedProductsD = $application->getRecommandedProducts('DESC');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/price-range.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<?php 
		require_once('includes/header_top.php'); 
		require_once('includes/header_middle.php'); 
		require_once('includes/header_bottom.php'); 
		?>
	</header><!--/header-->
	
	<?php 
		if(isset($myPage)){
			switch ($myPage) {
				case 'contactPage':
					require_once('pages/contact_page.php');
					break;
				case 'categoryProductPage':
					require_once('pages/category_product_page.php');
					break;
				case 'ProductDetailsPage':
					require_once('pages/product_details_page.php');
					break;
				case 'addCartPage':
					require_once('pages/add_cart_page.php');
					break;
				case 'checkoutPage':
					require_once('pages/checkout_page.php');
					break;
				case 'sippingPage':
					require_once('pages/shipping_page.php');
					break;
				case 'paymentPage':
					require_once('pages/payment_page.php');
					break;
				case 'orderComplete':
					require_once('pages/order_complete_page.php');
					break;
				default:
					require_once('pages/home_page.php');
					break;
			}
		}else{
			require_once('pages/home_page.php');
		}

	?>
	
	
	<footer id="footer"><!--Footer-->
		<?php 
			require_once('includes/footer_top.php');
			require_once('includes/footer_widget.php');
			require_once('includes/footer_bottom.php');

		?>
	</footer><!--/Footer-->
	

  
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/js/price-range.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>