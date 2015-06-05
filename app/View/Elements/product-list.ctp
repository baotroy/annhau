<?php echo $this->element('cat-title'); ?>
			<div class="features_items"><!--features_items-->
				<!-- <h2 class="title text-center">Features Items</h2> -->
				<div class="col-sm-4 filter">
				<?php echo $this->Form->create('filter', array('type'=>'get')); 
					echo $this->element('get-query');
				?>
					<?php $sort="name"; $by ='asc'; $f = 1;
						if(isset($this->request->query['sort'])){
							$sort = $this->request->query['sort'];
							$by = $this->request->query['by'];
						}
						if($sort == 'price' && $by =='desc') $f = 2;
						if($sort == 'name' && $by =='asc') $f = 3;
						if($sort == 'name' && $by =='desc') $f = 4;
						if($sort == 'date' && $by =='desc') $f = 5;
					if($items){
					?>
					<select id="filter_sort"  class="selectpicker btn dropdown-toggle sort-filter">
				    <!--   <option value="1">Price: $-$$</option>
				      <option value="2">Price: $$-$</option> -->
				      <option value="3" <?php if($f==3) echo 'selected'; ?>>Name: A-Z</option>
				      <option value="4" <?php if($f==4) echo 'selected'; ?>>Name: Z-A</option>
				      <option value="5" <?php if($f==5) echo 'selected'; ?>>New Arrivals</option>
				  	</select>
				  	<?php 
				  	}//end if items
				  	if(!isset($this->request->query['sort'])): ?>
				  	<input type="hidden" name="sort" value="price">
				  	<?php endif; ?>
				  	<?php if(!isset($this->request->query['by'])): ?>
				  	<input type="hidden" name="by" value="asc">
				  	<?php endif; ?>
			  	</div>
			  	<script>
			  		$('#filter_sort').change(function(){
			  			var f =$(this).val();

			  			switch(f){
			  				case '2':
			  					$('.js-sort').val('price');
			  					$('.js-by').val('desc');
			  					break;
			  				case '3':
			  					$('.js-sort').val('name');
			  					$('.js-by').val('asc');
			  					break;
			  				case '4':
			  					$('.js-sort').val('name');
			  					$('.js-by').val('desc');
			  					break;
			  				case '5':
			  					$('.js-sort').val('date');
			  					$('.js-by').val('desc');
			  					break;
			  				default:			  					
			  					$('.js-sort').val('price');
			  					$('.js-by').val('asc');
			  					break;
			  			}
			  			$('#filterIndexForm').submit();
			  		});
			  	</script>
			  	<?php echo $this->Form->end(); 
			  	if($items){
			  	foreach ($items as $key => $value): ?>
				<div class="col-sm-4 product-item">
					<div class="product-image-wrapper">
						<div class="single-products">
							<a href="<?php echo $this->base.'/products/detail/'.$this->Text->clean($value['Product']['name']). '-' . $value['Product']['id'];?>">
								<div class="productinfo text-center">
									<img src="<?php echo $this->Text->image($value['Product']['image_1'], DIR_PRODUCT);?>" alt="<?php echo $value['Product']['name'] ?>" />
									<h2></h2>
									<p><?php echo $value['Product']['name']; ?></p>
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
			<?php endforeach; 
				}else{?>
					<div class="col-sm-4 product-item">
					<?php echo NO_ITEMS ?>
					</div>
					<?php
				}
			?>
				<div class="clearfix"></div>
				<!-- <ul class="pagination">
					<li class="active"><a href="">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">»</a></li>
				</ul> -->
				<?php
				if (count($items) > 0) :
				    echo $this->Paginator->counter(array(
				        'format' => __('')
				    ));
				    ?>    
				        <div class="col-xs-12" align="center">
				            <ul class="pagination">
				     <?php if ($this->Paginator->hasPrev()) { ?>
				                <?php echo $this->Paginator->prev('«', array('escape' => false, 'tag' => 'li'), null, array('escape' => false, 'class' => 'previous disabled', 'disabledTag' => 'a')); ?>
				            <?php } ?>
				    <?php echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1, 'ellipsis' => '<li><a>...</a></li>')); ?>

				     <?php if ($this->Paginator->hasNext()) { ?>
				                <?php echo $this->Paginator->next('»', array('escape' => false,'tag'=>'li'), null, array('escape' => false, 'class' => 'disabled', 'disabledTag' => 'a', )); ?>
				            <?php } ?>
				            </ul>
				        </div><!-- /col -->				        
				        <?php endif; ?>   
				</div><!-- /row -->
				    <?php if ($this->Paginator->hasNext() || $this->Paginator->hasPrev()) { ?>
				    <hr class="thin" />
				<?php } ?>
			</div><!--features_items-->