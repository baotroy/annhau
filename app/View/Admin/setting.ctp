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
        <form class="form-horizontal" role="form" method="post">
        <div class="row">
            <?php echo $this->Session->flash(); ?>
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1default" data-toggle="tab">Tiếng Việt</a></li>
                    <li><a href="#tab2default" data-toggle="tab">Tiếng Anh</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">

                    <div class="tab-pane fade in active" id="tab1default">
                       
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email_1">Email:</label>
                                <div class="col-sm-10">
                                  <input type="email" name="email_1" class="form-control" id="email_1" maxlength="30" placeholder="Email" value="<?php echo @$params['email_1']; ?>">
                                </div>
                              </div>
                             <!--  <div class="form-group">
                                <label class="control-label col-sm-2" for="email_2">Email:</label>
                                <div class="col-sm-10">
                                  <input type="email" name="email_2" class="form-control" id="email_2" maxlength="30" placeholder="Email" value="<?php echo @$params['email_2']; ?>">
                                </div>
                              </div> -->
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="address_1_vi">Địa chỉ:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="address_1_vi" class="form-control" maxlength="100" id="address_1_vi" placeholder="Địa chỉ 1" value="<?php echo @$params['address_1_vi']; ?>">
                                </div>
                              </div>
                             <!--  <div class="form-group">
                                <label class="control-label col-sm-2" for="address_2_vi">Địa chỉ 2:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="address_2_vi" class="form-control" maxlength="100" id="address_2_vi" placeholder="Địa chỉ 2" value="<?php echo @$params['address_2_vi']; ?>">
                                </div>
                              </div> -->

                              <div class="form-group">
                                <label class="control-label col-sm-2" for="tel_1">Điện thoại:</label>
                                <div class="col-sm-10"> 
                                  <input type="text" name="tel_1" class="form-control" maxlength="20" id="tel_1" placeholder="Điện thoại" value="<?php echo @$params['tel_1']; ?>">
                                </div>
                              </div>
                              <!-- <div class="form-group">
                                <label class="control-label col-sm-2" for="tel_2">Điện thoại 2:</label>
                                <div class="col-sm-10"> 
                                  <input type="text" name="tel_2" class="form-control" maxlength="20" id="tel_2" placeholder="Điện thoại" value="<?php echo @$params['tel_2']; ?>">
                                </div>
                              </div> -->
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="fax_1">Fax:</label>
                                <div class="col-sm-10"> 
                                  <input type="text" name="fax_1" class="form-control" maxlength="20" id="fax_1" placeholder="Fax" value="<?php echo @$params['fax_1']; ?>">
                                </div>
                              </div>
                              <!-- <div class="form-group">
                                <label class="control-label col-sm-2" for="fax_2">Fax 2:</label>
                                <div class="col-sm-10"> 
                                  <input type="text" name="fax_2" class="form-control" maxlength="20" id="fax_2" placeholder="Fax" value="<?php echo @$params['fax_2']; ?>" >
                                </div>
                              </div> -->
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="contact">Thông tin:</label>
                                <div class="col-sm-10"> 
                                  <textarea name="contact_info_vi" cols="30" rows="5" class="form-control" id="contact"><?php echo @$params['contact_info_vi']; ?></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="map">Vị trí bản đồ:</label>
                                <div class="col-sm-10"> 
                                  <input type="text" name="map" class="form-control" id="map" maxlength="30" placeholder="Tọa độ" value="<?php echo @$params['map_lat'].', '.@$params['map_long']; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="description_vi">Mô tả website:</label>
                                <div class="col-sm-10"> 
                                  <textarea name="description_vi" cols="30" rows="5" class="form-control" id="description_vi"><?php echo @$params['description_vi']; ?></textarea>
                                </div>
                              </div>
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        
                    </div>
                    <div class="tab-pane fade" id="tab2default">
                        
                          <div class="form-group">
                                <label class="control-label col-sm-2" for="address_1_en">Địa chỉ:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="address_1_en" class="form-control" maxlength="100" id="address_1_en" placeholder="Địa chỉ 1" value="<?php echo @$params['address_1_en']; ?>">
                                </div>
                          </div>
                         <!--  <div class="form-group">
                                <label class="control-label col-sm-2" for="address_2_en">Địa chỉ 2:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="address_2_en" class="form-control"  maxlength="100"id="address_2_en" placeholder="Địa chỉ 2" value="<?php echo @$params['address_2_en']; ?>">
                                </div>
                          </div> -->
                        <div class="form-group">
                                <label class="control-label col-sm-2" for="contact_en">Thông tin:</label>
                                <div class="col-sm-10"> 
                                  <textarea name="contact_info_en" cols="30" rows="5" class="form-control" id="contact_en"><?php echo @$params['contact_info_en']; ?></textarea>
                                </div>
                          </div>
                          <div class="form-group">
                                <label class="control-label col-sm-2" for="description_en">Mô tả website:</label>
                                <div class="col-sm-10"> 
                                  <textarea name="description_en" cols="30" rows="5" class="form-control" id="description_en"><?php echo @$params['description_en']; ?></textarea>
                                </div>
                              </div>
                          <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    
                    </div>      
                          
                </div>
            </div>

        </div>
     </form>         
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->