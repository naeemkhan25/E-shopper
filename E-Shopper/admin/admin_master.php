<?php
ob_start();
session_start();
	
if(!isset($_SESSION['admin_id'])){
	header('Location:index.php');
}

require_once('../classes/Admin.php'); 
$admin = new Admin();

if(isset($_GET['status'])){
	$status = $_GET['status'];
	if($status == 'logout'){
		$admin->logout();
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Hasib Kamal for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Hasib Kamal">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link id="bootstrap-style" href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="assets/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="assets/css/style-responsive.css" rel="stylesheet">
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'> -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
		<!-- start: Header -->
			<?php require_once('includes/admin_header.php'); ?>
		<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				<?php require_once('includes/admin_sidebar.php'); ?>
			<!-- start: Content -->
			<div id="content" class="span10">
				<?php
					if(isset($page)){
						if($page == 'dashboard'){
							require_once('pages/dashboard_page.php');
						}elseif($page == 'addCategory'){
							require_once('pages/add_category_page.php');
						}elseif($page == 'manageCategory'){
							require_once('pages/manage_category_page.php');
						}elseif($page == 'editCategory'){
							require_once('pages/edit_category_page.php');
						}elseif($page == 'addManufacturer'){
							require_once('pages/add_manufacturer_page.php');
						}elseif($page == 'manageManufacturer'){
							require_once('pages/manage_manufacturer_page.php');
						}elseif($page == 'editManufacturer'){
							require_once('pages/edit_manufacturer_page.php');
						}elseif($page == 'addProduct'){
							require_once('pages/add_product_page.php');
						}elseif($page == 'manageProduct'){
							require_once('pages/manage_product_page.php');
						}elseif($page == 'editProduct'){
							require_once('pages/edit_product_page.php');
						}elseif($page == 'manageOrder'){
							require_once('pages/manage_order_page.php');
						}elseif($page == 'openOrder'){
							require_once('pages/open_order_page.php');
						}
					}else{
						require_once('pages/dashboard_page.php');
					}
					


				?>
			</div>
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
		<?php require_once('includes/admin_footer.php'); ?>
	
	<!-- start: JavaScript-->

	<script src="assets/js/jquery-1.9.1.min.js"></script>
	<script src="assets/js/jquery-migrate-1.0.0.min.js"></script>
	<script src="assets/js/jquery-ui-1.10.0.custom.min.js"></script>
	<script src="assets/js/jquery.ui.touch-punch.js"></script>
	<script src="assets/js/modernizr.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.cookie.js"></script>
	<script src='assets/js/fullcalendar.min.js'></script>
	<script src='assets/js/jquery.dataTables.min.js'></script>
	<script src="assets/js/excanvas.js"></script>
	<script src="assets/js/jquery.flot.js"></script>
	<script src="assets/js/jquery.flot.pie.js"></script>
	<script src="assets/js/jquery.flot.stack.js"></script>
	<script src="assets/js/jquery.flot.resize.min.js"></script>
	<script src="assets/js/jquery.chosen.min.js"></script>
	<script src="assets/js/jquery.uniform.min.js"></script>
	<script src="assets/js/jquery.cleditor.min.js"></script>
	<script src="assets/js/jquery.noty.js"></script>
	<script src="assets/js/jquery.elfinder.min.js"></script>
	<script src="assets/js/jquery.raty.min.js"></script>
	<script src="assets/js/jquery.iphone.toggle.js"></script>
	<script src="assets/js/jquery.uploadify-3.1.min.js"></script>
	<script src="assets/js/jquery.gritter.min.js"></script>
	<script src="assets/js/jquery.imagesloaded.js"></script>
	<script src="assets/js/jquery.masonry.min.js"></script>
	<script src="assets/js/jquery.knob.modified.js"></script>
	<script src="assets/js/jquery.sparkline.min.js"></script>
	<script src="assets/js/counter.js"></script>
	<script src="assets/js/retina.js"></script>
	<script src="assets/js/custom.js"></script>
	<!-- end: JavaScript-->
</body>
</html>
