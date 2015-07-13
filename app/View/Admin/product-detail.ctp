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
        <div class="row">
            <div class="col-lg-12">
                <?php echo $this->Session->flash(); ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
                            <table class="table tbl-non">
                                <tr>
                                    <td width="150">Tên sản phẩm (Tiếng Việt)<span class="required">*</span></td>
                                    <td>
                                        <input size="50" class="form-control <?php if(@$this->validationErrors['Product']['name_vi']) echo 'error'?>" type="text" name="name_vi" maxlength="100" value="<?php echo @$item['Product']['name_vi'] ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Tên sản phẩm (Tiếng Anh)<span class="required">*</span></td>
                                    <td>
                                        <input size="50" class="form-control <?php if(@$this->validationErrors['Product']['name_en']) echo 'error'?>" type="text" name="name_en" maxlength="100" value="<?php echo @$item['Product']['name_en'] ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Danh mục<span class="required">*</span></td>
                                    <td>
                                        <select class="form-control" name="category">
                                        <?php foreach ($cats as $cat_key => $cat) {
                                        ?>
                                        <option value="<?php echo $cat['Category']['id'] ?>" <?php if(@$item['Product']['category'] == $cat['Category']['id']) echo 'selected'; ?>><?php echo $cat['Category']['name_vi'] ?></option>
                                        <?php
                                        } ?>
                                        </select>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td width="150">Mô tả (Tiếng Việt)</td>
                                    <td>
                                        <textarea name="long_description_vi" cols="30" rows="5" class="form-control" id="contact"><?php echo @$params['long_description_vi']; ?><?php echo @$item['Product']['long_description_vi'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Mô tả (Tiếng Anh)</td>
                                    <td>
                                        <textarea name="long_description_en" cols="30" rows="5" class="form-control" id="contact"><?php echo @$params['long_description_en']; ?><?php echo @$item['Product']['long_description_en'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Hình ảnh 1</td>
                                    <td>
                                        <input type="file" name="image_1" /><span class="error"></span>
                                    <?php if(@$mode == 'edit' ):?>
                                        <img src="<?php echo $this->Text->image($item['Product']['image_1'], DIR_PRODUCT.DIR_SMALL) ?>" alt="<?php echo $item['Product']['name_vi']; ?>" width="100"/>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Hình ảnh 2</td>
                                    <td>
                                        <input type="file" name="image_2" /><span class="error"></span>
                                    <?php if(@$mode == 'edit' ):?>
                                        <img src="<?php echo $this->Text->image($item['Product']['image_2'], DIR_PRODUCT.DIR_SMALL) ?>" alt="<?php echo $item['Product']['name_vi']; ?>" width="100"/>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Hình ảnh 3</td>
                                    <td>
                                        <input type="file" name="image_3" /><span class="error"></span>
                                    <?php if(@$mode == 'edit' ):?>
                                        <img src="<?php echo $this->Text->image($item['Product']['image_3'], DIR_PRODUCT.DIR_SMALL) ?>" alt="<?php echo $item['Product']['name_vi']; ?>" width="100"/>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Hình ảnh 4</td>
                                    <td>
                                        <input type="file" name="image_4" /><span class="error"></span>
                                    <?php if(@$mode == 'edit' ):?>
                                        <img src="<?php echo $this->Text->image($item['Product']['image_4'], DIR_PRODUCT.DIR_SMALL) ?>" alt="<?php echo $item['Product']['name_vi']; ?>" width="100"/>
                                    <?php endif; ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Hình ảnh 5</td>
                                    <td>
                                        <input type="file" name="image_5" /><span class="error"></span>
                                    <?php if(@$mode == 'edit' ):?>
                                        <img src="<?php echo $this->Text->image($item['Product']['image_5'], DIR_PRODUCT.DIR_SMALL) ?>" alt="<?php echo $item['Product']['name_vi']; ?>" width="100"/>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="<?php echo $this->base.'/admin' ?>" class="btn btn-primary">Quay lại</a></td>
                                    <td align="right"><button class="btn btn-primary jsgo"><?php if(@$mode=='add') echo 'Thêm'; else echo 'Cập nhật' ?></button></td>
                                </tr>
                            </table>
                        </form>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php $this->start('script_content'); ?>
<script>
    function check(file){
        //file = $('input[type=file]');
        
        if(!checkFileExt(file)){
            return false;
        }
        return true;
    }
    $(function(){
        url = "<?php echo $this->base.'/admin/axcat' ?>";
        cat = $('.jxCategory').val();
        $('.jxsubcat').removeClass('error');
        getAXCat(url, cat);
    });
    $('.jxCategory').change(function(data){
        url = "<?php echo $this->base.'/admin/axcat' ?>";
        cat = $(this).val();
        $('.jxsubcat').removeClass('error');
        getAXCat(url, cat);
    });

    $('.jsgo').click(function(){
        subcat = $('.jxsubcat').val();
        if(subcat == ''){
            $('.jxsubcat').addClass('error');
            return false;
        }
        cat = $('.jxCategory').val();
        if(cat == ''){
            $('.jxCategory').addClass('error');
            return false;
        }

        files = $('input[type="file"]');
        $('.error').text('');
        for(i=0; i<files.length; i++){
            if(files[i].value != ''){
                if(!check($(files[i]))){
                    $(files[i]).next('.error').text('Hãy chọn file hình ảnh (JPG, PNG, GIF)');
                }
            }
        }
        //return false;
    });
</script>
<?php $this->end(); ?>