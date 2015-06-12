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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="100">#</th>
                                        <th width="180">Tên</th>
                                        <th width="300">Email</th>
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
                                        <td><?php echo $value['Inquiry']['name']; ?></td>
                                        <td><?php echo $value['Inquiry']['email']; ?></td>
                                        <td><?php if($value['Inquiry']['read']) echo 'đã đọc'; else echo 'chưa đọc' ?></td>
                                        <td align="right">
                                            <a href="<?php echo $this->base.'/admin/contact?action=view&id='.$value['Inquiry']['id']; ?>" class="btn btn-primary">Xem</a>
                                            <a href="<?php echo $this->base.'/admin/contact?action=delete&id='.$value['Inquiry']['id']; ?>" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger">Xóa</a>
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
