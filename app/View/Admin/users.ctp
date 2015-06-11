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
                    	<div>
                            <a href="<?php echo $this->base.'/admin/users?action=add'; ?>" class="btn btn-primary btn-head">Thêm</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="85">#</th>
                                        <th width="195">ID</th>
                                        <th width="260">Họ tên</th>
                                        <th width="190">Email</th>
                                        <th width="200">Tình trạng</th>
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
                                        <td><?php echo $value['Admin']['username']; ?></td>
                                        <td><?php echo $value['Admin']['lastname'].' '.$value['Admin']['firstname']; ?></td>
                                        <td><?php echo $value['Admin']['email']; ?></td>
                                        <td><?php if($value['Admin']['active']) echo 'đang hoạt động'; else echo 'không hoạt động' ?></td>
                                        <td align="right">
                                            <a href="<?php echo $this->base.'/admin/users?action=edit&id='.$value['Admin']['id']; ?>" class="btn btn-primary">Sửa</a>
                                            <a href="<?php echo $this->base.'/admin/users?action=delete&id='.$value['Admin']['id']; ?>" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger">Xóa</a>
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
                        <?php
                if (count($items) > 0) :
                    echo $this->Paginator->counter(array(
                        'format' => __('')
                    ));
                    ?>    
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
                </div><!-- /row -->
                    <?php if ($this->Paginator->hasNext() || $this->Paginator->hasPrev()) { ?>
                    <hr class="thin" />
                <?php } ?>
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
