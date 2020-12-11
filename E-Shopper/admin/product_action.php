<?php 
require_once('../classes/Admin.php');
if(isset($_GET['action'])){
	$admin = new Admin();
	$productId = $_GET['product_id'];
	$action = $_GET['action'];
	if($action == 'unpublish'){
		$admin->unpublishProductById($productId);
	}elseif($action == 'publish'){
		$admin->publishProductById($productId);
	}elseif($action == 'delete'){
		$admin->deleteProductById($productId);
	}
}

	

?>