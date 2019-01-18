  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <?php
if (isset($this->session->userdata['log_in'])) 
{        
  
?>   
<style>
.lane-parent p
{
  padding:10px;
  margin:0 auto 20px auto;
  vertical-align:top;
  background: #ddd;
  font-weight:600;
  width:100px;
  border-radius: 10px;
}
.lane-child
{
  padding:10px;
  margin:10px;
  vertical-align:top;
  background: #ddd;
  display:inline-block;
  font-weight:600;
  border-radius: 10px;
}
</style>

        <div class="container">
                <div class="contents">
                       <div class="lane-parent">
                        <p>My Link</p>
                        <?php
                          foreach($reg_user as $user)
                          {
                         ?>

                         <div class="lane-child">
                            <?php echo $user['first_name'] ;?>
                            (<?php  echo $user['unique_id']; ?>)                            
                         </div>  

                        <?php    
                          }         
                        ?>
                      </div>
                   


                    </div>
                </div>


<!------Package details----->

<div class="container-size">
      <h3 class="double-underline heading3" style="font-size: 24px;">Packages</h3>
      <div class="row space">
        <div class="col-sm-4" data-toggle="modal" data-target="#southPackage">
          <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="package_details">
              <h5>South India Tour Packages</h5>
              <i class="fa fa-bus" style="font-size:48px"></i>
            </div>
        </div>
      </div>
      
      <div class="col-sm-4" data-toggle="modal" data-target="#northPackage">
        <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.4s">
          <div class="package_details">
            <h5>North India Tour Packages</h5>
            <i class="fa fa-train" style="font-size:48px"></i>
          </div>
        </div>
      </div>
      
      <div class="col-sm-4" data-toggle="modal" data-target="#interPackage">
        <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.4s">
          <div class="package_details">
            <h5>International Tour Packages</h5>
            <i class="fa fa-plane" style="font-size:48px"></i>
          </div>
        </div>
      </div>
    </div>
</div>
<!--Modal---->

<div class="modal fade modal_bg" id="southPackage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title heading3" id="exampleModalLongTitle" style="padding-bottom:20px">South India Tour Packages</h3>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center days">2 NIGHT 3 DAYS</h5>
        <div class="row">
          <div class="col-lg-6 column2">
             <div class="image-area pull-left align-middle">
              <img src="<?php echo base_url()."assets/img/"; ?>img1.jpg" alt=""/>
           </div>
          </div>
          <div class="col-lg-6 column2 list">
            <h5 class="destination">Destinations</h5>
            <ul style="list-style-type: square;">
              <li> Munnar and Cochin</li>
              <li> Mysore and Coorg</li>
              <li> Yercaud and Yelagiri</li>
              <li> Kodai and Madurai</li>
              <li> Madurai and Rameshwaram</li>
              <li> Chennai and Mahabalipuram</li>
              <li> Chennai and Pondy</li>
              <li> Hyderabad and Ramoji Film City</li>
              <li> Wayanad and Calicut</li>
            </ul>

      </div>
    </div>
  </div>
</div></div></div>

<div class="modal fade modal_bg" id="northPackage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="head-model heading3" id="exampleModalLongTitle">North India Tour Packages</h3>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center days">5 NIGHT 6 DAYS</h5>
        <div class="row">
          <div class="col-lg-6 column2">
             <div class="image-area pull-left align-middle">
              <img src="<?php echo base_url()."assets/img/"; ?>img2.jpg" alt=""/>
           </div>
          </div>
          <div class="col-lg-6 column2 list">
            <h5 class="destination">Destinations</h5>
            <ul style="list-style-type: square;">
              <li> Shimla, Chandigard</li>
              <li> Darjeeling and Gangtok</li>
              <li> Kashmir and House Boat</li>
              <li> Delhi, Agra, Jaipur</li>
              <li> Allahabad, Varanasi, Gaya</li>
              <li> Delhi, Haridwar, Rishikesh</li>
              <li> Mumbai, Ajanta Ellora, Shiridi</li>
              <li> Gughati, Shillong, Cherrapunji</li>
              <li> Delhi, Mussoorie, Nainital</li>
            </ul>

      </div>
    </div>
  </div>
</div></div></div>
<div class="modal fade modal_bg" id="interPackage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="head-model heading3" id="exampleModalLongTitle">International Tour Packages</h3>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center days">5 NIGHT 6 DAYS</h5>
        <div class="row">
          <div class="col-lg-6 column2">
             <div class="image-area pull-left align-middle">
              <img src="<?php echo base_url()."assets/img/"; ?>img3.jpg" alt=""/>
           </div>
          </div>
          <div class="col-lg-6 column2 list">
            <h5 class="destination">Destinations</h5>
            <ul style="list-style-type: square;">
              <li> Singapore and Malaysia</li>
              <li> Srilanka</li>
              <li> Malaysia and Lankawi</li>
              <li> Cruise Package</li>
              <li> Gombodia</li>
              <li> Vietnam</li>
              <li> Phuket and Bangkok</li>
              <li> Indonesia Bali</li>
              <li> Singapore and Bintan Island</li>
            </ul>

      </div>
    </div>
  </div>
</div></div></div>
<div class="container-size">
  <h3 class="double-underline heading3" style="font-size: 24px;">Register User</h3>
  <div class="tab-bg">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">Basic Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Contact Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#step7" role="tab" aria-controls="step7" aria-selected="false">Nominee Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">ID Proofs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#step4" role="tab" aria-controls="step4" aria-selected="false">Package</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pay-tab" data-toggle="tab" href="#step5" role="tab" aria-controls="step5" aria-selected="false">Payment</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#step6" role="tab" aria-controls="step6" aria-selected="false">Summary</a>
  </li>
</ul>
<form role="form" method="POST" action="<?php echo base_url(); ?>saai" class="" name="edit_enduser_form" id="edit_enduser_form" enctype="multipart/form-data">
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="home-tab">
    <h3 class="heading3">Basic Details</h3>
      <div class="row">
    <div class="col">
      <div class="reg-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" placeholder="First name" id="first_name" name="first_name" value="<?php echo set_value('first_name');?>" /required>
                </div>
    </div>
    <div class="col">
      <div class="reg-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" placeholder="Enter last Name" name="last_name" value="<?php echo set_value('last_name');?>">
                </div>
    </div>
  </div>

        <div class="row">
    <div class="col">
      
                <div class="reg-group">
                  <label for="exampleInputEmail1">Date Of Birth</label>
                  <input type="text" class="form-control" id="user_dob" placeholder="Date of Birth" name="user_dob" value="<?php echo set_value('user_dob');?>">
                </div required>
    </div>
    <div class="col">
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

  </div>
  <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="profile-tab">
        <h3 class="heading3">Contact Details</h3>
      <div class="row">
    <div class="col">
       <div class="reg-group">
                          <label for="exampleInputEmail1">Phone Number</label>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter mobile number" name="user_mobile" value="<?php echo set_value('user_mobile');?>" required>
                        </div>
    </div>
    <div class="col">
      <div class="reg-group">
                          <label for="exampleInputEmail1">Email ID</label>
                        <input type="text" class="form-control" id="enduser_email" placeholder="Enter email id" name="user_email" value="<?php echo set_value('user_email');?>" required>
                        </div>
    </div>
  </div>

    <div class="row">
    <div class="col">
      <div class="reg-group">
                          <label for="last_name">Address Line 1</label>
                        <input type="text" class="form-control" id="address_line1" placeholder="Enter Address Line 1" name="address_line1" value="<?php echo set_value('address_line1');?>" required>
                          </div>
    </div>
    <div class="col">
     <div class="reg-group">
                          <label for="last_name">Address Line 2</label>
                        <input type="text" class="form-control" id="address_line2" placeholder="Enter Address Line 2" name="address_line2" value="<?php echo set_value('address_line2');?>" required>
                          </div>
    </div>
  </div>
    <div class="row">
    <div class="col">
      <div class="reg-group">
                          <label for="last_name">City</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" value="<?php echo set_value('city');?>" required>
                        </div>
    </div>
    <div class="col">
      <div class="reg-group">
                          <label>State</label>
                           
                          <input list="states" id="state" name="state" placeholder="State" class="form-control">
  
                        </div>
    </div>
  </div>

    <div class="row">
    <div class="col">
        <div class="reg-group">
                          <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="postal_code" placeholder="Enter Post Code" name="postal_code" value="<?php echo set_value('postal_code');?>"required>
                        </div>
    </div>
    <div class="col">
      <div class="reg-group">
                          <label>Country</label>
                            <input list="countries" id="country" name="country" placeholder="country" class="form-control">
 
  
                        </div>

    </div>
  </div>
  </div>
  <div class="tab-pane fade" id="step7" role="tabpanel" aria-labelledby="Nominee-tab">
        <h3 class="heading3">Nominee Details</h3>
      <div class="row">
        <div class="col">
      <div class="reg-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" id="first_name" placeholder="First name" name="nominee_firstname">
                </div>
    </div>
    <div class="col">
      <div class="reg-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" placeholder="Enter last Name" name="nominee_lastname">
                </div>
    </div>
    </div>

    <div class="row">
    <div class="col">
      <div class="reg-group">
                  <input type="checkbox" class="form-control" id="sameaddress_status" placeholder="" name="sameaddress_status" value="" style="width:100px;vertical-align: middle;display: inline-block;">
                          <label for="last_name" style="vertical-align: middle;"">Same address</label>
                        </div>
    </div>
  </div>
    <div class="row">
    <div class="col">
       <div class="reg-group">
                          <label for="exampleInputEmail1">Phone Number</label>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter mobile number" name="nominee_mobilenumber">
                        </div>
    </div>
    <div class="col">
      <div class="reg-group">
                          <label for="exampleInputEmail1">Email ID</label>
                        <input type="text" class="form-control" id="enduser_email" placeholder="Enter email id" name="nominee_email">
                        </div>
    </div>
  </div>

    <div class="row">
    <div class="col">
      <div class="reg-group">
                          <label for="last_name">Address Line 1</label>
                        <input type="text" class="form-control" id="nominee_address_line1" placeholder="Enter Address Line 1" name="nominee_address_line1" value="<?php echo set_value('address_line1');?>" required>
                          </div>
    </div>
    <div class="col">
     <div class="reg-group">
                          <label for="last_name">Address Line 2</label>
                        <input type="text" class="form-control" id="nominee_address_line2" placeholder="Enter Address Line 2" name="nominee_address_line2" value="<?php echo set_value('address_line2');?>" required>
                          </div>
    </div>
  </div>
    <div class="row">
    <div class="col">
      <div class="reg-group">
                          <label for="last_name">City</label>
                        <input type="text" class="form-control" id="nominee_city" placeholder="Enter city" name="nominee_city" value="<?php echo set_value('city');?>" required>
                        </div>
    </div>
    <div class="col">
      <div class="reg-group">
                          <label>State</label>
                           
                          <input list="states" id="nominee_state" name="nominee_state" placeholder="State" class="form-control">
  
                        </div>
    </div>
  </div>

    <div class="row">
    <div class="col">
        <div class="reg-group">
                          <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="nominee_postal_code" placeholder="Enter Post Code" name="nominee_postal_code" value="<?php echo set_value('postal_code');?>"required>
                        </div>
    </div>
    <div class="col">
      <div class="reg-group">
                          <label>Country</label>
                            <input list="countries" id="nominee_country" name="nominee_country" placeholder="country" class="form-control">
 
  
                        </div>

    </div>
  </div>
  </div>
  <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="profile-tab">
        <h3 class="heading3">Details of ID Proof</h3>
        <div class="check">
          <div class="row">
    <div class="col">
      <label class="gender">

    <input class="option-input radio_button" type="radio" name="id_proof"  value="aadhar" checked required />
    Aadhar Card
  </label>
  <label class="gender">
    <input class="option-input radio_button" type="radio" name="id_proof"  value="license" required />
    Driving License
  </label>
 
    </div>
    <div class="col">
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
    <div class="col">
       <label class="gender">
    <input class="option-input radio_button" type="radio" name="id_proof"  value="birth_certificate" required />
    Birth Certificate
  </label>
    </div></div>
              <div class="row">
    <div class="col">
      <div class="reg-group">
          <label>Upload ID Copy</label>
            <input type="file" name="image"/ required>
          </div>
    </div>
   <div class="col"></div>
 </div>
    <div class="row">
    <div class="col">
      <div class="reg-group">
          <label for="aadhar_number">Aadhar Card Number</label>
        <input type="text" class="form-control" id="aadhar_number" placeholder="xxxx-xxxx-xxxx" name="aadhar_number" value="<?php echo set_value('aadhar_number');?>">
</div>
    </div> <div class="col"></div>
  </div>
    
  </div>
      </div>

<div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="profile-tab">
        <h3 class="heading3">Package Details</h3>
        <div class="check">
  <div class="row">
    <div class="col">
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
    <div class="col">
      <div class="check"id="hiddenSouth" style="display: none;" >
<label class="label_fun">Mode of Transport</label>
 <label class="gender"><input type="radio" onchange="showSbus(this.checked)" class="option-input radio_button mot" name="mode_of_transport"  value="bus"> Bus</label>
 <label class="gender"><input type="radio" onchange="showSbus(this.checked)" class="option-input radio_button" name="mode_of_transport"  value="Train">Train</label>
</div>
<div class="check"id="hiddenNorth" style="display: none;" >
<label class="label_fun">Mode of Transport</label>
 <label class="gender"><input type="radio" onchange="showNbus(this.checked)" class="option-input radio_button north_transport" name="mode_of_transport"  value="Flight"> Flight</label>
        
  <label class="gender"><input type="radio" onchange="showTrain(this.checked)" class="option-input radio_button north_transport" name="mode_of_transport"  value="Train">Train</label>
 </div>
<div class="check"id="hiddenInter" style="display: none;" >
<label class="label_fun">Mode of Transport</label>

   <label class="gender"><input type="radio" onchange="showFlight(this.checked)" class="option-input radio_button mot" name="mode_of_transport"  value="Flight"> Flight</label>
        
</div>

</div><div class="col"></div>
    </div>
  </div>
  </div>



   <div class="tab-pane fade" id="step5" role="tabpanel" aria-labelledby="profile-tab">
        <h3 class="heading3">Payment Details</h3>
  <div class="row">
    <div class="col">
      <div class="check"id="paymentSouth" style="display: none;" >
<label class="label_fun">Payment Option</label>  

------------------------------------
<label class="gender"><input type="radio" class="option-input radio_button cPV" id="pSfPV" onchange="showfullSouth(this.checked)" name="payment" checked> Full Rs.<span id="pSfP"></span></label>
  <label class="gender"><input type="radio" class="option-input radio_button cPV" id="pSePV" onchange="showemiSouth(this.checked)" name="payment" checked> EMI Rs.<span id="pSeP"></span></label>
</div>
<div class="check"id="paymentNorth1" style="display: none;" >
<label class="label_fun">Payment Option</label>
 <label class="gender"><input type="radio" class="option-input radio_button cPV" id="pN1fPV" onchange="showfullNorth1(this.checked)" name="payment"> Full Rs.<span id="pN1fP"></span></label>
  <label class="gender"><input type="radio" onchange="showemiNorth1(this.checked)" class="option-input radio_button cPV" id="pN1ePV" name="payment"> EMI Rs.<span id="pN1eP"></span></label>
        
   </div>
<div class="check"id="paymentNorth2" style="display: none;" >
<label class="label_fun">Payment Option</label>

  <label class="gender"><input type="radio" class="option-input radio_button cPV" id="pN2fPV" onchange="showfullNorth2(this.checked)" name="payment" checked> Full Rs.<span id="pN2fP"></span></label>
    <label class="gender"><input type="radio" onchange="showemiNorth2(this.checked)" id="pN2ePV" class="option-input radio_button cPV" name="payment" checked> EMI Rs.<span id="pN2eP"></span></label>
  </div>
  <div class="check"id="paymentInter" style="display: none;" >
<label class="label_fun">Payment Option</label>

 <label class="gender"><input type="radio" onchange="showfullInter(this.checked)" class="option-input radio_button cPV" id="pIfPV" name="payment" checked> Full Rs.<span id="pIfP"></span></label>
    <label class="gender"><input type="radio" onchange="showemiInter(this.checked)" class="option-input radio_button cPV" id="pIePV" name="payment" checked> EMI Rs.<span id="pIeP"></span></label>
  </div>
    </div>
    <div class="col">
    </div>
  </div>
 
    <div class="group">    
                    <button type="submit" class="btn submit-btn btn-default">Submit</button>
                    </div>
</div>
 <div class="tab-pane fade" id="step6" role="tabpanel" aria-labelledby="profile-tab">
        <h3 class="heading3">Summary</h3>
        <div class="table-responsive">          
          <table class="table">
          <thead></thead>
          <tbody>
              <tr><td>&#x25C8; Number of Login under My Account</td><td>100</td></tr>
              <tr><td>&#x25C8; Total Amount </td><td>50,00,000</td></tr>
              <tr><td>&#x25C8; Actual Amount</td><td>10,00,000</td></tr>
              <tr><td>&#x25C8; Balance Amount</td><td>40,00,000</td></tr>
              <tr><td>&#x25C8; Total South Indian Packages</td><td>600000</td></tr>
              <tr><td>&#x25C8; Total North Indian Packages</td><td>1200000</td></tr>
              <tr><td>&#x25C8; Total International Packages</td><td>3200000</td></tr>
   
            </tbody>
            </table>
            </div>
    </div>
</div>
</form>
</div>
<script>
    $(document).ready(function(){
        $('#user_dob').datepicker({format: 'yyyy-mm-dd'});

        $('input[type=radio][name=package]').change(function() {
          $('.mot').prop('checked', false);
          //$(".cPV").val('');
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
          var packageNTransValue = $("input:radio.north_transport:checked").val();
          var nTransValue;
          if(packageNTransValue == "Flight"){
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
              $("#pSfPV").val(discValue);
              $("#pSeP").text(500);
              $("#pSePV").val(500);
            }else if(packageValue == "north"){
              discValue = parseInt(12000) - parseInt(12000 * 0.4);
              if(nTransValue == 1){
              $("#pN1fP").text(discValue);
              $("#pN1fPV").val(discValue);
              $("#pN1eP").text(2000);
              $("#pN1ePV").val(2000);
            }else{
              $("#pN2fP").text(discValue);
              $("#pN2fPV").val(discValue);
              $("#pN2eP").text(1000);
              $("#pN2ePV").val(1000);
            }
            }else{
              discValue = parseInt(60000) - parseInt(60000 * 0.25);
              $("#pIfP").text(discValue);
              $("#pIfPV").val(discValue);
              $("#pIeP").text(5000);
              $("#pIePV").val(5000);
            }
          }else if(packageValue == "south"){
            $("#pSfP").text(6000);
            $("#pSfPV").val(6000);
            $("#pSeP").text(500);
            $("#pSePV").val(500);
          }else if(packageValue == "north"){
            if(nTransValue == 1){
              $("#pN1fP").text(12000);
              $("#pN1fPV").val(12000);
              $("#pN1eP").text(2000);
              $("#pN1ePV").val(2000);
            }else{
              $("#pN2fP").text(12000);
              $("#pN2fPV").val(12000);
              $("#pN2eP").text(1000);
              $("#pN2ePV").val(1000);
            }
          }else{
            $("#pIfP").text(60000);
            $("#pIfPV").val(60000);
            $("#pIeP").text(5000);
            $("#pIePV").val(5000);
          }
        });
        $("#sameaddress_status").change(function (e) {
          if($(this).is(':checked') == true){
            $('#nominee_address_line1').val($('#address_line1').val());
            $('#nominee_address_line2').val($('#address_line2').val());
            $('#nominee_city').val($('#city').val());
            $('#nominee_state').val($('#state').val());
            $('#nominee_postal_code').val($('#postal_code').val());
            $('#nominee_country').val($('#country').val());
          }
          else{
            $('#nominee_address_line1').val('');
            $('#nominee_address_line2').val('');
            $('#nominee_city').val('');
            $('#nominee_state').val('');
            $('#nominee_postal_code').val('');
            $('#nominee_country').val('');
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

<?php if (isset($error_message)){ 
                    echo "<p class='error_msg_reg alert alert-danger text-center'>".$error_message."</p>";
                }?>
                <?php ?>
<?php
}
?>
        