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
                        <a href="<?php echo $this->base.'/admin/testimonial?action=add'; ?>" class="btn btn-primary btn-head">Thêm</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th width="10%">TIêu đề</th>
                                        <th width="35%">Mô tả</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                            <?php
                            if($testimonial){
                                $index =1;
                                foreach ($testimonial as $key => $value) {
                            ?>
                                    <tr>
                                        <td><?php echo $index; $index++; ?></td>
                                        <td><?php echo $value['Testimonial']['name_vi'];  ?></td>
                                        <td><?php echo $value['Testimonial']['description_vi'];  ?></td>
                                        <td align="right">
                                            <a href="<?php echo $this->base.'/admin/testimonial?action=edit&id='.$value['Testimonial']['id']; ?>" class="btn btn-primary">Sửa</a>
                                            <a onclick="return confirm('Bạn có chắc chắn xóa?');" href="<?php echo $this->base.'/admin/testimonial?action=delete&id='.$value['Testimonial']['id']; ?>" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                            <?php
                                }//foreach
                            }else{
                                ?>
                                    <tr><td colspan="4">Chưa có...</td></tr>
                                <?php
                            }
                                 ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /. col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->