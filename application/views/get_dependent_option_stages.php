<option value="">Select Stage Name</option>
<?php
	foreach ($stages_names as $value) {
?>
	<option value="<?php echo $value['value'];?>"><?php echo $value['name'];?></option>
<?php
	}
?>