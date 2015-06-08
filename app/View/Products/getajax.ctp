<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="<?php echo $this->Text->images(array($item['Product']['image_1'], $item['Product']['image_2'], $item['Product']['image_3'], $item['Product']['image_4'], $item['Product']['image_5']) , DIR_PRODUCT); ?>" alt="">
			<h3 class='jszoom'>ZOOM</h3>
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">
			
			  <!-- Wrapper for slides -->
			    <div class="carousel-inner">
			    	<?php $images =array($item['Product']['image_1'], $item['Product']['image_2'], $item['Product']['image_3'], $item['Product']['image_4'], $item['Product']['image_5']);
			    	$index = 0;
			    	$active = false;
			    	$close = false;
			    	$div = '<div class="item">';
			    		foreach ($images as $key => $value) {
			    			$div = '<div class="item">';
			    			if(!$active){
			    				$active = true;
			    				$div = '<div class="item active">';
			    			}
			    			if($index%2 == 0) echo $div;
			    			if($this->Text->image_exist($value, DIR_PRODUCT)) {
			    				$close = true;
			    		?>
			    			<img src="<?php echo $this->Text->image($value, DIR_PRODUCT) ?>" alt="">
			    		<?php
			    				$index++;
			    			}
			    			if($index%2 == 0) echo '</div>';
			    		}
			    		if($close) echo '</div>';
			    	?>
				</div>

			  <!-- Controls -->
			  <?php if($close) : ?>
			  <a class="left item-control" href="#similar-product" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			  </a>
			  <a class="right item-control" href="#similar-product" data-slide="next">
				<i class="fa fa-angle-right"></i>
			  </a>
			<?php endif; ?>
		</div>

	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="<?php echo $this->base; ?>/images/new.jpg" class="newarrival" alt="">
			<h2><?php echo $item['Product']['name']; ?></h2>
			<p>Web ID: <?php echo $item['Product']['id']; ?></p>
			
			<!-- <img src="<?php echo $this->Text->images(array($item['Product']['image_1'], $item['Product']['image_2'], $item['Product']['image_3'], $item['Product']['image_4'], $item['Product']['image_5']) , DIR_PRODUCT); ?>" alt=""> -->
			<!-- <p><b>Availability:</b> In Stock</p> -->
			<p>Category: <a href="<?php echo $this->base.'/products?c=' .$this->Text->clean($item['SubCat']['name']).'-' . $item['SubCat']['id']; ?>"><b><?php echo $item['SubCat']['name']; ?></b></a></p>
			<!-- <span class="star-rating unrate">
			  <input type="radio" name="rating" value="1"><i></i>
			  <input type="radio" name="rating" value="2"><i></i>
			  <input type="radio" name="rating" value="3"><i></i>
			  <input type="radio" name="rating" value="4"><i></i>
			  <input type="radio" name="rating" value="5"><i></i>
			</span> -->


		</div><!--/product-information-->
	</div>
</div><!--/product-details-->