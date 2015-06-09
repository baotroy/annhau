<?php $lang = CakeSession::read('lang'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php echo $this->element('category-sidebar'); ?>
		</div>
		<div class="col-sm-9 padding-right">
			<?php echo $this->element('product-detail'); ?>
			
			<div class="category-tab shop-details-tab"><!--category-tab-->
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#details" data-toggle="tab"><?php echo Message::label('tab_details'); ?></a></li>
						<li><a href="#reviews" data-toggle="tab"><?php echo Message::label('tab_reviews'); ?> (<?php echo count($comments); ?>)</a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="details">
						<?php echo $item['Product']['long_description_'.$lang]; ?>
					</div>
					
					<div class="tab-pane fade " id="reviews">
						<div class="col-sm-12">
						<?php foreach ($comments as $key => $comment) {?>
							<ul>
								<li><i class="fa fa-user"></i><?php echo $comment['Comment']['commentator']; ?></li>
								<li><i class="fa fa-clock-o"></i><?php echo $this->Text->time($comment['Comment']['created']); ?></li>
								<li><i class="fa fa-calendar-o"></i><?php echo $this->Text->date($comment['Comment']['created']); ?></li>
							</ul>
							<p><?php echo  nl2br($comment['Comment']['content']); ?></p>
						<?php } ?>
							<div id="comment-box">
							<?php if(!CakeSession::check('commented')){ ?>
								<p><b><?php echo Message::label('write_review'); ?></b></p>
								
								<form action="#" id="form-comment">
									<span>
										<input type="hidden" name="product" value="<?php echo $id; ?>">
										<input type="text" placeholder="<?php echo Message::label('your_name'); ?>" name="commentator" class="jxcommentator" maxlength="30">
										<input type="email" placeholder="Email" name="email" class="jxemail" maxlength="30">
									</span>
									<textarea name="content" class="jxcontent" maxlength="200"></textarea>
									
									<button type="button" class="btn btn-default pull-right" id="comment">
										Submit
									</button>
								</form>
							<?php }else echo '<b>'.Message::label('thank_comment').'</b>';?>
								
							
							</div>
						</div>
					</div>
					
				</div>
			</div><!--/category-tab-->
			
			
		</div>
	</div>	
</div>

<script type="text/javascript">
	$('#comment').click(function(){
		url = "<?php echo $this->base.'/comment/write' ?>";
		postComment(url, '<?php echo Message::label("thank_comment");?>');
		return false;	
	});
    $(':radio').change(
	  function(){
	    $('.choice').text( this.value + ' stars' );
	  } 
	)
</script>
