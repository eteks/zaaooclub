<div class="content-wrapper">
  <div class="container">           
    <div class="row">
      <div class="col-md-12" >
        <div class="panel panel-info">
          <div class="text-center">
            <h4 class="heading_form">USER LOGIN</h4>
          </div>
          <div class="panel-body">       
           <!--<form id="login" method="post" action="<?php //echo base_url(); ?>index.php/loger/process">-->       
            <form id="login" method="post" action="" class="login_form">     
              <div class="form-group inputWithIcon">
                <input type="text" placeholder="Username" name="username">
                <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
              </div>


              <div class="form-group inputWithIcon">
                <input type="password" placeholder="Password" name="password">
                <i class="fa fa-key fa-lg fa-fw" aria-hidden="true"></i>
              </div>
              <div class="check">
                <input type="checkbox" onchange="showHide(this.checked)" name="new_user"> New User
              </div>
              <div class="form-group"id="hiddenField" style="display: none;" >
                <input class="form-control"  type="password" name="otp" placeholder="Enter OTP" autocomplete="off" required />
              </div> 
               <div class="form-group login_btn_area">
                  <button type="submit" value="LogIn" class="btn btn-default form-control login_btn">LogIn</button>
               </div>
              <div id="log_res"></div>
           </form>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    function showHide(checked){
        if(checked==true)
            $("#hiddenField").fadeIn();
        else $("#hiddenField").fadeOut();
    }
</script>