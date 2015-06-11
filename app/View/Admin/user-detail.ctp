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
                        <form method="post">
                            <table class="table tbl-non">
                                <tr>
                                    <td width="150">Username<span class="required">*</span>:</td>
                                    <td>
                                        <input size="50" class="form-control <?php if(@$this->validationErrors['Admin']['username']) echo 'error'?>" style="width: 400px" type="text" <?php if(@$mode=='add') echo 'name="username"'?> maxlength="20" value="<?php echo @$item['Admin']['username'] ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Password<?php if(@$mode=='add') echo '<span class="required">*</span>'?>:</td>
                                    <td>
                                        <input size="50" class="form-control <?php if(@$this->validationErrors['Admin']['password']) echo 'error'?>" style="width: 400px" type="password" name="password" maxlength="20"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Họ<span class="required">*</span>:</td>
                                    <td>
                                        <input size="50" class="form-control <?php if(@$this->validationErrors['Admin']['lastname']) echo 'error'?>" style="width: 400px" type="text" name="lastname" maxlength="50" value="<?php echo @$item['Admin']['lastname'] ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150">Tên<span class="required">*</span>:</td>
                                    <td><input size="50" class="form-control <?php if(@$this->validationErrors['Admin']['firstname']) echo 'error'?>" style="width: 400px" type="text" name="firstname" maxlength="50" value="<?php echo @$item['Admin']['firstname'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td width="150">Email:</td>
                                    <td><input size="50" class="form-control <?php if(@$this->validationErrors['Admin']['email']) echo 'error'?>" style="width: 400px" type="text" name="email" maxlength="30" value="<?php echo @$item['Admin']['email'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td width="150">Tình trạng:</td>
                                    <td><label style="font-weight: normal"><input type="checkbox" name="active" <?php if(@$item['Admin']['active'] == 1) echo 'checked'; ?> /> hoạt động</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="<?php echo $this->base.'/admin/contact' ?>" class="btn btn-primary">Quay lại</a></td>
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
