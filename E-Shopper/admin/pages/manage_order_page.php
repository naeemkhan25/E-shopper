<?php
 
$orderList = $admin->viewAllOrder();

?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Eshopper</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage Order</a></li>
</ul>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header" data-original-title="">
            <h2><i class="halflings-icon user"></i><span class="break"></span>Order List</h2>
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
                            <th class="sorting">Customer Name</th>
                            <th class="sorting">Total Order</th>
                            <th class="sorting">Order Date</th>
                            <th class="sorting">Order Status</th>
                            <th class="sorting">Actions</th>
                        </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    	<?php $i = 1; 
                    		foreach ($orderList as $order) { ?>
                        <tr class="odd">
                            <td class="  sorting_1"><?php echo $i; ?></td>
                            <td class="center "><?php echo $order['customer_name']; ?></td>
                            <td class="center "><?php echo $order['order_total']; ?></td>
                            <td class="center "><?php echo date('d-M-Y',strtotime($order['order_date'])); ?></td>
                            <td class="center "><?php echo $order['order_status']; ?></td>
                            <td class="center ">
                                <a href="open_order.php?order_id=<?php echo $order['order_id']; ?>" class="btn btn-primary">Open Order</a>
                            </td>
                        </tr>
                        <?php $i++; }	?>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
    <!--/span-->
</div>