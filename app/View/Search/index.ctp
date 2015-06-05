<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php echo $this->element('search-sidebar'); ?>
		</div>
		
		<div class="col-sm-9 padding-right">
			<?php echo $this->element('product-list'); ?>
		</div>
	</div>
</div>
<?php //$this->start('script_content'); ?>
<script type="text/javascript">
	$('.js-cat-filter').change(function(){
		var submenu = $('.js-cat-filter:checked');
		//console.log(submenu);
		var c='';
		submenu.each(function() {
			c += $(this).val()+',';
		});
		c = c.substr(0, c.length-1);
		var celem = $('input[name="c"]');
		if(celem.length>0)
			celem.val(c);
		else{
			$('.jsfilter').append('<input type="hidden" value='+c+' name="c">');
		}
		$('.jsfilter').submit();
	});
</script>
<?php //$this->end();?>
