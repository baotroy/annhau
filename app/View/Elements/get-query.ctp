<?php 
if(isset($this->request->query)){
	foreach ($this->request->query as $key => $value) {?>
	<input type="hidden" name="<?php echo $key; ?>" class="js-<?php echo $key; ?>" value="<?php echo $value; ?>">
<?php
	}
}
 ?>