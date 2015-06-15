<?php $lang = CakeSession::read('lang');?>
<div class="left-sidebar">
	<!-- <h2>Category</h2> -->
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
	<?php foreach ($cats as $key => $value): ?>
		<div class="panel panel-default">
	
			<div class="panel-heading  <?php if(@$mcat == $value['Category']['id']) echo 'active' ?>">
				<h4 class="panel-title">
					<a href="<?php echo $this->base.'/products?m='.$this->Text->clean($value['Category']['name_'.$lang]).'-'.$value['Category']['id']; ?>">
						<!-- <span class="badge pull-right"><i class="fa fa-plus"></i></span> -->
						<?php echo $value['Category']['name_'.$lang].' ('.$value['Category']['product_count'].')'; ?>
					</a>
				</h4>
			</div>

		</div>
	<?php endforeach ?>
	</div><!--/category-products-->
</div>

