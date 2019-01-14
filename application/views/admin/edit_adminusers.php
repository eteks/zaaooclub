<?php if(!$this->input->is_ajax_request()){ ?>
<?php include "templates/header.php" ?>
        <!--/span-->
        <!-- left menu ends -->
<div class="ch-container">
    <div class="row footer_content"> 
        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Edit_Adminusers</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Adminusers</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
<?php } ?>
                <?php if (isset($error_message)){ 
                    echo "<p class='error_msg_reg alert alert-info'>".$error_message."</p>";
                }?>
                <?php //print_r($adminuser_data); ?>
                <form role="form" method="POST" action="<?php echo base_url(); ?>admin/users/edit_adminusers/<?php echo $adminuser_data['adminuser_id']; ?>" class="form_submit" name="edit_adminuser_form" id="edit_adminuser_form">
                 <div class="form-errors"></div>
                    <div class="form-group">
                        <label for="area_name">User Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="adminuser_name" placeholder="Enter User Name" name="adminuser_username" value="<?php if(!empty($adminuser_data['adminuser_username'])) echo $adminuser_data['adminuser_username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Password<span class="fill_symbol"> *</span></label>
                        <input type="password" class="form-control" id="adminuser_password" placeholder="Enter password" name="adminuser_password" value="<?php if(!empty($adminuser_data['adminuser_password'])) echo $adminuser_data['adminuser_password']; ?>">
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="adminuser_email" placeholder="Enter email id" name="adminuser_email" value="<?php if(!empty($adminuser_data['adminuser_email'])) echo $adminuser_data['adminuser_email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Mobile<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter mobile number" name="adminuser_mobile" value="<?php if(!empty($adminuser_data['adminuser_mobile'])) echo $adminuser_data['adminuser_mobile']; ?>">
                    </div>
                     <!-- <div class="control-group">
                        <label class="control-label" for="sel_c">Status</label>
                        <div class="controls">
                            <select name="city_id" id="sel_c" class="product-type-filter form-control city_act">
                                 <option selected hidden>Select</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="group">    
                    <button type="submit" class="btn submit-btn btn-default">Submit</button>
                    </div>
                </form>
<?php if(!$this->input->is_ajax_request()){ ?>
            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
<!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
</div>
<?php include "templates/footer.php" ?>
<?php } ?>
