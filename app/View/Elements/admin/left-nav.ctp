 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo $this->base.'/admin/index'; ?>" <?php if($tab == 'index') echo 'class="active"'; ?> ><i class="fa fa-barcode fa-fw"></i> Sản phẩm</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tags fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Bếp</a>
                                </li>
                                <li>
                                    <a href="#">Phòng ngủ</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo $this->base.'/admin/contact'; ?>" <?php if($tab == 'contact') echo 'class="active"'; ?>><i class="fa fa-envelope fa-fw"></i> Tin nhắn</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->base.'/admin/banner'; ?>" <?php if($tab == 'banner') echo 'class="active"'; ?>><i class="fa fa-table fa-fw"></i> Banner</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->base.'/admin/users'; ?>" <?php if($tab == 'user') echo 'class="active"'; ?>><i class="fa fa-user fa-fw"></i> Quản lý user</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->base.'/admin/setting'; ?>" <?php if($tab == 'setting') echo 'class="active"'; ?>><i class="fa fa-gear fa-fw"></i> Thiết lập</a>
                        </li>
                    </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side <--></-->