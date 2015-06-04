<?php echo $this->Form->create('search', array('type' => 'get')); ?>
<div class="search_box fp">
	<input type="text" placeholder="Search" name="q">
	<button class="button_search"></button>
</div>
<?php echo $this->Form->end(); ?>