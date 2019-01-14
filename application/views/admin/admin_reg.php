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
        <div class="container page_content saai_page ">
            <div class="row">
                <?php if (isset($error_message)){ 
                    echo "<p class='error_msg_reg alert alert-danger text-center'>".$error_message."</p>";
                }?>
                <?php ?>


     
   

<div class="container contact-form">
          <div class="contact-image">
            <img src="<?php echo base_url().'assets/'?>img/register.png" alt=""/>
        
            </div>
            <form method="post">
                <h3>Register User</h3>
                <h4>Basic Details</h4>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>First Name</label>
                            <input type="text" name="txtName" class="form-control" placeholder="First name" value="" />
                        </div>
                        <label>Date Of Birth</label>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Date Of Birth" value="" />
                        </div>
                      </div>
                 <div class="col-md-6">
                  <div class="form-group">
                          <label>Last Name</label>
                            <input type="text" name="txtName" class="form-control" placeholder="Last name" value="" />
                        </div>
                        <div class="radio_btn"><label>Gender</label><br>
                          <label>

    <input type="radio" class="option-input radio" name="example" checked />
    Male
  </label>
  <label>
    <input type="radio" class="option-input radio" name="example" />
    Female
  </label></div>
                      </div>
                    </div><br>


                     <h4>Contact Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Phone Number</label>
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number" value="" />
                        </div>
                           <div class="form-group">
                          <label>Address Line 1</label>
                            <input type="text" name="txtPhone" class="form-control" placeholder="Address line 1" value="" />
                          </div>
                              <div class="form-group">
                          <label>City</label>
                            <input type="text" name="txtPhone" class="form-control" placeholder="City" value="" />
                        </div>
                        <div class="form-group">
                          <label>Postal Code</label>
                            <input type="text" name="txtPhone" class="form-control" placeholder="Pin code Number" value="" />
                        </div>
                        
                       

                    </div>
                           <div class="col-md-6">
                        
                        <div class="form-group">
                          <label>Email ID</label>
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Email id" value="" />
                        </div>
                        <div class="form-group">
                          <label>Address Line 2</label>
                            <input type="text" name="txtPhone" class="form-control" placeholder="Address Line 2" value="" />
                          </div>
                              <div class="form-group">
                          <label>State</label>
                           
                          <input list="states" name="state" placeholder="State" class="form-control">
  <datalist id="states">
    <option value="Andaman and Nicobar Islands">
    <option value="Andhra Pradesh">
    <option value="Arunachal Pradesh">
    <option value="Assam">
    <option value="Bihar">
    <option value="Chandigarh">
    <option value="Chhattisgarh">
        <option value="Dadar and Nagar Haveli">
            <option value="Daman and Diu">
                <option value="Delhi">
        <option value="Goa">
            <option value="Gujarat">
            <option value="Haryana">
            <option value="Himachal Pradesh">
            <option value="Jammu and Kashmir">
            <option value="Jharkhand">
            <option value="Karnataka">
            <option value="Kerala">
                <option value="Lakshadweep">
            <option value="Madhya Pradesh">
            <option value="Maharashtra">
            <option value="Manipur">
            <option value="Meghalaya">
            <option value="Mizoram">
            <option value="Nagaland">
            <option value="Odisha">
                <option value="Pondicherry">
            <option value="Punjab">
            <option value="Rajasthan">
            <option value="Sikkim">
            <option value="Tamil Nadu">
            <option value="Tripura">
            <option value="Uttar Pradesh">
            <option value="Uttarakhand">
            <option value="West Bengal">
            
  </datalist>
                        </div>
                        <div class="form-group">
                          <label>Country</label>
                            <input list="countries" name="country" placeholder="country" class="form-control">
  <datalist id="countries">

    <option value="Afghanistan">
    <option value="Albania">
    <option value="Algeria">
    <option value="Andorra">
    <option value="Angola">
    <option value="Antigua and Barbuda">
    <option value="Argentina">
        <option value="Armenia">
            <option value="Australia">
                <option value="Austria">
        <option value="Azerbaijan">
            <option value="The Bahamas">
            <option value="Bahrain">
            <option value="Bangladesh">
            <option value="Barbados">
            <option value="Belarus">
            <option value="Belgium">
            <option value="Belize">
                <option value="Benin">
            <option value="Bhutan">
            <option value="Bolivia">
            <option value="Bosnia and Herzegovina">
            <option value="Botswana">
            <option value="Brazil">
                <option value="Brunei">
            <option value="Bulgaria">
            <option value="Burkina Faso">
            <option value="Burundi">
            <option value="Cabo Verde">
            <option value="Cambodia">
            <option value="Cameroon">
            <option value="Canada">
            <option value="Central African Republic">
            <option value="Chad">
    <option value="Chile">
    <option value="China">
    <option value="Colombia">
    <option value="Comoros">
    <option value="Congo">
    <option value="Costa Rica">
        <option value="Côte d’Ivoire">
            <option value="Croatia">
                <option value="Cuba">
        <option value="Cyprus">
            <option value="Czech Republic">
            <option value="Denmark">
            <option value="Djibouti">
            <option value="Dominica">
            <option value="Egypt">
    <option value="El Salvador">
    <option value="Equatorial Guinea">
    <option value="Eritrea">
    <option value="Estonia">
    <option value="Ethiopia">
    <option value="Fiji">
        <option value="Finland">
            <option value="France">
                <option value="Gabon">
        <option value="The Gambia">
            <option value="Georgia">
            <option value="Germany">
            <option value="Ghana">
            <option value="Greece">
            <option value="Grenada">
            <option value="Guatemala">
            <option value="Guinea">
                <option value="Guinea-Bissau">
            <option value="Guyana">
            <option value="Haiti">
            <option value="Honduras">
            <option value="Hungary">
            <option value="Iceland">
                <option value="India">
            <option value="Indonesia">
            <option value="Iran">
            <option value="Iraq">
            <option value="Ireland">
            <option value="Israel">
            <option value="Italy">
            <option value="Jamaica">
            <option value="Japan">
            <option value="Jordan">
                <option value="Kazakhstan">
            <option value="Kenya">
            <option value="Kiribati">
            <option value="Korea, North">
            <option value="Korea, South">
            <option value="Kosovo">
                <option value="Kuwait">
            <option value="Kyrgyzstan">
            <option value="Laos">
            <option value="Latvia">
            <option value="Lebanon">
            <option value="Lesotho">
            <option value="Liberia">
            <option value="Libya">
            <option value="Liechtenstein">
                <option value="Lithuania">
    <option value="Luxembourg">
    <option value="Macedonia">
    <option value="Madagascar">
    <option value="Malawi">
    <option value="Malaysia">
    <option value="Maldives">
        <option value="Mali">
            <option value="Malta">
                <option value="Marshall Islands">
        <option value="Mauritania">
            <option value="Mauritius">
            <option value="Mexico">
            <option value="Micronesia, Federated States of">
            <option value="Moldova">
            <option value="Monaco">
            <option value="Mongolia">
            <option value="Montenegro">
                <option value="Morocco">
            <option value="Mozambique">
            <option value="Myanmar">
            <option value="Namibia">
            <option value="Nauru">
            <option value="Nepal">
                <option value="Netherlands">
            <option value="New Zealand">
            <option value="Nicaragua">
            <option value="Niger">
            <option value="Nigeria">
            <option value="Norway">
            <option value="Oman">
            <option value="Pakistan">
            <option value="Palau">
  </datalist>

  
                        </div>

                        </div>
                    </div>
                    <h4>Details of ID Proof</h4>
                   
<div class="check">
  <div class="row">
    <div class="col-md-6">
  <label>
    <input type="checkbox" class="option-input checkbox" checked />
    Aadhar Card
  </label>
  <label>
    <input type="checkbox" class="option-input checkbox" />
    Driving License
  </label>
</div>
<div class="col-md-6">
  <label>
    <input type="checkbox" class="option-input checkbox" />
    Passport
  </label>
    <label>
    <input type="checkbox" class="option-input checkbox" />
    Ration Card
  </label>
</div>
</div></div>
<div class="row">
    
 <div class="col-md-6">

    <div class="form-group">
                          <label>Aadhar Card</label>
                            <input type="file"/>
                          </div>
                          <div class="form-group">
                          <label>Driving License</label>
                            <input type="file"/>
                          </div>

</div>
<div class="col-md-6">
<div class="form-group">
                          <label>Passport</label>
                            <input type="file"/>
                          </div>
                          <div class="form-group">
                          <label>Ration Card</label>
                            <input type="file"/>
                          </div>
</div>
</div>
 <h4>Package Details</h4>

<div class="row">
            <div class="col-md-12">
          <div class="check"><label>
    <input type="radio" class="option-input radio"/>
    South India Tour Package
  </label>
  <label>
    <input type="radio" class="option-input radio" />
    North India Tour Package
  </label>
  <label>
    <input type="radio" class="option-input radio" />
    International Tour Package
  </label></div></div></div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
                          <label>Mode of Transport</label>
                             <select>
                              <option value="bus">Bus</option>
  <option value="train">Train</option>
  <option value="flight">Flight</option>
  
</select> 
                          </div>
                          
    </div>

  <div class="col-md-12">
  <div class="radio_btn"><label>Payment Option</label>
                          <label>

    <input type="radio" class="option-input radio" name="example" checked />
    Full
  </label>
  <label>
    <input type="radio" class="option-input radio" name="example" />
    EMI
  </label></div>
 <h4>Verification</h4>
               <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Phone Number</label>
                            <input type="text" name="txtPhone" class="form-control" placeholder="Phone Number" value="" /></div>
                            <div class="form-group">
                    
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send OTP" />
                        </div>

                    </div>
                  
                  
                      <div class="col-md-6">
                      <div class="form-group">
                          <label>Aadhar Card Number</label>
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Aadhar Card Number" value="" /></div>
                            <div class="form-group">
                    
                            <input type="submit" name="btnSubmit" class="btnContact" value="Verify" />
                        </div>
                    </div>
                
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                   <div class="form-group">
                          <label>OTP</label>
                            <input type="text" name="txtPhone" class="form-control" placeholder="Enter OTP" value="" /></div>
                                <div class="form-group">
                    
                            <input type="submit" name="btnSubmit" class="btnContact" value="Verify" />
                        </div>
                      </div>
                    </div>

<div class="row">
  <div class="col-md-12">
    <div class="check">
      <label>
    <input type="checkbox" class="option-input checkbox"/>
    I Agree the Terms and Conditions
  </label>
  </div>
</div></div>
<div class="form-group">                
<input type="submit" name="btnSubmit" class="btnContact" value="Submit" />
                        </div>

 
</form></div></div></div>


<script>
    $(document).ready(function(){
        $('#user_dob').datepicker({format: 'yyyy-mm-dd'})
    });
</script>

<?php
}
?>
        