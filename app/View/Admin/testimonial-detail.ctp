<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <?php
        echo $this->element('admin/top-nav'); 
        echo $this->element('admin/left-nav');
    ?>
        
    </nav>

    <div id="page-wrapper">
        <?php echo $this->element('admin/breadcrumbs'); ?>
        <div class="row">
            <div class="col-lg-12">
                <?php echo $this->element('admin/title-bar'); ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
         <form id="formAboutForm" class="form-horizontal" role="form" method="post" enctype= "multipart/form-data">
        <div class="row">
            <?php echo $this->Session->flash(); ?>
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                     <li <?php if(!isset($bar) || @$bar==1) echo 'class="active"'; ?>><a href="#tab1default" data-toggle="tab">Tiếng Việt</a></li>
                    <li <?php if(@$bar==2)  echo 'class="active"'; ?>><a href="#tab2default" data-toggle="tab">Tiếng Anh</a></li>
                    <li <?php if(@$this->request->query['tab']==3) echo 'class="active"'; ?>><a href="#tab3default" data-toggle="tab">File</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade <?php if(!isset($bar) || @$bar==1) echo 'in active'; ?>" id="tab1default">
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="name_vi">Tiêu đề</label>
                                <div class="col-sm-10">
                                  <input type="text" name="name_vi" class="form-control" id="name_vi" maxlength="255" placeholder="" value="<?php echo @$item['name_vi']; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="description_vi">Mô tả</label>
                                <div class="col-sm-10">
                                  <textarea name="description_vi" id="description_vi" class="form-control" rows="5" cols="50"><?php echo @$item['description_vi']; ?></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="image">Hình ảnh</label>
                                <div class="col-sm-10">
                                  <input type="file" name="image_ser" id="image_main"><span class="error"></span>
                                   <div class="clearfix"></div>
                                  <?php if(@$item['image']):?>
                                        <img src="<?php echo $this->Text->image($item['image'], DIR_UPLOAD) ?>" alt="" width="100"/>
                                  <?php endif; ?>
                                </div>
                                
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2">Nội dung</label>
                                <div class="col-sm-10">
                                  <?php 
                                  echo $this->Form->textarea('content_vi', array('class'=>'ckeditor', 'value'=> @$item['content_vi']));
                                  
                                   ?>
                                   <script type="text/javascript">
                                  CKEDITOR.replace( 'textarea_id', {
                                  toolbar: [[ 'Bold', 'Italic','Underline','Subscript','Superscript'],],
                                  width: '700',
                                  height: '600',
                                  });
                                  </script>
                                </div>
                              </div>

                             
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                     
                    </div>
                    <div class="tab-pane fade <?php if(@$bar==2)  echo 'in active'; ?>" id="tab2default">
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="name_vi">Tiêu đề</label>
                              <div class="col-sm-10">
                                <input type="text" name="name_en" class="form-control" id="name_vi" maxlength="255" placeholder="" value="<?php echo @$item['name_vi']; ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="description_en">Mô tả</label>
                              <div class="col-sm-10">
                                <textarea name="description_en" id="description_en" class="form-control" rows="5" cols="50"><?php echo @$item['description_en']; ?></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2">Nội dung</label>
                              <div class="col-sm-10">
                                  <?php 
                                    echo $this->Form->textarea('content_en', array('class'=>'ckeditor', 'value'=> @$item['content_en']));
                                    
                                     ?>
                                     <script type="text/javascript">
                                    CKEDITOR.replace( 'textarea_id', {
                                    toolbar: [[ 'Bold', 'Italic','Underline','Subscript','Superscript'],],
                                    width: '700',
                                    height: '600',
                                    });
                                    </script>
                              </div>
                            </div>
                          <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    
                    </div>    
                    <div class="tab-pane fade <?php if(@$this->request->query['tab']==3) echo 'in active'; ?>" id="tab3default">
                        <!-- <form method="post" enctype="multipart/form-data" id="image-upload"> -->
                        <?php //echo $this->Form->create('upload', array('type'=>'post', 'enctype' => 'multipart/form-data')); ?>
                        <div class="blockfake">
                            <input type="file" class="fake" name="image" style="display:inline">
                            
                        <?php //echo $this->form->end(); ?>
                            <button class="btn btn-primary jsupload" onclick="return false;">Upload</button>
                            <span class="jserr"></span>
                        </div>  
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hình ảnh</th>
                                        <th>Đường dẫn</th>
                                        <th style="text-align: right">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="list-upload">
                            <?php if($items){
                                $index=1;
                                foreach ($items as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $index; $index++; ?></td>
                                    <td><img src="<?php echo $this->Text->image($value, DIR_UPLOAD); ?>" width="150">
                                    </td>   
                                    <td>
                                        <a href="<?php echo $this->Text->image($value, DIR_UPLOAD); ?>"><?php echo $this->Text->image($value, DIR_UPLOAD); ?></a>
                                    </td>
                                    <td><a href="/annhau/admin/about?action=delete&id=<?php echo $key ?>" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger">Xóa</a></td>
                                </tr>
                            <?php
                                   }
                                }
                                else{
                                    ?>
                                <tr><td colspan="4">Chưa có...</td></tr>
                            <?php
                                }
                             ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>                           
                </div>
            </div>

        </div>
      </form>
        <!-- /.row -->
    <div style="display: none">
      <form action="<?php echo $this->base.'/admin/axupload' ?>" class="axup" id="axuploadAxuploadForm" method="post" accept-charset="utf-8">
        
      </form>
    </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php $this->start('script_content'); ?>
<script>
    $('.fake').change(function(){
        $('.jserr').text('');
    });

    $('.jsupload').click(function(){
        form = $('form.axup');
        //img = $(this).parent().prev().prev().find('img');

        fakeFrom = $('#formAboutForm');
        var th = $(this);
        file = fakeFrom.find('input.fake[type=file]');
        err_space = fakeFrom.find('span.jserr');
        err_space.text('').removeClass('error').removeClass('success');
        
        if (file.val() !== '') {
            if(checkFileExt(file)){
                form.html(file);
                loader = '<img src="<?php echo $this->base.FS.DIR_IMAGE."loading.gif" ?>" width="30"/>';
                $(this).attr('style', 'background-color: transparent; border: none').html(loader).attr('disabled', 'disabled');
                form.ajaxForm({         
                    success: function(data) {
                        var data = $.parseJSON(data);
                        if(data.code==0){
                            err_space.addClass('success').text('Tải lên thành công');   
                            //var numrow = $('#list-upload tr').length + 1;
                            var new_row = '<tr><td>1</td><td><img src="'+data.val+'" width="150"></td><td><a href="'+data.val+'">'+data.val+'</a></td><td><a href="/annhau/admin/about?action=delete&amp;id=1" onclick="return confirm("Bạn có chắc chắn xóa?");" class="btn btn-danger">Xóa</a></td></tr>';
                            $('#list-upload').prepend(new_row);
                            file.val('');
                            $('.blockfake').prepend(file);
                            th.removeAttr('style').html('Upload').removeAttr('disabled');
                            resort();
                        }else{
                            err_space.addClass('error').text('Đã có lỗi. Xin hãy thử lại.');
                            th.removeAttr('style').html('Upload').removeAttr('disabled');
                        }
                    },
                    error: function(){
                        err_space.addClass('error').text('Đã có lỗi. Xin hãy thử lại.');
                        th.removeAttr('style').html('Upload').removeAttr('disabled');
                    }
                });
                form.submit();
            }else{
                $('#list-upload').prepend(new_row);
                file.val('');
                $('.blockfake').prepend(file);
                err_space.addClass('error').text('Bạn chỉ được chọn file hình ảnh (JPG, PNG, GIF)');
                th.removeAttr('style').html('Upload').removeAttr('disabled');
            }
        }else{
            //file.val('');
            //$('.blockfake').prepend(file);
            err_space.addClass('error').text('Hãy chọn 1 file để tải lên!')
            th.removeAttr('style').html('Upload').removeAttr('disabled');
        }
        return false;
    });
$('#image_main').change(function(){
      file = $(this);
      file.next('.error').text('');
      if(file.value != ''){
          if(!check(file)){
              file.val('');
              file.next('.error').text('Hãy chọn file hình ảnh (JPG, PNG, GIF)');
          }
      }
  });
function check(file){
    if(!checkFileExt(file)){
        return false;
    }
    return true;
}
function resort(){
    //var i=0;
    jQuery.each($('#list-upload tr'), function(index, data){
        $(data).find('td:first-child').text(index+1);
    });
}
</script>
<?php $this->end() ?>;