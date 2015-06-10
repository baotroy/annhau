<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <?php
        echo $this->element('admin/top-nav'); 
        echo $this->element('admin/left-nav');
    ?>
        
    </nav>

    <div id="page-wrapper">
        
        <div class="row">
            <div class="col-lg-12">
                <?php echo $this->element('admin/title-bar'); ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
            	<?php echo $this->Session->flash(); ?>
                <div class="panel panel-default">
                    <div class="panel-body">
						 <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
						  <div class="form-group">
						    <label class="control-label col-sm-2" for="banner"></label>
						    <div class="col-sm-10">
						      <input type="file" class="form-control" name="image" id="banner">
						    </div>
						  </div>
						  
						  <div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default" onclick="return check();">Thêm</button>
						    </div>
						  </div>
						</form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php $this->start('script_content'); ?>
<script>
	function check(){
		file = $('input[type=file]');
		
		if(!checkFileExt(file)){
			alert("Hãy chọn file ảnh có đuôi là JPG, GIF, PNG.");
			$('input[type=file]').val('');
			return false;
		}
		if (file.val() == ''){
			alert('Hãy chọn file để bắt đầu thêm!');
			return false;
		}
		return true;
	}
</script>
<?php $this->end(); ?>