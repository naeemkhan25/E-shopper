<?php

require_once('DB_Connection.php');

class Admin extends DB_Connection{
	public function __construct(){
		parent::__construct();
	}


	public function adminLogin($data){
		$emailAddress = $data['email_address'];
		$password = $data['password'];
		$encriptedPassword = md5($password);

		$sql = "SELECT * FROM tbl_admin WHERE email_address='$emailAddress' AND password='$encriptedPassword'";

		$query = mysqli_query($this->db_connect,$sql);
		$rows = mysqli_num_rows($query);

		if($rows>0){
			$adminData = mysqli_fetch_assoc($query);
			session_start();
			$_SESSION['admin_id'] = $adminData['admin_id'];
			$_SESSION['admin_name'] = $adminData['admin_name'];
			header('Location:admin_master.php');
		}else{
			return "Invalid login information";
		}
	}

	public function logout(){
			session_start();
			unset($_SESSION['admin_id']);
			unset($_SESSION['admin_name']);
			header('Location:index.php');
	}


	public function saveCategory($data){
		$sql = "INSERT INTO tbl_category(category_name,category_description,status) VALUES('$data[category_name]','$data[category_description]','$data[status]')";
		
		if(mysqli_query($this->db_connect,$sql)){
			return "Category successfully saved";
		}
	}

	public function viewAllCategory(){
		$sql = "SELECT * FROM tbl_category";
		if(mysqli_query($this->db_connect,$sql)){
			return mysqli_query($this->db_connect,$sql);
		}
		
	}


	public function inactiveCategoryById($categoryId){
		$sql = "UPDATE tbl_category SET status=0 WHERE category_id='$categoryId'";
		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_category.php');	
		}
	}
	

	public function activeCategoryById($categoryId){
		$sql = "UPDATE tbl_category SET status=1 WHERE category_id='$categoryId'";
		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_category.php');	
		}
	}

	public function deleteCategoryById($categoryId){
		$sql = "DELETE FROM tbl_category WHERE category_id='$categoryId'";
		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_category.php');	
		}
	}

	public function getCategoryInfoById($categoryId){
		$sql = "SELECT * FROM tbl_category WHERE category_id='$categoryId'";
		if(mysqli_query($this->db_connect,$sql)){
			$query = mysqli_query($this->db_connect,$sql);
			return mysqli_fetch_assoc($query);
		}
		
	}

	public function updateCategoryById($data,$categoryId){
		$sql = "UPDATE tbl_category SET category_name='$data[category_name]', category_description='$data[category_description]', status='$data[status]' WHERE category_id='$categoryId'";

		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_category.php');
		}
	}

	public function saveManufacturer($data){
		$sql = "INSERT INTO tbl_manufacturer(manufacturer_name,manufacturer_description,publication_status) VALUES('$data[manufacturer_name]','$data[manufacturer_description]','$data[publication_status]')";
		
		if(mysqli_query($this->db_connect,$sql)){
			return "Manufacturer successfully saved";
		}
	}

	public function viewAllManufacturer(){
		$sql = "SELECT * FROM tbl_manufacturer";
		if(mysqli_query($this->db_connect,$sql)){
			return mysqli_query($this->db_connect,$sql);
		}
		
	}

	public function unpublishManufacturerById($manufacturerId){
		$sql = "UPDATE tbl_manufacturer SET publication_status=0 WHERE manufacturer_id='$manufacturerId'";
		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_manufacturer.php');	
		}
	}

	public function publishManufacturerById($manufacturerId){
		$sql = "UPDATE tbl_manufacturer SET publication_status=1 WHERE manufacturer_id='$manufacturerId'";
		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_manufacturer.php');	
		}
	}

	public function deleteManufacturerById($manufacturerId){
		$sql = "DELETE FROM tbl_manufacturer WHERE manufacturer_id='$manufacturerId'";
		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_manufacturer.php');	
		}
	}

	public function getManufacurerInfoById($manufacturerId){
		$sql = "SELECT * FROM tbl_manufacturer WHERE manufacturer_id='$manufacturerId'";
		if(mysqli_query($this->db_connect,$sql)){
			$query = mysqli_query($this->db_connect,$sql);
			return mysqli_fetch_assoc($query);
		}
		
	}

	public function updateManufacturerById($data,$manufacturerId){
		$sql = "UPDATE tbl_manufacturer SET manufacturer_name='$data[manufacturer_name]', manufacturer_description='$data[manufacturer_description]', publication_status='$data[publication_status]' WHERE manufacturer_id='$manufacturerId'";

		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_manufacturer.php');
		}
	}


	public function saveProduct($data){
		$directory = 'photos/';
		$target_file = $directory.$_FILES['product_image']['name'];
		$file_type = pathinfo($target_file);
		$file_extension = $file_type['extension'];
		$file_size = $_FILES['product_image']['size'];

		$image = getimagesize($_FILES['product_image']['tmp_name']);
		if($image){
			if (file_exists($target_file)) {
				echo "This image already exist";
				exit();
			}else{
				if($file_size>5242880){
					echo "File size is loo large. Please select a file within 5MB";
					exit();
				}else{
					if($file_extension == 'jpg' || $file_extension == 'png'){
							move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
					}else{
						die("File type is not valid");
					}
				}
			}
		}else{
			die("Please select a valid image file");
		}




		$sql = "INSERT INTO tbl_product(product_name,category_id,manufacturer_id,product_price,stock_quantity,product_sku,product_short_description,product_long_description,product_image,product_status) VALUES('$data[product_name]','$data[category_id]','$data[manufacturer_id]','$data[product_price]','$data[stock_quantity]','$data[product_sku]','$data[product_short_description]','$data[product_long_description]','$target_file','$data[product_status]')";
		
		if(mysqli_query($this->db_connect,$sql)){
			return "Product successfully added";
		}
	}


	public function viewAllProduct(){
		$sql = "SELECT
				tbl_product.product_id,
				tbl_product.product_name,
				tbl_category.category_name,
				tbl_manufacturer .manufacturer_name,
				tbl_product.product_price,
				tbl_product.stock_quantity,
				tbl_product.product_short_description,
				tbl_product.product_image,
				tbl_product.product_status
				FROM tbl_product 
				LEFT JOIN tbl_category ON tbl_category.category_id = tbl_product.category_id
				LEFT JOIN tbl_manufacturer ON tbl_manufacturer.manufacturer_id = tbl_product.manufacturer_id";
		if(mysqli_query($this->db_connect,$sql)){
			return mysqli_query($this->db_connect,$sql);
		}
		
	}


	public function unpublishProductById($productId){
		$sql = "UPDATE tbl_product SET product_status=0 WHERE product_id='$productId'";
		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_product.php');	
		}
	}

	public function publishProductById($productId){
		$sql = "UPDATE tbl_product SET product_status=1 WHERE product_id='$productId'";
		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_product.php');	
		}
	}

	public function deleteProductById($productId){
		$sql = "DELETE FROM tbl_product WHERE product_id='$productId'";
		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_product.php');	
		}
	}

	public function getProductInfoById($productId){
		$sql = "SELECT * FROM tbl_product WHERE product_id='$productId'";
		if(mysqli_query($this->db_connect,$sql)){
			$query = mysqli_query($this->db_connect,$sql);
			return mysqli_fetch_assoc($query);
		}
		
	}

	public function updateProduct($data){
		$target_file = '';
		if($_FILES['product_image']['error'] == 0){
			$directory = 'photos/';
			$target_file = $directory.$_FILES['product_image']['name'];
			$file_type = pathinfo($target_file);
			$file_extension = $file_type['extension'];
			$file_size = $_FILES['product_image']['size'];

			$image = getimagesize($_FILES['product_image']['tmp_name']);
			if($image){
				if (file_exists($target_file)) {
					echo "This image already exist";
					exit();
				}else{
					if($file_size>5242880){
						echo "File size is loo large. Please select a file within 5MB";
						exit();
					}else{
						if($file_extension == 'jpg' || $file_extension == 'png'){
								move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
						}else{
							die("File type is not valid");
						}
					}
				}
			}else{
				die("Please select a valid image file");
			}

		}
		
		
		$sql = "UPDATE tbl_product SET product_name='$data[product_name]', category_id='$data[category_id]',manufacturer_id='$data[manufacturer_id]',product_price='$data[product_price]',stock_quantity='$data[stock_quantity]',product_sku='$data[product_sku]',product_short_description='$data[product_short_description]',product_long_description='$data[product_long_description]',product_image='$target_file',product_status='$data[product_status]' WHERE product_id='$data[product_id]'";

		if(mysqli_query($this->db_connect,$sql)){
			header('Location:manage_product.php');	
		}
	}


	public function viewAllOrder(){
		$sql = "SELECT
				tbl_order.*,
				tbl_customer.customer_name
				FROM tbl_order 
				LEFT JOIN tbl_customer ON tbl_customer.customer_id = tbl_order.customer_id";
		if(mysqli_query($this->db_connect,$sql)){
			return mysqli_query($this->db_connect,$sql);
		}
		
	}

	public function viewAllOrderDetails($orderId){
		$sql = "SELECT * FROM tbl_order_details WHERE order_id='$orderId'";
		if(mysqli_query($this->db_connect,$sql)){
			return mysqli_query($this->db_connect,$sql);
		}
		
	}

	public function getCustomerInfoByOrderId($orderId){
		$sql = "select c.* from tbl_order left join tbl_customer as c on c.customer_id = tbl_order.customer_id where tbl_order.order_id = '$orderId'";
		if(mysqli_query($this->db_connect,$sql)){
			$query = mysqli_query($this->db_connect,$sql);
			return mysqli_fetch_assoc($query);
		}
		
	}

	public function getShippingInfoByOrderId($orderId){
		$sql = "select shipping.* from tbl_order left join tbl_shipping as shipping on shipping.shipping_id = tbl_order.shipping_id where tbl_order.order_id = '$orderId'";
		if(mysqli_query($this->db_connect,$sql)){
			$query = mysqli_query($this->db_connect,$sql);
			return mysqli_fetch_assoc($query);
		}
		
	}

	public function getOrderAndPaymentStatus($orderId){
		$sql = "select o.order_id, p.payment_status, o.order_status from tbl_order as o left join tbl_payment as p on p.order_id = o.order_id where o.order_id = '$orderId'";
		if(mysqli_query($this->db_connect,$sql)){
			$query = mysqli_query($this->db_connect,$sql);
			return mysqli_fetch_assoc($query);
		}
		
	}

	public function updateOrderPaymentStatus($data){
		$sql = "UPDATE tbl_order SET order_status='complete' WHERE order_id='$data[order_id]'";
		if(mysqli_query($this->db_connect,$sql)){
			$sql = "UPDATE tbl_payment SET payment_status='paid' WHERE order_id='$data[order_id]'";
			if(mysqli_query($this->db_connect,$sql)){
				header('Location:manage_order.php');
			}
		}
	}

// 	select *, sum(order_total) as total_sell from tbl_order group by order_status;

// select * from tbl_order;






}



?>