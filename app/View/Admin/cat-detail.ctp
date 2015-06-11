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
                        <form method="post" enctype="multipart/form-data">
                            <table class="table tbl-non">
                                <tr>
                                    <td width="150">Tên danh mục (Tiếng Việt)<span class="required">*</span>:</td>
                                    <td>
                                        <input size="50" class="form-control <?php if(@$this->validationErrors['Category']['name_vi']) echo 'error'?>" style="width: 400px" type="text" name="name_vi" maxlength="20" value="<?php echo @$item['Category']['name_vi'] ?>"/>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td width="150">Tên danh mục (Tiếng Anh)<span class="required">*</span>:</td>
                                    <td>
                                        <input size="50" class="form-control <?php if(@$this->validationErrors['Category']['name_en']) echo 'error'?>" style="width: 400px" type="text" name="name_en" maxlength="50" value="<?php echo @$item['Category']['name_en'] ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Mô tả (Tiếng Việt):</td>
                                    <td>
                                        <textarea name="description_vi" cols="30" rows="5" class="form-control <?php if(@$this->validationErrors['Category']['description_vi']) echo 'error'?>"><?php echo @$item['Category']['description_vi'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Mô tả (Tiếng Anh):</td>
                                    <td>
                                        <textarea name="description_en" cols="30" rows="5" class="form-control <?php if(@$this->validationErrors['Category']['description_en']) echo 'error'?>"><?php echo @$item['Category']['description_en'] ?></textarea>
                                    </td>
                                </tr>
                            <?php if(@$item['Category']['image']):  ?>
                                <tr>
                                    <td width="150">Hình ảnh hiện tại:</td>
                                    <td>
                                        <img src="<?php echo $this->Text->image($item['Category']['image'], DIR_PRODUCT) ?>" width="100">
                                        <input type="hidden" name="image" value="<?php echo $item['Category']['image'] ?>" >
                                    </td>
                                </tr>
                            <?php endif; ?>
                                <tr>
                                    <td width="150">Hình ảnh:</td>
                                    <td>
                                        <input type="file" name="image">
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="<?php echo $this->base.'/admin/category' ?>" class="btn btn-primary">Quay lại</a></td>
                                    <td align="right"><button class="btn btn-primary"><?php if(@$mode=='add') echo 'Thêm'; else echo 'Cập nhật' ?></button></td>
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
