<?php 
if(isset($_GET['order_id'])){
	$orderId = $_GET['order_id'];
	$orderDetailsList = $admin->viewAllOrderDetails($orderId);

    $customerInfo = $admin->getCustomerInfoByOrderId($orderId);
    $shippingInfo = $admin->getShippingInfoByOrderId($orderId);

    $status = $admin->getOrderAndPaymentStatus($orderId);
}

if(isset($_POST['complete'])){
    $admin->updateOrderPaymentStatus($_POST);
}


?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Eshopper</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Open Order</a></li>
</ul>

<div class="row-fluid sortable ui-sortable">
	<div class="box span6">
        <div class="box-header" data-original-title="">
            <h2><i class="halflings-icon user"></i><span class="break"></span>Customer Details</h2>
        </div>
        <div class="box-content">
            <div class="dataTables_wrapper" role="grid">
                <table class="table table-striped table-bordered">
                    <tr role="row">
                        <th>Customer Name</th>
                        <td><?php echo $customerInfo['customer_name']; ?></td>
                    </tr>
                    <tr role="row">
                        <th>Customer Phone</th>
                        <td><?php echo $customerInfo['customer_phone']; ?></td>
                    </tr>
                    <tr role="row">
                        <th>Customer Email</th>
                        <td><?php echo $customerInfo['customer_email']; ?></td>
                    </tr>
                    <tr role="row">
                        <th>Customer District</th>
                        <td><?php echo $customerInfo['customer_district']; ?></td>
                    </tr>
                    <tr role="row">
                        <th>Customer Address</th>
                        <td><?php echo $customerInfo['customer_address']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="box span6">
        <div class="box-header" data-original-title="">
            <h2><i class="halflings-icon user"></i><span class="break"></span>Shipping Address</h2>
        </div>
        <div class="box-content">
            <div class="dataTables_wrapper" role="grid">
                <table class="table table-striped table-bordered">
                    <tr role="row">
                        <th>Email Address</th>
                        <td><?php echo $shippingInfo['customer_email']; ?></td>
                    </tr>
                    <tr role="row">
                        <th>Contact Number</th>
                        <td><?php echo $shippingInfo['customer_phone']; ?></td>
                    </tr>
                    <tr role="row">
                        <th>Address</th>
                        <td><?php echo $shippingInfo['customer_address']; ?></td>
                    </tr>
                </table>
               
            </div>
        </div>
    </div>

</div>






<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header" data-original-title="">
            <h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="dataTables_wrapper" role="grid">
                
                <table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc">#</th>
                            <th class="sorting">Product Name</th>
                            <th class="sorting">Product Image</th>
                            <th class="sorting">Product Price</th>
                            <th class="sorting">Product Quantity</th>
                        </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    	<?php $i = 1; 
                    		foreach ($orderDetailsList as $orderDetails) { ?>
                        <tr class="odd">
                            <td class="  sorting_1"><?php echo $i; ?></td>
                            <td class="center "><?php echo $orderDetails['product_name']; ?></td>
                            <td class="center "><img src="<?php echo $orderDetails['product_image']; ?>" alt="" width="100" height="100"></td>
                            <td class="center "><?php echo $orderDetails['product_price']; ?></td>
                            <td class="center "><?php echo $orderDetails['product_quantity']; ?></td>
                        </tr>
                        <?php $i++; }	?>
                    </tbody>
                </table>
                <?php if($status['payment_status'] == 'pending' && $status['order_status'] == 'pending'){ ?>
                <form action="" method="post">
                    <input name="order_id" type="hidden" value="<?php echo $orderId; ?>">
                    <button name="complete" type="submit" class="btn btn-info pull-right">Complete Payment</button> 
                </form>
                
                <?php } ?>

                <br/>
               
            </div>
        </div>
    </div>
    
    <!--/span-->
</div>