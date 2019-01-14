
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
                <h2><i class="glyphicon glyphicon-edit"></i> Register User</h2>
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
                <div class="container-size">
 
  
<form role="form" method="POST" action="<?php echo base_url(); ?>saai" class="" name="edit_enduser_form" id="edit_enduser_form" enctype="multipart/form-data">

    <h4>Basic Details</h4>
      <div class="row">
    <div class="col-md-6">
      <div class="reg-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" placeholder="First name" id="first_name" name="first_name" value="<?php echo set_value('first_name');?>" /required>
                </div>
    </div>
    <div class="col-md-6">
      <div class="reg-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" placeholder="Enter last Name" name="last_name" value="<?php echo set_value('last_name');?>">
                </div>
    </div>
  </div>

        <div class="row">
    <div class="col-md-6">
      
                <div class="reg-group">
                  <label for="exampleInputEmail1">Date Of Birth</label>
                  <input type="text" class="form-control" id="user_dob" placeholder="Date of Birth" name="user_dob" value="<?php echo set_value('user_dob');?>">
                </div required>
    </div>
    <div class="col-md-6">
      <div class="radio_option"><label>Gender</label><br>
                  <label class="gender" >
                  <input type="radio" class="option-input radio_button" name="gender"  value="male" checked /><span> Male</span>
                  </label>
                  <label class="gender">
                  <input type="radio" class="option-input radio_button" name="gender"  value="female" /><span> Female</span>
                  </label>
                </div>
    </div>
  </div>

 
        <h4>Contact Details</h4>
      <div class="row">
    <div class="col-md-6">
       <div class="reg-group">
                          <label for="exampleInputEmail1">Phone Number</label>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter mobile number" name="user_mobile" value="<?php echo set_value('user_mobile');?>" required>
                        </div>
    </div>
    <div class="col-md-6">
      <div class="reg-group">
                          <label for="exampleInputEmail1">Email ID</label>
                        <input type="text" class="form-control" id="enduser_email" placeholder="Enter email id" name="user_email" value="<?php echo set_value('user_email');?>" required>
                        </div>
    </div>
  </div>

    <div class="row">
    <div class="col-md-6">
      <div class="reg-group">
                          <label for="last_name">Address Line 1</label>
                        <input type="text" class="form-control" id="address_line1" placeholder="Enter Address Line 1" name="address_line1" value="<?php echo set_value('address_line1');?>" required>
                          </div>
    </div>
    <div class="col-md-6">
     <div class="reg-group">
                          <label for="last_name">Address Line 2</label>
                        <input type="text" class="form-control" id="address_line2" placeholder="Enter Address Line 2" name="address_line2" value="<?php echo set_value('address_line2');?>" required>
                          </div>
    </div>
  </div>
    <div class="row">
    <div class="col-md-6">
      <div class="reg-group">
                          <label for="last_name">City</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" value="<?php echo set_value('city');?>" required>
                        </div>
    </div>
    <div class="col-md-6">
      <div class="reg-group">
                          <label>State</label>
                           
                          <input list="states" name="state" placeholder="State" class="form-control">
  
                        </div>
    </div>
  </div>

    <div class="row">
    <div class="col-md-6">
        <div class="reg-group">
                          <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="postal_code" placeholder="Enter Post Code" name="postal_code" value="<?php echo set_value('postal_code');?>"required>
                        </div>
    </div>
    <div class="col-md-6">
      <div class="reg-group">
                          <label>Country</label>
                           
                          <input list="states" name="country" placeholder="country" class="form-control">
  
                        </div>
    </div>
  </div>
 
        <h4>Details of ID Proof</h4>
        <div class="check">
          <div class="row">
    <div class="col-md-6">
      <label class="gender">

    <input class="option-input radio_button package_label" type="radio" name="id_proof"  value="aadhar" checked required />
    Aadhar Card
  </label>
  <label class="gender">
    <input class="option-input radio_button" type="radio" name="id_proof"  value="license" required />
    Driving License
  </label>
 
    </div>
    <div class="col-md-6">
       <label class="gender">
    <input class="option-input radio_button" type="radio" name="id_proof"  value="passport" required />
    Passport
  </label>
    <label class="gender">
    <input class="option-input radio_button" type="radio" name="id_proof"  value="ration_card" required />
    Ration Card
  </label>
    </div>
  </div>
    <div class="row">
    <div class="col-md-6">
       <label class="gender">
    <input class="option-input radio_button" type="radio" name="id_proof"  value="birth_certificate" required />
    Birth Certificate
  </label>
    </div></div>
              <div class="row">
    <div class="col-md-6">
      <div class="reg-group">
          <label>Upload ID Copy</label>
            <input type="file" name="image"/required>
          </div>
    </div>
   <div class="col"></div>
 </div>
    <div class="row">
    <div class="col-md-6">
      <div class="reg-group">
          <label for="aadhar_number">Aadhar Card Number</label>
        <input type="text" class="form-control" id="aadhar_number" placeholder="xxxx-xxxx-xxxx" name="aadhar_number" value="<?php echo set_value('aadhar_number');?>">
</div>
    </div> <div class="col-md-6"></div>
  </div>
    
  </div>
     
        <h4>Package Details</h4>
        <div class="check">
  <div class="row">
    <div class="col-md-6">
      <label class="label_fun">Type Of Package</label>
      <label class="gender">

    <input type="radio" name="package" onchange="showSouth(this.checked)" class="option-input radio_button" value="south"/>
    South India Tour Package
  </label>
  <label class="gender">
    <input type="radio" name="package" onchange="showNorth(this.checked)" class="option-input radio_button" value="north"/>
    North India Tour Package
  </label>
  <label class="gender">
    <input type="radio" name="package" onchange="showInter(this.checked)" class="option-input radio_button" value="inter"/>
    International Tour Package
  </label>
      
    </div>

    <div class="col"></div>
      
    </div>

    <div class="row">
    <div class="col-md-6">
       <div class="check"id="hiddenSouth" style="display: none;" >
<label class="label_fun">Mode of Transport</label>
 <label class="gender"><input type="radio" onchange="showSbus(this.checked)" class="option-input radio_button mot" name="mode_of_transport"  value="bus"> Bus</label>
 <label class="gender"><input type="radio" onchange="showSbus(this.checked)" class="option-input radio_button" name="south_transport"  value="Train">Train</label>
</div>
<div class="check"id="hiddenNorth" style="display: none;" >
<label class="label_fun">Mode of Transport</label>
 <label class="gender"><input type="radio" onchange="showNbus(this.checked)" class="option-input radio_button" name="mode_of_transport"  value="Flight"> Flight</label>
        
  <label class="gender"><input type="radio" onchange="showTrain(this.checked)" class="option-input radio_button" name="mode_of_transport"  value="Train">Train</label>
 </div>
<div class="check"id="hiddenInter" style="display: none;" >
<label class="label_fun">Mode of Transport</label>

   <label class="gender"><input type="radio" onchange="showFlight(this.checked)" class="option-input radio_button mot" name="mode_of_transport"  value="Flight"> Flight</label>
        
</div>

</div><div class="col-md-6"></div>
    </div>
  </div>
 
        <h4>Payment Details</h4>
 <div class="row">
    <div class="col-md-6">
      <div class="check"id="paymentSouth" style="display: none;" >
<label class="label_fun">Payment Option</label>  

------------------------------------
 <label class="gender"><input type="radio" class="option-input radio_button" onchange="showfullSouth(this.checked)" name="payment"  value="val1" checked> Full Rs.<span id="pSfP"></span></label>
  <label class="gender"><input type="radio" class="option-input radio_button" onchange="showemiSouth(this.checked)" name="payment"  value="val2" checked> EMI Rs.<span id="pSeP"></span></label>
</div>
<div class="check"id="paymentNorth1" style="display: none;" >
<label class="label_fun">Payment Option</label>
 <label class="gender"><input type="radio" class="option-input radio_button" onchange="showfullNorth1(this.checked)" name="payment"  value="option1"> Full Rs.<span id="pN1fP"></span></label>
  <label class="gender"><input type="radio" onchange="showemiNorth1(this.checked)" class="option-input radio_button" name="payment"  value="option2"> EMI Rs.<span id="pN1eP"></span></label>
        
   </div>
<div class="check"id="paymentNorth2" style="display: none;" >
<label class="label_fun">Payment Option</label>

   <label class="gender"><input type="radio" class="option-input radio_button" onchange="showfullNorth2(this.checked)" name="payment"  value="value1" checked> Full Rs.<span id="pN2fP"></span></label>
    <label class="gender"><input type="radio" onchange="showemiNorth2(this.checked)" class="option-input radio_button" name="payment"  value="value2" checked> EMI Rs.<span id="pN2eP"></span></label>
  </div>
  <div class="check"id="paymentInter" style="display: none;" >
<label class="label_fun">Payment Option</label>

   <label class="gender"><input type="radio" onchange="showfullInter(this.checked)" class="option-input radio_button" name="payment"  value="valu1" checked> Full Rs.<span id="pIfP"></span></label>
    <label class="gender"><input type="radio" onchange="showemiInter(this.checked)" class="option-input radio_button" name="payment"  value="valu2" checked> EMI Rs.<span id="pIeP"></span></label>
  </div>
    </div>
    <div class="col">
    </div>
  </div>
    <div class="group">    
                    <button type="submit" value="Upload Image" class="btn submit-btn btn-default">Submit</button>
                    </div>
</div>

        </div>
</div>
</form>
</div>




   
<script>
    $(document).ready(function(){
        $('#user_dob').datepicker({format: 'yyyy-mm-dd'})
         $('input[type=radio][name=package]').change(function() {
          $('.mot').prop('checked', false);
        });

        $("#pay-tab").click(function (e) {
          var dob = $('#user_dob').val();
          var today = new Date();
          var birthDate = new Date(dob);
          var age = today.getFullYear() - birthDate.getFullYear();
          var m = today.getMonth() - birthDate.getMonth();
          if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
              age--;
          }
          var packageValue = $("input[name='package']:checked").val();
          var packageNTransValue = $("input[name='north_transport']:checked").val();
          var nTransValue;
          if(packageNTransValue == "flight"){
            nTransValue = 1;
          }
          else{
            nTransValue = 2;
          }
          if(age >=3 && age <=10){
            var discValue;
            if(packageValue == "south"){
              discValue = parseInt(6000) - parseInt(6000 * 0.4);
              $("#pSfP").text(discValue);
              $("#pSeP").text(500);
            }else if(packageValue == "north"){
              discValue = parseInt(12000) - parseInt(12000 * 0.4);
              if(nTransValue == 1){
              $("#pN1fP").text(discValue);
              $("#pN1eP").text(2000);
            }else{
              $("#pN2fP").text(discValue);
              $("#pN2eP").text(1000);
            }
            }else{
              discValue = parseInt(60000) - parseInt(60000 * 0.25);
              $("#pIfP").text(discValue);
              $("#pIeP").text(5000);
            }
          }else if(packageValue == "south"){
            $("#pSfP").text(6000);
            $("#pSeP").text(500);
          }else if(packageValue == "north"){
            if(nTransValue == 1){
              $("#pN1fP").text(12000);
              $("#pN1eP").text(2000);
            }else{
              $("#pN2fP").text(12000);
              $("#pN2eP").text(1000);
            }
          }else{
            $("#pIfP").text(60000);
            $("#pIeP").text(5000);
          }
        });
    });
</script>
    <script src ="jquery.js"></script>
<script>
    function showSouth(checked){
        if(checked==true){
            $("#hiddenSouth").show();
            $("#hiddenNorth").hide();
            $("#hiddenInter").hide();
          }
        
    }
</script>
<script>
    function showNorth(checked){
        if(checked==true){
            $("#hiddenNorth").show();
            $("#hiddenSouth").hide();
            $("#hiddenInter").hide();
          }}
     
</script>
<script>
    function showInter(checked){
        if(checked==true)
          {  $("#hiddenInter").show();
        $("#hiddenNorth").hide();
        $("#hiddenSouth").hide();


}
}</script>
<script>
    function showSbus(checked){
        if(checked==true){
            $("#paymentSouth").show();
            $("#paymentNorth1").hide();
            $("#paymentNorth2").hide();
            $("#paymentInter").hide();
          }
        
    }
</script>
<script>
    function showNbus(checked){
        if(checked==true){
            $("#paymentSouth").hide();
            $("#paymentNorth1").show();
            $("#paymentNorth2").hide();
            $("#paymentInter").hide();
          }
        
    }
</script>
<script>
    function showTrain(checked){
        if(checked==true){
            $("#paymentSouth").hide();
            $("#paymentNorth1").hide();
            $("#paymentNorth2").show();
            $("#paymentInter").hide();
          }
        
    }
</script>
<script>
    function showFlight(checked){
        if(checked==true){
            $("#paymentSouth").hide();
            $("#paymentNorth1").hide();
            $("#paymentNorth2").hide();
            $("#paymentInter").show();
          }
        
    }
</script>
<script>
    function showfullSouth(checked){
        if(checked==true){
            $("#amount1").show();
            $("#amount2").hide();
            $("#amount3").hide();
            $("#amount4").hide();
              $("#amount5").hide();
            $("#amount6").hide();
              $("#amount7").hide();
            $("#amount8").hide();
          }
        
    }
</script>
<script>
    function showemiSouth(checked){
        if(checked==true){
            $("#amount1").hide();
            $("#amount2").show();
            $("#amount3").hide();
            $("#amount4").hide();
              $("#amount5").hide();
            $("#amount6").hide();
              $("#amount7").hide();
            $("#amount8").hide();
          }
        
    }
</script>
<script>
    function showfullNorth1(checked){
        if(checked==true){
          $("#amount1").hide();
            $("#amount2").hide();
            $("#amount3").show();
            $("#amount4").hide();
              $("#amount5").hide();
            $("#amount6").hide();
              $("#amount7").hide();
            $("#amount8").hide();
          }
        
    }
</script>
<script>
    function showemiNorth1(checked){
        if(checked==true){
          $("#amount1").hide();
            $("#amount2").hide();
            $("#amount3").hide();
            $("#amount4").show();
              $("#amount5").hide();
            $("#amount6").hide();
              $("#amount7").hide();
            $("#amount8").hide();
          }
        
    }
</script>
<script>
    function showfullNorth2(checked){
        if(checked==true){
          $("#amount1").hide();
            $("#amount2").hide();
            $("#amount3").hide();
            $("#amount4").hide();
              $("#amount5").show();
            $("#amount6").hide();
              $("#amount7").hide();
            $("#amount8").hide();
          }
        
    }
</script>

</script>
<script>
    function showemiNorth2(checked){
        if(checked==true){
          $("#amount1").hide();
            $("#amount2").hide();
            $("#amount3").hide();
            $("#amount4").hide();
              $("#amount5").hide();
            $("#amount6").show();
              $("#amount7").hide();
            $("#amount8").hide();
          }
        
    }
</script>
<script>
    function showfullInter(checked){
        if(checked==true){
          $("#amount1").hide();
            $("#amount2").hide();
            $("#amount3").hide();
            $("#amount4").hide();
              $("#amount5").hide();
            $("#amount6").hide();
              $("#amount7").show();
            $("#amount8").hide();
          }
        
    }
</script>
<script>
    function showemiInter(checked){
        if(checked==true){
          $("#amount1").hide();
            $("#amount2").hide();
            $("#amount3").hide();
            $("#amount4").hide();
              $("#amount5").hide();
            $("#amount6").hide();
              $("#amount7").hide();
            $("#amount8").show();
          }
        
    }
</script>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


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

