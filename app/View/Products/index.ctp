<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php echo $this->element('category-sidebar'); ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div ></div>
					<div class="features_items"><!--features_items-->
						<!-- <h2 class="title text-center">Features Items</h2> -->
						<div class="col-sm-4 filter">
							<select class="selectpicker btn dropdown-toggle sort-filter">
						      <option>PRICE: $-$$</option>
						      <option>PRICE: $$-$</option>
						      <option>NAME: A-Z</option>
						      <option>NAME: Z-A</option>
						      <option>NEW ARRIVALS</option>
						  	</select>
					  	</div>
						<?php for($i=1; $i<=12; $i++): ?>
						<div class="col-sm-4 product-item">
							<div class="product-image-wrapper">
								<div class="single-products">
									<a href="#">
										<div class="productinfo text-center">
											<img src="images/home/product1.jpg" alt="" />
											<h2>$56</h2>
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
		


		