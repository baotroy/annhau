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
                        <div class="table-responsive">
                            <div>
                                <a href="<?php echo $this->base.'/admin/banner?action=add'; ?>" class="btn btn-primary btn-head">Thêm</a>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Banner hiện tại</th>
                                        <th style="text-align: right">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($items){
                                    $index = 0;
                                    foreach ($items as $key => $value) :
                                        $index++;
                                 ?>
                                    <tr>
                                        <td><?php echo $index ?></td>
                                        <td><img data-u="image" src="<?php echo $this->Text->image($value, DIR_BANNER);?>" width="100"/></td>
                                        <td align="right">
                                            <a href="<?php echo $this->base.'/admin/banner?action=edit&id='.$key; ?>" class="btn btn-primary">Sửa</a>
                                            <a href="<?php echo $this->base.'/admin/banner?action=delete&id='.$key; ?>" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                <?php 
                                    endforeach;
                                }
                                else{
                                    ?>
                                    <tr><td colspan="3">Chưa có...</td></tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
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
<script type="text/javascript">
    // $('.btn-head').click(function(){
    //     $('.ban-hid').slideToggle( 300, function() {
            
    //       });
    //     return false;
    // });

    // $(document).on('click', '. xupload', function(){
    //     form = $('form');
                
    //     file = $('input[type=file]');
        
    //     var th = $(this);

    //     err_space = form.find('span');
    //     err_space.text('').removeClass('error').removeClass('success');
    //     //url = "<?php echo $this->base.'/admin/ajaxBanner'; ?>";
    //     if (file.val() !== '') {
    //         if(checkFileExt(file)){
    //          //   loader = '<img src="<?php echo $this->base.FS.DIR_IMAGE."loading.gif" ?>" width="30"/>';
    //             form.ajaxForm({         
    //                 success: function(data) {
    //                     var data = $.parseJSON(data);
    //                     if(data.code==0){
    //                         $('.unotif').text('Thêm thành công!');
    //                         img.attr('src', data.val);
    //                         file.val('');
    //                         // th.removeAttr('style').html('登録');
    //                     }else{
    //                       //  err_space.addClass('error').text('<?php echo Message::get("MSG_FAIL_UPDATE_IMAGE", "画像") ?>')
    //                         th.removeAttr('style').html('登録');
    //                     }
    //                 },
    //                 error: function(){
    //                    // err_space.addClass('error').text('<?php echo Message::get("MSG_FAIL_UPDATE_IMAGE", "画像") ?>')
    //                     th.removeAttr('style').html('登録');
    //                 }
    //             });
    //             form.submit();
    //         }else{
    //            // err_space.addClass('error').text('<?php echo Message::label("ERR_MSG_FILE_EXT") ?>');
    //             th.removeAttr('style').html('登録');
    //         }
    //     }else{
    //       //  err_space.addClass('error').text('<?php echo Message::get("ERR_EMPTY_FILE", "画像") ?>')
    //         th.removeAttr('style').html('登録');
    //     }
    //     return false;
    // });
</script>
<?php $this->end(); ?>