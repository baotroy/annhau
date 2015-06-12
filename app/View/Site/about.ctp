<!--about-->
	<div class="about">
		<div class="container">
			<div class="services">
				<h3><?php echo Message::label('mnu_about'); ?></h3>
			</div>	
			<div>
				<?php 
				$lang = CakeSession::read('lang');
				echo $item['about_'.$lang]; ?>
			</div>
		</div>	
	</div>
	<!--//about-->