<?php $lang = CakeSession::read('lang'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php echo $this->element('category-sidebar'); ?>
		</div>
		<div class="col-sm-9 padding-right">
			<?php echo $this->element('product-detail'); ?>
			<div>
				<?php $images =array($item['Product']['image_1'], $item['Product']['image_2'], $item['Product']['image_3'], $item['Product']['image_4'], $item['Product']['image_5']);
			    
			    	foreach ($images as $key => $value) {

			    		if($this->Text->image_exist($value, DIR_PRODUCT.DIR_SMALL)) {
			    			$imageInfo = getimagesize(WWW_ROOT.DIR_IMAGE.DIR_PRODUCT.$value);
			    		?>
			    		<p class="image-item">
			    			<a  href="#modal" data-toggle="modal" data-target="#popup" class="mask" meta="<?php echo $imageInfo[0]; ?>">
			    				<img src="<?php echo $this->Text->image($value, DIR_PRODUCT) ?>" alt="<?php echo $item['Product']['name_'.$lang]; ?>" ref="<?php echo $this->Text->image($value, DIR_PRODUCT);?>">
			    			</a>
			    		</p>
			    		<?php
			    			
			    			}
			    		}
			    	?>
			</div>
			<div class="category-tab shop-details-tab"><!--category-tab-->
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<!-- <li class="active"><a href="#details" data-toggle="tab"><?php echo Message::label('tab_details'); ?></a></li> -->
						<li><a href="#reviews" data-toggle="tab"><?php echo Message::label('tab_reviews'); ?> (<span class="countcm"><?php echo count($comments); ?></span>)</a></li>
					</ul>
				</div>
				<div class="tab-content">
					<!-- <div class="tab-pane fade active in" id="details">
						<?php echo $item['Product']['long_description_'.$lang]; ?>
					</div> -->
					
					<div class="tab-pane fade active in" id="reviews">
						<div class="col-sm-12">
						<?php foreach ($comments as $key => $comment) {?>
							<ul>
								<li><i class="fa fa-user"></i><?php echo $comment['Comment']['commentator']; ?></li>
								<li><i class="fa fa-clock-o"></i><?php echo $this->Text->time($comment['Comment']['created']); ?></li>
								<li><i class="fa fa-calendar-o"></i><?php echo $this->Text->date($comment['Comment']['created']); ?></li>
							<?php if($login): ?>
								<li class="fr"><i class="rvcomment glyphicon glyphicon-remove" rel="<?php echo $comment['Comment']['id']; ?>"></i></li>
							<?php endif; ?>
							</ul>
							<p><?php echo  nl2br($comment['Comment']['content']); ?></p>
						<?php } ?>
							<div id="comment-box">
							
								<p><b><?php echo Message::label('write_review'); ?></b></p>
								
								<form action="#" id="form-comment">
									<span>
										<input type="hidden" name="product" value="<?php echo $id; ?>">
										<input type="text" placeholder="<?php echo Message::label('your_name'); ?>" name="commentator" class="jxcommentator" maxlength="30">
										<input type="email" placeholder="Email" name="email" class="jxemail" maxlength="30">
									</span>
									<textarea name="content" class="jxcontent" maxlength="200" style="margin-bottom: 0"></textarea>
									<p><span style="display: inline-block"><?php echo Message::label('you_left'); ?></span><span style="display: inline-block; padding: 0px 2px" class="jxleft"> 200 </span><span style="display: inline-block"><?php echo Message::label('character'); ?></span></p>
									<button type="button" class="btn btn-default pull-right" id="comment">
										Submit
									</button>
								</form>							
							</div>
						</div>
					</div>
					
				</div>
			</div><!--/category-tab-->
			
			
		</div>
	</div>	
</div>
<!-- Modal -->
<div id="popup" class="modal fade" role="dialog" style="display: none">
  <div class="modal-dialog loading">

    <!-- Modal content-->
    <div class="modal-content imiz">
      <div class="modal-body">
    	<div class="col-sm-9 padding-right content">
			
		</div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close glyphicon glyphicon-remove" data-dismiss="modal"></button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
	$('#comment').click(function(){
		url = "<?php echo $this->base.'/comment/write/'.$id ?>";
		postComment(url, '<?php echo Message::label("thank_comment");?>');
		return false;	
	});
    $(':radio').change(
	  function(){
	    $('.choice').text( this.value + ' stars' );
	  } 
	)
	$('textarea').keyup(function(){
  		length = $(this).val();
  		$('.jxleft').text(200 - length.length);
  	});

  	$(document).on('click', '.rvcomment', function(){
  		cur = $(this);
  		url = "<?php echo $this->base.'/comment/remove' ?>";
  		if(confirm('Có chắc chắn xóa?'))
  			removeComment(url, cur);
  	});

  	$('.mask').click(function(){
  		$('.modal-dialog').removeAttr('style');
		$('.modal-dialog').addClass('loading');
		loader = '<img class="loader" src="<?php echo $this->base; ?>/images/loading.gif">';
		$('#popup .content').html(loader);
		$('.modal-content').removeAttr('style');

		ref = $(this).find('img').attr('ref');
		alt =  $(this).find('img').attr('alt');
		winWidth = $(window).width();
		winWidth = winWidth * 0.7;
		imageWidth = $(this).attr('meta');
		imageWidth = parseInt(imageWidth);
			console.log($('.modal-dialog'));
		if(imageWidth < winWidth){
			
			imageWidth += 40;
			
			$('.modal-dialog').attr('style', 'max-width:'+imageWidth+'px');
		}

		$('#popup').on('shown.bs.modal', function(){			
			newimage = '<img id="streamer" class="streamer" src="'+ref+'" alt="'+alt+'" style="opacity: 0">';
			$('#popup .content').html(newimage);
			$('.streamer').load(function(){
				$('.loading').removeClass('loading');
				$('.loader').remove();
				$(this).animate({
					opacity: 1
				},500, function(){
					$('.modal-content').attr('style', 'background: transparent');
				});

			});
				
		});
	});
</script>
