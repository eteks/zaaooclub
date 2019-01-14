<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oozaaoo | Club</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url()."assets/"; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()."assets/"; ?>css/responsive-slider.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/font-awesome.min.css">
    <link href="<?php echo base_url()."assets/"; ?>css/style.css" rel="stylesheet">    
    <link href="<?php echo base_url()."assets/"; ?>css/magnific-popup.css" rel="stylesheet">    
    <link href="<?php echo base_url()."assets/"; ?>admin/css/datepicker.css" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script type="text/javascript" href="js/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>js/jquery.validate.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/img/favicon.ico">
    <script>
            $(document).ready(function() {
            $("#login").validate({
                    rules: {
                    username:"required",
                    password:"required"
                    },
                    submitHandler: function( form ) 
                    {  
                        var pageURL = $(location).attr("href");
                        //alert(pageURL);     
                        $.ajax({
                            url : 'login/process',
                            data : $('#login').serialize(),
                            type: "POST",
                            success : function(data)
                            {                            
                                if (data == "yes")                           
                                {
                                    window.location = 'saai';
                                }
                                else
                                {
                                    $('#log_res').html(data);
                                }//$("#signupForm").hide('slow');
                            }
                        })
                        return false;
                    }       
                }); 
        }); //  end document.ready
    </script>
  </head>
  <body>
    <header>
        <div class="container-size">
        <nav class="navbar navbar-expand-lg">
   <a href="http://www.oozaaoo.com./index.php"><img src="<?php echo base_url().'assets/'?>img/logo.png" alt=""/></a>


  <div class=" navbar-collapse justify-content-end nav-color">

    <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="http://www.oozaaoo.com./index.php"><i class="fa fa-home  fa-fw" style="font-size:18px;" aria-hidden="true"></i> HOME</a></li> 
                        <?php
                        if (isset($this->session->userdata['log_in'])) 
                        {
                        ?>        
                            <li class="nav-item" id="logoutBtn">  <a class="nav-link" href="<?php echo base_url(); ?>login/logout" ><i class="fa fa-sign-out  fa-fw" style="font-size:18px;" aria-hidden="true"></i> LOGOUT</a></li>     
                                      
                        <?php
                        }
                        ?>   
                </ul>
  </div>
</nav>
</div>
       
</header>



