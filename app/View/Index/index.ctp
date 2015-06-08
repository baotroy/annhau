<!--blog-->
	<div class="blog">
		<div class="container">
			<div class="blog-top">
				<h3>CATEGORIES</h3>
			</div>
			<div class="blog-bottom">
				<?php
					$index = 0;
				 foreach(@$cats as $key => $cat): 
				 	if($index%2==0) echo '<div class="blog-one">';
				 ?>

					<div class="col-md-6 blog-left">
						<div class="col-md-5 blog-left-one">
							<a href="<?php echo $this->base.'/products?m='.$this->Text->clean($cat['Category']['name']).'-'.$cat['Category']['id']; ?>">
								<img src="<?php echo $this->Text->images(array($cat['Product']['image_1'], $cat['Product']['image_2'], $cat['Product']['image_3'], $cat['Product']['image_4'], $cat['Product']['image_5']) , DIR_PRODUCT); ?>" alt="<?php echo $cat['Category']['name']; ?>"/>
							</a>
						</div>
						<div class="col-md-7 blog-left-two">
							<!-- <label>Monday, 30 March 2014 17:09</label> -->
							<a href="<?php echo $this->base.'/products?m='.$cat['Category']['id']; ?>"><h4><?php echo $cat['Category']['name']; ?></h4></a>
							<p><?php echo $cat['Category']['description']; ?></p>
						</div>
						<div class="clearfix"></div>
					</div>
					
				<?php if($index%2==0 || $index == count($cats)-1) echo '</div>';
				$index++;
				endforeach; ?>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>
	</div>
	<!--blog-->
	<!--//portfolio-->
<div class="portfolio">
	<div class="container">
		<div class="services">
			<h3>NEW PRODUCTS</h3>
		</div>
		<div class="portfolio-bottom">
			
			<?php 
			foreach ($latest as $key => $value) :
				if($key%4 ==0) echo '<div class="portfolio-one">';
			 ?>
				<div class="col-md-3 port-left product">
					<a href="#modal" data-toggle="modal" data-target="#latest" class=" mask b-link-stripe b-animate-go   swipebox"  title="<?php echo $value['Product']['name']; ?>" data-id="<?php echo $value['Product']['id']?>" data-name="<?php echo $value['Product']['name']?>">
							<img src="<?php echo $this->Text->images(array($value['Product']['image_1'], $value['Product']['image_2'], $value['Product']['image_3'], $value['Product']['image_4'], $value['Product']['image_5']) , DIR_PRODUCT); ?>" alt="<?php echo $value['Product']['name']; ?>" class="img-responsive zoom-img"/>
					</a>
				</div>
			<?php
				if(($key%4 ==0 && $key>0)|| $key == count($latest)-1) echo '<div class="clearfix"> </div></div>';
			 endforeach; ?>
				
		</div>
	</div>
</div>
<!--portfolio-->

	<!--seemore-->
	<div class="Rate services">
		<div class="container">
			<h3>BEST PRODUCTS</h3>
		</div>
		<div class="blog-bottom">
			<?php echo $this->element('slider'); ?>
		</div>
	</div>
	
	<!--seemore-->

	
<!--services-->
	<div class="services">
		<div class="container">
			<h3>OUR SERVICES</h3>
			<div class="services-grids">
				<div class="col-md-4 services-grids-info">
					<span class="service-one"> </span>
					<h4>WEB DEVELOPMENT</h4>
					<p>Donec libero dui, scelerisque ac augue id, tristique ullamcorper elit. Nam ultrices, lacus vitae adipiscing aliquet, 
						metus ipsum imperdiet libero, vitae dignissim sapien diam ac nibh convallis.</p>
				</div>
				<div class="col-md-4 services-grids-info">
					<span class="service-two"> </span>
					<h4>QUALITY PHOTOGRAPHY</h4>
					<p>Donec libero dui, scelerisque ac augue id, tristique ullamcorper elit. Nam ultrices, lacus vitae adipiscing aliquet, 
						metus ipsum imperdiet libero, vitae dignissim sapien diam ac nibh convallis.</p>
				</div>
				<div class="col-md-4 services-grids-info">
					<span class="service-three"> </span>
					<h4>RELIABLE SUPPORT</h4>
					<div class="clearfix"> </div>
					<p>Donec libero dui, scelerisque ac augue id, tristique ullamcorper elit. Nam ultrices, lacus vitae adipiscing aliquet, 
						metus ipsum imperdiet libero, vitae dignissim sapien diam ac nibh convallis.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//services-->

	<!--testimonials-->
	<div class="testimonials services">
		<div class="container">
			<h3>TESTIMONIALS</h3>
			<div class="sap_tabs">	
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<ul class="resp-tabs-list">
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><img src="images/img4.jpg" alt=""/></span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span><img src="images/img5.jpg" alt=""/></span></li>
						<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><img src="images/img6.jpg" alt=""/></span></li>
						<div class="clear"></div>
					</ul>	
					<div class="resp-tabs-container">
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">				
							<div class="view view-first">
								<h5>FILAN FISTEKU</h5>
								<p>Donec libero dui, scelerisque ac augue id, tristique ullamcorper elit. Nam ultrices, lacus vitae adipiscing aliquet, metus ipsum imperdiet libero, vitae dignissim sapien diam ac nibh convallis.</p>
							</div>
						</div>
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
							<div class="view view-first">
								<h5>ULLAMCORPER FILAN </h5>
								<p>Scelerisque ac augue id Donec libero dui, , tristique ullamcorper elit. Nam ultrices, lacus vitae adipiscing aliquet, metus ipsum imperdiet libero, vitae dignissim sapien diam ac nibh convallis.</p>
							</div>
						</div>
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
							<div class="view view-first">
								<h5>SCELERISQUE AUGUE</h5>
								<p>Nam ultrices lacus vitae adipiscing aliquet, metus ipsum imperdiet libero, vitae dignissim sapientristique Donec libero dui, scelerisque ac augue id,  ullamcorper elit,diam ac nibh convallis.</p>
							</div>
						</div>
					</div>	
				</div>	
			</div>		  
		</div>
	</div>	
<!-- Modal -->
<div id="latest" class="modal fade" role="dialog">
  <div class="modal-dialog loading">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right content">
					Loading...
				</div>
			</div>	
		</div>



				
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>
<script>
	$('.mask').click(function(){
		id = $(this).attr('data-id');
		name = $(this).attr('data-name');
		$('.modal-title').html(name);
		$('#latest').on('shown.bs.modal', function(){
			url = "<?php echo $this->base.'/products/getajax/';?>" + id;
			$.get( url, function(data){
				$('.modal-dialog').removeClass('loading');
				$('#latest .content').html(data);
			});
		});
	});

</script>