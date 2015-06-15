<?php $lang = CakeSession::read('lang'); ?>
	<div class="about">
		<div class="container">
			<div class="services">
				<h3><?php echo $item['name_'.$lang]; ?></h3>
			</div>	
			<div class="row">
				<?php 
				echo $item['content_'.$lang]; ?>
			</div>
		</div>	
	</div>
	<!--//about-->