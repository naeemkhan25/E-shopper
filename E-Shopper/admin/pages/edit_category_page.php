<?php 
if(isset($_GET['category_id'])){
	$categoryId = $_GET['category_id'];
	$categoryInfo = $admin->getCategoryInfoById($categoryId);
}
if(isset($_POST['update_category'])){
	$admin->updateCategoryById($_POST,$categoryId);
}
?>

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Eshopper</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Edit Category</a></li>
</ul>

<div class="row-fluid sortable ui-sortable">
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Category Edit</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form action="" method="post" class="form-horizontal">
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Category Name </label>
				  <div class="controls">
					<input type="text" name="category_name" value="<?php echo $categoryInfo['category_name'];  ?>" class="span6 typeahead" id="typeahead">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Category Description </label>
				  <div class="controls">
					<textarea rows="5" cols="8" class="span6 typeahead" name="category_description"><?php echo $categoryInfo['category_description']; ?>
					</textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Status </label>
				  <div class="controls">
					<select name="status" class="span6 typeahead">
						<option>Select one</option>
						<option value="1" <?php echo ($categoryInfo['status'] == 1)?'selected="true"':''; ?>>Active</option>
						<option value="0" <?php echo ($categoryInfo['status'] == 0)?'selected="true"':''; ?>>Inactive</option>
					</select>
				  </div>
				</div>

				<div class="form-actions">
				  <button type="submit" name="update_category" class="btn btn-primary">Save changes</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div>

