<div class="left-sidebar">
	<!-- <h2>Category</h2> -->
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
	<?php foreach ($cats as $key => $value): ?>
		<div class="panel panel-default">
		<?php if(isset($subcats[$value['Category']['id']])){ ?>
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $this->Text->clean($value['Category']['name']); ?>"  class="<?php if(!in_array($cat, array_keys($subcats[$value['Category']['id']]))) echo 'collapsed';?>">
						<span class="badge pull-right"><i class="fa fa-plus"></i></span>
						<?php echo $value['Category']['name'].' ('.$value['Category']['product_count'].')'; ?>
					</a>
				</h4>
			</div>
			<div id="<?php echo $this->Text->clean($value['Category']['name']); ?>" class="panel-collapse <?php if(!in_array($cat, array_keys($subcats[$value['Category']['id']]))) echo 'collapse'; else echo 'in';?>">
				<div class="panel-body">
					<ul>
					<?php foreach ($subcats[$value['Category']['id']] as $skey => $svalue) :?>
						<li><a href="<?php echo $this->base.'/products?c='.$this->Text->clean($svalue).'-'.$skey; ?>" class="submenu <?php if($cat==$skey) echo 'active'; ?>"><?php echo $svalue ?></a></li>
					<?php endforeach; ?>
					</ul>
				</div>
			</div>
		<?php 
		}else{
		?>
			<div class="panel-heading">
				<h4 class="panel-title">
					<a href="#">
						<span class="badge pull-right"><i class="fa fa-plus"></i></span>
						<?php echo $value['Category']['name'].' ('.$value['Category']['product_count'].')'; ?>
					</a>
				</h4>
			</div>
		<?php
		} ?>
		</div>
	<?php endforeach ?>
		<!-- <div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Bedroom (15)</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Bathroom (39)</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Kitchen (25)</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Outdoor (4)</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Others (125)</a></h4>
			</div>
		</div> -->
	</div><!--/category-products-->
</div>

