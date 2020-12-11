<?php 
require_once('../classes/Admin.php');
if(isset($_GET['action'])){
	$admin = new Admin();
	$manufacturerId = $_GET['manufacturer_id'];
	$action = $_GET['action'];
	if($action == 'unpublish'){
		$admin->unpublishManufacturerById($manufacturerId);
	}elseif($action == 'publish'){
		$admin->publishManufacturerById($manufacturerId);
	}elseif($action == 'delete'){
		$admin->deleteManufacturerById($manufacturerId);
	}
}
