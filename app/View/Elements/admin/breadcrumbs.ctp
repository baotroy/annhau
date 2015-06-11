<?php
 if(isset($breadcrumb) && count($breadcrumb)>0) { ?>
<div class="row">
    <div class="col-lg-12">
		<ul class="breadcrumb">
		    <?php 
			    $countItem = count($breadcrumb);
			    foreach ($breadcrumb as $k0 => $item){ ?>
			        <li><?php
			            foreach($item as $k => $option)
			            {
			                if($countItem > $k0+1)
			                    echo $this->Html->link(__($k), $option);
			                else
			                    echo $k;
			            }
			        ?></li>
			        
			    <?php } ?>
	</div>
</div>
<?php } ?>
