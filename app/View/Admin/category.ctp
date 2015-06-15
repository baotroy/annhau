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
                    	<div>
                            <a href="<?php echo $this->base.'/admin/category?action=add'; ?>" class="btn btn-primary btn-head">Thêm</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="85">#</th>
                                        <th width="195">Tên danh mục (Tiếng Việt)</th>
                                        <th width="195">Tên danh mục (Tiếng Anh)</th>
                                        <th style="text-align: right">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                 if($cats){
                                    $index = 0;
                                    foreach ($cats as $key => $value) :
                                        $index++;
                                 ?>
                                    <tr>
                                        <td><?php echo $index ?></td>
                                        <td><?php echo $value['Category']['name_vi']; ?></td>
                                        <td><?php echo $value['Category']['name_en']; ?></td>
                                        <td align="right">
                                            
                                            <a href="<?php echo $this->base.'/admin/category?action=edit&id='.$value['Category']['id']; ?>" class="btn btn-primary">Sửa</a>
                                            <a href="<?php echo $this->base.'/admin/category?action=delete&id='.$value['Category']['id']; ?>" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger">Xóa</a>
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
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

