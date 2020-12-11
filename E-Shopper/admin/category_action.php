<?php 
require_once('../classes/Admin.php');
if(isset($_GET['action'])){
	$admin = new Admin();
	$categoryId = $_GET['category_id'];
	$action = $_GET['action'];
	if($action == 'inactive'){
		$admin->inactiveCategoryById($categoryId);
	}elseif($action == 'active'){
		$admin->activeCategoryById($categoryId);
	}elseif($action == 'delete'){
		$admin->deleteCategoryById($categoryId);
	}
}

	

?>