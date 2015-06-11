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
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <?php echo $this->Session->flash(); ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table tbl-non">
                                <tr>
                                    <td width="150">Tên:</td>
                                    <td><?php echo $item['Inquiry']['name']; ?></td>
                                </tr>
                                <tr>
                                    <td width="150">Email:</td>
                                    <td><?php echo $item['Inquiry']['email']; ?></td>
                                </tr>
                                <tr>
                                    <td width="150">Điện thoại:</td>
                                    <td><?php echo $item['Inquiry']['tel']; ?></td>
                                </tr>
                                <tr>
                                    <td width="150">Nội dung:</td>
                                    <td><?php echo nl2br($item['Inquiry']['content']); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><a href="<?php echo $this->base.'/admin/contact' ?>" class="btn btn-primary">Quay lại</a></td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
