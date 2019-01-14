<?php include "templates/header.php" ?>
<div class="ch-container">
    <div class="row footer_content">
	     <div class="row">
	        <div class="col-md-12 center login-header">
	            <h2>Welcome to Admin</h2>
	        </div>
	        <!--/span-->
	    </div><!--/row-->
    <div class="row">
        <div class="well col-md-5 center login-box">
            <!-- <div class="alert alert-info">
                Please login with your Username and Password.
            </div> -->
            <?php if (isset($error_message)){ 
                echo "<p class='error_msg_reg alert alert-info'>".$error_message."</p>";
            }?>
            <form role="form" method="POST" action="<?php echo base_url(); ?>admin" name="login_form" id="login_form">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user users-icons"></i></span>
                        <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock users-icons"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="clearfix"></div>

                    <!-- <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                    </div> -->
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary login-btn">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->
<?php include "templates/footer.php" ?>



