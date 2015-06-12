<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
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
                <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1default" data-toggle="tab">Tiếng Việt</a></li>
                    <li><a href="#tab2default" data-toggle="tab">Tiếng Anh</a></li>
                </ul>
            </div>
    
            <div class="panel-body">
            <?php echo $this->Form->create('form', array('type'=>'post')); ?>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1default">
                         <?php 
                        echo $this->Form->textarea('about_vi', array('class'=>'ckeditor', 'value'=> @$item['about_vi']));
                        
                         ?>
                         <script type="text/javascript">
                        CKEDITOR.replace( 'textarea_id', {
                        toolbar: [[ 'Bold', 'Italic','Underline','Subscript','Superscript'],],
                        width: '700',
                        height: '600',
                        });
                        </script>
                    </div>
                    <div class="tab-pane fade" id="tab2default">
                         <?php 
                     
                        echo $this->Form->textarea('about_en', array('class'=>'ckeditor', 'value'=> @$item['about_en']));
                         ?>
                         <script type="text/javascript">
                        CKEDITOR.replace( 'textarea_id', {
                        toolbar: [[ 'Bold', 'Italic','Underline','Subscript','Superscript'],],
                        width: '700',
                        height: '600',
                        });
                        </script>
                    </div>                    
                </div>
            <?php    echo $this->Form->end(); ?>
                <!-- /.panel -->
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
