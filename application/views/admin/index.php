<?php include "templates/header.php" ?>
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
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>
<!-- <div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="000 New users.." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Users</div>
            <div>000</div>
             <span class="notification">6</span>
        </a>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="000 New site visits." class="well top-block" href="#">
            <i class="glyphicon glyphicon-star green"></i>

            <div>Site Visits</div>
            <div>000</div>
             <span class="notification green">4</span> 
        </a>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="$000 New orders." class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>
            <div>Orders</div>
            <div>$0000</div>
             <span class="notification yellow">$34</span> 
        </a>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="000000 New revenues." class="well top-block" href="#">
            <i class="glyphicon glyphicon glyphicon-gbp red"></i>
            <div>Revenue</div>
            <div>000000</div>
            -- <span class="notification red">12</span> --
        </a>
    </div>
</div> -->
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><!-- <i class="glyphicon glyphicon-info-sign"></i> -->Introduction</h2>
                <!-- <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div> -->
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12">
                   <div class="user-admin">
                       <i class="glyphicon glyphicon-user"></i>
                       <?php 
                        // print_r($this->session->userdata('logged_in'));
                        $session_data = $this->session->userdata('logged_in');
                        ?>
                       <p class="title"><strong>Welcome</strong> <?php echo $session_data['username']."!" ?> <br> You have logged in administrator</p>
                   </div>
                </div>
                <div class="col-md-12">
                    <section class="regular slider">
                            <div>
                              <img src="<?php echo base_url(); ?>assets/img/package/package_1.jpg">
                            </div>
                            <div>
                              <img src="<?php echo base_url(); ?>assets/img/package/package_2.jpg">
                            </div>
                            <div>
                              <img src="<?php echo base_url(); ?>assets/img/package/package_3.jpg">
                            </div>
                            <div>
                              <img src="<?php echo base_url(); ?>assets/img/package/package_4.jpg">
                            </div>
                            <div>
                              <img src="<?php echo base_url(); ?>assets/img/package/package_5.jpg">
                            </div>
                            <div>
                              <img src="<?php echo base_url(); ?>assets/img/package/package_6.jpg">
                            </div>
                    </section>
           </div>
        </div>
    </div>
</div>
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
<hr>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>
</div><!--/.fluid-container-->
<script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
      });
    });
  </script>
<?php include "templates/footer.php" ?>
