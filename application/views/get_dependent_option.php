<option value="">Select Wings</option>
<?php
	foreach ($get_wings as $value) {
?>
	<option value="<?php echo $value['value'];?>"><?php echo $value['wing_name'];?></option>
<?php
	}
?>