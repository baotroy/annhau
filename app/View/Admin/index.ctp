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
                        <a href="<?php echo $this->base.'/admin?action=add'; ?>" class="btn btn-primary btn-head">Thêm</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th width="35%">Tên sản phẩm</th>
                                        <th width="35%">Danh mục</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                            <?php
                            if($items){
                                $index =1;
                                foreach ($items as $key => $value) {
                            ?>
                                    <tr>
                                        <td><?php echo $index; $index++; ?></td>
                                        <td><?php echo $value['Product']['name_vi'].' - '.$value['Product']['name_en'];  ?></td>
                                        <td><?php echo $value['Category']['name_vi'].' - '.$value['SubCat']['name_vi'];  ?></td>
                                        <td align="right">
                                            <a href="<?php echo $this->base.'/admin?action=edit&id='.$value['Product']['id']; ?>" class="btn btn-primary">Sửa</a>
                                            <a onclick="return confirm('Bạn có chắc chắn xóa?');" href="<?php echo $this->base.'/admin?action=delete&id='.$value['Product']['id']; ?>" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                            <?php
                                }//foreach
                            }//if
                                 ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    <?php
                    if (count($items) > 0) :
                            echo $this->Paginator->counter(array('format' => __('')));?>   
                        <div class="col-xs-12" align="center">
                            <ul class="pagination">
                                <?php if ($this->Paginator->hasPrev()) { ?>
                                <?php echo $this->Paginator->prev('«', array('escape' => false, 'tag' => 'li'), null, array('escape' => false, 'class' => 'previous disabled', 'disabledTag' => 'a')); ?>
                                <?php } ?>
                                <?php echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1, 'ellipsis' => '<li><a>...</a></li>')); ?>

                                <?php if ($this->Paginator->hasNext()) { ?>
                                <?php echo $this->Paginator->next('»', array('escape' => false,'tag'=>'li'), null, array('escape' => false, 'class' => 'disabled', 'disabledTag' => 'a', )); ?>
                                <?php } ?>
                            </ul>
                        </div><!-- /col -->      
                    <?php endif; ?>   
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