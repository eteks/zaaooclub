<script>
    $(document).ready(function() {
    $("#contact_form").validate({
            rules: {
            name:"required",            
              email: {
                required: true,
                email: true
                },
             mobile:{
                minlength: 10,
                digits:true,
                required: true
                },
                message:"required"  
            },
            submitHandler: function( form ) 
            {  
                var pageURL = $(location).attr("href");
                //alert(pageURL);     
                $.ajax({
                    url : 'pages',
                    data : $('#contact_form').serialize(),
                    type: "POST",
                    success : function(data)
                    {                            
                        if(data)                           
                        {
                            $('#messalert').html('<p class="text-center text-success" >Mail Sent Successfully</p>');
                            $("#contact_form")[0].reset();
                        }
                        else
                        {
                            $('#messalert').html('<p class="text-center text-danger">Mail Sending Faile</p>');
                        }//$("#signupForm").hide('slow');
                    }
                })
                return false;
            }       
        }); 
}); //  end document.ready
</script>
<div class="container page_content">
        <div class="row">

                    <div class="wow fadeInUpBig" data-wow-offset="0" data-wow-delay="0.4s">

                            <h3 class="page_heading">Contact us</h3>

                                <div class="container">
                            <div class="row">
                                <div class="map">

                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3885.6129130372874!2d80.19690151491403!3d13.123690890756203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526462b61fc287%3A0xb6bf27ea1182a1a8!2s67%2C+Vivekananda+Nagar+Annex+2+Road%2C+Santhosh+Nagar%2C+Vivekananda+Nagar%2C+Lakshmipuram%2C+Chennai%2C+Tamil+Nadu+600099!5e0!3m2!1sen!2sin!4v1509194929498" allowfullscreen></iframe>
                                </div>
                            </div>
                            </div>
                            <div class="container">
                            <div class="row">
                                <div id="messalert"></div>
                                <div class="col-lg-6">
                                    <div class="recent"><h3 class="page_heading">Send us a message</h3>
                                    </div>      
                                    <form role="form" method="POST" id="contact_form">
                                        <div class="form-group">                                        
                                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                                            <input type="hidden" name="contact" value="1" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                        </div>

                                       <div class="form-group">                                        
                                            <input type="text" name="mobile" class="form-control" id="exampleInputMobile1" placeholder="Mobile No">
                                        </div>

                                        <div class="form-group">                                        
                                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email Id">
                                        </div>                                        
                                        <textarea class="form-control" rows="8" name="message"></textarea>
                                        <div class="text-right"><button type="submit" class="btn btn-default">Submit</button></div>
                                    </form>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="recent">
                                        <h3 class="page_heading">Get in touch with us</h3>
                                    </div>
                                    <div class="contact-area col-lg-6 col-sm-6">
                                        <h3>Office Address</h3>
                                        <h4>Address:</h4>No.7, Chandrasekharan Street,<br>Iyyanar Nagar, Pillaithottam<br>Puducherry – 605013<br>
                                        <h4>Telephone:</h4>0413 – 4300008</br>
                                        <h4>Mail:</h4>ushabalu.lic@gmail.com
                                    </div>   
                                    <div class="contact-area col-lg-6 col-sm-6">
                                         <h3>Residential Address</h3>
                                        <h4>Address:</h4>Plot No 67,Vanasakthi 2nd Street,<br> Vivekananda Nagar, Kolathur,<br> Chennai - 600099<br>
                                        <h4>Telephone:</h4>9042020434 / 044-26512356
                                        <h4>Mail:</h4>ushabalu.lic@gmail.com
                                    </div>                                      
                                </div>          
                            </div>
                            </div>
                    </div>
                
        </div>
    </div>