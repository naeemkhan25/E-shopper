<?php 
$productList = $admin->viewAllProduct();

?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Eshopper</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage Product</a></li>
</ul>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header" data-original-title="">
            <h2><i class="halflings-icon user"></i><span class="break"></span>Product List</h2>
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
                            <th class="sorting">Category Name</th>
                            <th class="sorting">Manufacturer Name</th>
                            <th class="sorting">Price</th>
                            <th class="sorting">Stock Qty</th>
                            <th class="sorting">Short Descrption</th>
                            <th class="sorting">Product Image</th>
                            <th class="sorting">Publicaton Status</th>
                            <th class="sorting">Actions</th>
                        </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    	<?php $i = 1; 
                    		foreach ($productList as $product) { ?>
                        <tr class="odd">
                            <td class="  sorting_1"><?php echo $i; ?></td>
                            <td class="center "><?php echo $product['product_name']; ?></td>
                            <td class="center "><?php echo $product['category_name']; ?></td>
                            <td class="center "><?php echo $product['manufacturer_name']; ?></td>
                            <td class="center "><?php echo $product['product_price']; ?></td>
                            <td class="center "><?php echo $product['stock_quantity']; ?></td>
                            <td class="center "><?php echo $product['product_short_description']; ?></td>
                            <td class="center ">
                            <img width="75" height="75" src="<?php echo $product['product_image']; ?>">
                            </td>

                            <td class="center ">
                            	<?php if($product['product_status']==1){
                            		?>
									<span class="label label-success">Published</span>
                            		<?php
                            		}else{
                            		?>
                            		<span class="label label-important">Unpublished</span>
                            		<?php
                            		} ?>
                                
                            </td>
                            <td class="center ">
                            	<?php 

                            		if($product['product_status']==1){
                            			?>
                            			<a class="btn btn-danger" href="product_action.php?action=unpublish&product_id=<?php echo $product['product_id'];?>">
                                    		<i class="halflings-icon white arrow-down"></i>
                                		</a>
                            			<?php
                            		}else{
                            			?>
                            			<a class="btn btn-success" href="product_action.php?action=publish&product_id=<?php echo $product['product_id'];?>">
                                    		<i class="halflings-icon white arrow-up"></i>
                                		</a>
                            			<?php
                            		} 

                            	?>

                                <a class="btn btn-info" href="edit_product.php?product_id=<?php echo $product['product_id']; ?>" title="Edit Product">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="product_action.php?action=delete&product_id=<?php echo $product['product_id'];?>" title="Delete Product">
                                    <i class="halflings-icon white trash"></i>
                                </a>
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