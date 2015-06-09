<?php $lang = CakeSession::read('lang'); ?>
<div class="product-details"><!--product-details-->
	<input type="hidden" id="rate" value="<?php if(CakeSession::check('rate_'.$item['Product']['id'])) echo 1; else echo 0; ?>">
	<div class="col-sm-5">
		<div class="view-product">
			<img <?php echo $this->Text->images(array($item['Product']['image_1'], $item['Product']['image_2'], $item['Product']['image_3'], $item['Product']['image_4'], $item['Product']['image_5']) , DIR_PRODUCT.DIR_SMALL); ?> alt="<?php echo $item['Product']['name_'.$lang]; ?>">
			<h3 class='jszoom'><span class="glyphicon glyphicon-zoom-in"></span></h3>
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
			    			if($this->Text->image_exist($value, DIR_PRODUCT.DIR_SMALL)) {
			    				$close = true;
			    		?>
			    			<img src="<?php echo $this->Text->image($value, DIR_PRODUCT.DIR_SMALL) ?>" alt="<?php echo $item['Product']['name_'.$lang]; ?>" ref="<?php echo $this->Text->image($value, DIR_PRODUCT);?>">
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
			<h2><?php echo $item['Product']['name_'.$lang]; ?></h2>
			<p>Web ID: <?php echo $item['Product']['id']; ?></p>
			
			<!-- <img src="<?php echo $this->Text->images(array($item['Product']['image_1'], $item['Product']['image_2'], $item['Product']['image_3'], $item['Product']['image_4'], $item['Product']['image_5']) , DIR_PRODUCT); ?>" alt=""> -->
			<!-- <p><b>Availability:</b> In Stock</p> -->
			<p><?php echo Message::label('category'); ?>: <a href="<?php echo $this->base.'/products?c=' .$this->Text->clean($item['SubCat']['name_'.$lang]).'-' . $item['SubCat']['id']; ?>"><b><?php echo $item['SubCat']['name_'.$lang]; ?></b></a></p>
			<?php $rated = round($item['Product']['rate']); ?>
			<p class="rater clearfix">
				<span class="star-rating <?php if(CakeSession::check('rate_'.$item['Product']['id'])) echo 'rated'; else echo 'unrate'; ?>">
				<?php for($i=1; $i<=5; $i++){?>
					<input type="radio" name="rating" <?php if(CakeSession::check('rate_'.$item['Product']['id'])) echo 'disabled'?> value="<?php echo $i; ?>"><i <?php if($i<=$rated) echo 'class="active"'; ?>></i>
				<?php } ?>
				</span>
				
				<span id="rate-text"><?php echo  round($item['Product']['rate'], 2).'/'.$item['Product']['rate_count'] ?></span>
			</p>
			  <!-- <input type="radio" name="rating" value="1"><i></i>
			  <input type="radio" name="rating" value="2"><i></i>
			  <input type="radio" name="rating" value="3"><i></i>
			  <input type="radio" name="rating" value="4"><i></i>
			  <input type="radio" name="rating" value="5"><i></i> -->
			
			<p><?php echo $item['Product']['short_description_'.$lang]; ?></p>


		</div><!--/product-information-->
	</div>
</div><!--/product-details-->

<script>
	$('.star-rating input').click(function(){
		var product = "<?php echo $item['Product']['id']; ?>";
		if($('#rate').val() == 1) return false;
		val = $(this).val();
		$('.star-rating input').attr('disabled','disabled');
		$('.star-rating').removeClass('unrate').addClass('rated');
		url = "<?php echo $this->base.'/products/rateajax' ?>";
		rating(url, product, val);
	});
</script>