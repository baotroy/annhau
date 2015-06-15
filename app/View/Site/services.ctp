<?php $lang = CakeSession::read('lang'); ?>
	<div class="about">
		<div class="container">
			<div class="services">
				<h3><?php echo $item['name_'.$lang]; ?></h3>
			</div>	
			<div class="row">
				<div class="col-sm-2 svicon">
				<?php foreach ($items as $i): ?>
					<div ><a class="svi <?php if($i['Service']['id']==$id) echo 'active' ?>" href="<?php echo $this->Text->Clean($i['Service']['name_'.$lang].'-'.$i['Service']['id']) ?>"><?php echo $i['Service']['name_'.$lang]; ?></a></div>
				<?php endforeach ?>
				</div>
				<div class="col-sm-10">
					<?php 
					echo $item['content_'.$lang]; ?>
				</div>
			</div>
		</div>	
	</div>
	<!--//about-->