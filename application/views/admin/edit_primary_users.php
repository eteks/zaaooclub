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
            <a href="#">Users</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Add/Edit users</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="<?php echo base_url(); ?>admin/users/primary_users" class="btn  btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
<?php } ?>
                <?php if (isset($error_message)){ 
                    echo "<p class='error_msg_reg alert alert-info'>".$error_message."</p>";
                }?>
                <?php ?>
                <form role="form" method="POST" action="<?php echo base_url(); ?>admin/users/edit_primary_users/<?php echo $enduser_data['user_id'];?>" class="form_submit" name="edit_enduser_form" id="edit_enduser_form">
                 <div class="form-errors"></div>      

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" value="<?php if(!empty($enduser_data['first_name'])) echo $enduser_data['first_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Mobile</label>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter mobile number" name="user_mobile" value="<?php if(!empty($enduser_data['user_mobile'])) echo $enduser_data['user_mobile']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="enduser_email" placeholder="Enter email id" name="user_email" value="<?php if(!empty($enduser_data['user_email'])) echo $enduser_data['user_email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Date Of Birth</label>
                        <input type="text" class="form-control" id="user_dob" placeholder="Enter dob" name="user_dob" value="<?php if(!empty($enduser_data['user_dob'])) echo $enduser_data['user_dob']; ?>">
                    </div>
                
                    <div class="control-group">                     
                        <label for="sel_a">Package</label>
                        <select name="user_package" id="sel_package" class="product-type-filter form-control city_act" >
                               <option value="" >Select Package</option>
                               <option value="1" <?php if($enduser_data['user_package'] ==1) echo "selected"; ?>>Saai Infant</option>
                               <option value="2" <?php if($enduser_data['user_package'] ==2) echo "selected"; ?>>Saai Kids</option>
                               <option value="3" <?php if($enduser_data['user_package'] ==3) echo "selected"; ?>>Saai Children</option>
                               <option value="4" <?php if($enduser_data['user_package'] ==4) echo "selected"; ?>>Saai Youth</option>
                               <option value="5" <?php if($enduser_data['user_package'] ==5) echo "selected"; ?>>Saai Parent</option>
                               <option value="6" <?php if($enduser_data['user_package'] == 6 ) echo "selected"; ?>>Saai Grand Parent</option>
                        </select>
                    </div>


                    <div class="group">    
                    <button type="submit" class="btn submit-btn btn-default">Submit</button>
                    </div>
                </form>
<script>
    $(document).ready(function(){
        $('#user_dob').datepicker({format: 'yyyy-mm-dd'})
    });
</script>
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

