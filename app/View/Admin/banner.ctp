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
