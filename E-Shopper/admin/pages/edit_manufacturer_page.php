<?php 
if(isset($_GET['manufacturer_id'])){
	$manufacturerId = $_GET['manufacturer_id'];
	$manufacturerInfo = $admin->getManufacurerInfoById($manufacturerId);
}
if(isset($_POST['update_manufacturer'])){
	$admin->updateManufacturerById($_POST,$manufacturerId);
}
?>

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="">Eshopper</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Edit Manufacturer</a></li>
</ul>

<div class="row-fluid sortable ui-sortable">
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Manufacturer Edit</h2>
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
				  <label class="control-label" for="typeahead">Manufacturer Name </label>
				  <div class="controls">
					<input type="text" name="manufacturer_name" value="<?php echo $manufacturerInfo['manufacturer_name'];  ?>" class="span6 typeahead" id="typeahead">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Manufacturer Description </label>
				  <div class="controls">
					<textarea rows="5" cols="8" class="span6 typeahead" name="manufacturer_description"><?php echo $manufacturerInfo['manufacturer_description']; ?>
					</textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Status </label>
				  <div class="controls">
					<select name="publication_status" class="span6 typeahead">
						<option>Select one</option>
						<option value="1" <?php echo ($manufacturerInfo['publication_status'] == 1)?'selected="true"':''; ?>>Published</option>
						<option value="0" <?php echo ($manufacturerInfo['publication_status'] == 0)?'selected="true"':''; ?>>Unpublished</option>
					</select>
				  </div>
				</div>

				<div class="form-actions">
				  <button type="submit" name="update_manufacturer" class="btn btn-primary">Save changes</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->
</div>