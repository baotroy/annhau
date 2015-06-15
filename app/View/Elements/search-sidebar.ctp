<?php $lang = CakeSession::read('lang'); ?>
<div class="left-sidebar">
	<!-- <h2>Category</h2> -->
	<form action="<?php echo $this->base.'/search' ?>" method="get" class="jsfilter">
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
		<?php foreach ($cats as $key => $value): ?>
			<div class="panel panel-default">
			
				<div class="panel-heading">
					<h4 class="panel-title">
					<label>
							<input type="checkbox" class="js-cat-filter" value="<?php echo $value['Category']['id']; ?>" <?php if(in_array($value['Category']['id'], $cat)) echo 'checked' ?>>
							<span><?php echo $value['Category']['name_'.$lang].' ('.$value['Category']['product_count'].')'; ?> </span>
					</label>
							<!-- <span class="badge pull-right"><i class="fa fa-plus"></i></span>
							<?php echo $value['Category']['name_'.$lang].' ('.$value['Category']['product_count'].')'; ?> -->
					</h4>
				</div>
			<?php
			//} ?>
			</div>
		<?php endforeach;
			echo $this->element('get-query');
		 ?>
		</div><!--/category-products-->
	</form>
</div>

