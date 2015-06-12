<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo $this->base.'/admin' ?>">Administrator</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  (<?php echo $num_inq ?>)<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                    <?php if($num_inq){
                        foreach ($latestInq as $key => $value) {
                    ?>
                        <li>
                            <a href="<?php echo $this->base.'/admin/contact?action=view&id='.$value['Inquiry']['id']; ?>">
                                <div>
                                    <strong><?php echo $value['Inquiry']['name'] ?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo $this->Text->date_diff($value['Inquiry']['created']) ?></em>
                                    </span>
                                </div>
                                <div><?php echo nl2br($value['Inquiry']['content']) ?></div>
                            </a>
                        </li>
                        <?php if(count($latestInq)>1): ?>
                        <li class="divider"></li>
                        <?php endif;?>
                        
                    <?php
                        }//end foreach
                    if(count($latestInq) < $num_inq): ?>
                        <!-- <li class="divider"></li> -->
                        <li>
                            <a class="text-center" href="<?php echo $this->base.'/admin/contact'; ?>">
                                <strong>Xem tất cả</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        <?php endif; 
                    }else{?>
                        <li><strong>Không có mục nào.</strong></li>
                    <?php } ?>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
              
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <?php echo $admin['username'] ;?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->base.'/admin/users'; ?>"><i class="fa fa-user fa-fw"></i> Quản lý user</a>
                        </li>
                        <li><a href="<?php echo $this->base.'/admin/setting'; ?>"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->base.'/admin/logout'; ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>