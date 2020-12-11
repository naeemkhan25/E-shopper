<?php 
if(isset($_POST['save_category'])){
	$message = $admin->saveCategory($_POST);
}

?>

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Eshopper</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Add Category</a></li>
</ul>

<h3 style="color: green;"><?php if(isset($message)){ echo $message; } ?></h3>
<div class="row-fluid sortable ui-sortable">
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Category Add</h2>
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
					<input type="text" name="category_name" class="span6 typeahead" id="typeahead">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Category Description </label>
				  <div class="controls">
					<textarea rows="5" cols="8" class="span6 typeahead" name="category_description"></textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Status </label>
				  <div class="controls">
					<select name="status" class="span6 typeahead">
						<option>Select one</option>
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				  </div>
				</div>

				<div class="form-actions">
				  <button type="submit" name="save_category" class="btn btn-primary">Save changes</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div>

