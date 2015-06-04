<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php echo $this->element('category-sidebar'); ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<?php echo $this->element('cat-title'); ?>
					<div class="features_items"><!--features_items-->
						<!-- <h2 class="title text-center">Features Items</h2> -->
						<div class="col-sm-4 filter">
						<?php echo $this->Form->create('filter', array('type'=>'get')); 
							if(isset($this->request->query)){
								foreach ($this->request->query as $key => $value) {?>
								<input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
							<?php
								}
							}
						?>

							<select id="filter_sort" class="selectpicker btn dropdown-toggle sort-filter">
						      <option value="1">Price: $-$$</option>
						      <option value="2">Price: $$-$</option>
						      <option value="3">Name: A-Z</option>
						      <option value="4">Name: Z-A</option>
						      <option value="5">New Arrivals</option>
						  	</select>
						  	<input type="hidden" id="sort" name="sort" value="price">
						  	<input type="hidden" id="by" name="by" value="asc">
					  	</div>
					  	<script>
					  		$('#filter_sort').change(function(){
					  			var f =$(this).val();
					  			switch(f){
					  				case 2:
					  					$('#sort').val('price');
					  					$('#by').val('desc');
					  					break;
					  				case 3:
					  					$('#sort').val('name');
					  					$('#by').val('asc');
					  					break;
					  				case 4:
					  					$('#sort').val('name');
					  					$('#by').val('desc');
					  					break;
					  				case 5:
					  					$('#sort').val('date');
					  					$('#by').val('desc');
					  					break;
					  				default:
					  					$('#sort').val('price');
					  					$('#by').val('asc');
					  					break;
					  			}
					  			$('#filterIndexForm').submit();
					  		});
					  	</script>
					  	<?php $this->end(); ?>
						<?php for($i=1; $i<=12; $i++): ?>
						<div class="col-sm-4 product-item">
							<div class="product-image-wrapper">
								<div class="single-products">
									<a href="<?php echo $this->base;?>/products/detail/">
										<div class="productinfo text-center">
											<img src="images/home/product1.jpg" alt="" />
											<h2></h2>
											<p>Easy Polo Black Edition</p>
											<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
										</div>
									<!-- 	<div class="product-overlay">
											<div class="overlay-content">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div> -->
									</a>
								</div>
								<!-- <div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div> -->
							</div>
						</div>
					<?php endfor; ?>
						<div class="clearfix"></div>
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">»</a></li>
						</ul>
					</div><!--features_items-->
					
				
			</div>
		</div>
		


		