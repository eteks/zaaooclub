<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Saai Holidays</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">
    <!-- The styles -->
    <!-- Main css for theme -->
    <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/css/charisma-app.css" rel="stylesheet">
    <!-- Main corousal css for theme -->
    <link href="<?php echo base_url(); ?>assets/admin/css/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/css/slick-theme.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>assets/admin/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/admin/css/style.css' rel='stylesheet'>
    
    <link href="<?php echo base_url();?>assets/admin/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/css/simpleFilePreview.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>assets/admin/css/multi-select.css' rel='stylesheet'>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.multi-select.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.quicksearch.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/img/favicon.ico">
</head>
<body>
<!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url()."/admin" ?>"> <!-- <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/> -->
            <span>Saai Holidays</span></a>
            <?php 
            $user_session = $this->session->userdata("logged_in");
            if (!empty($user_session)){?>
                <!-- user dropdown starts -->
                <div class="btn-group pull-right">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> 
                        <?php 
                        $session_data = $this->session->userdata('logged_in');
                        echo $session_data['username']; ?></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()."admin/users/edit_adminusers/".$session_data['userid'] ?>">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>admin/logout">Logout</a></li>
                    </ul>
                </div>
                <!-- user dropdown ends -->
            <?php } ?>

            <ul class="collapse navbar-collapse nav navbar-nav top-menu visit_site">
                <li><a href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
               <!--  <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li> -->
            </ul>
        </div>
    </div>
    <!-- topbar ends -->
    <?php 
    //echo $_SERVER['REQUEST_URI']."<br>";
    //echo $this->config->item('admin_base_url')."<br>"; 
    ?>
    <?php 
    $user_session = $this->session->userdata("logged_in");
    if (!empty($user_session))
    {
    ?>
    <!-- left menu starts -->
    <div class="row">
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">
                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">My Dashboard</li>
                        <li><a class="ajax-link" href="<?php echo base_url(); ?>admin/dashboard"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li> 
                       <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-user"></i><span> Users</span></a>
                            <ul class="nav nav-pills nav-stacked sub-menu">
                                 <li><a href="<?php echo base_url(); ?>admin/users/adminusers">Admin Users</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/users/primary_users">Primary users</a></li>
                               <!--<li><a href="<?php echo base_url(); ?>admin/users/end_users">End users</a></li>-->
                            </ul>
                        </li>
                </div>
            </div>
        </div>
        <!--/span-->
<!-- left menu ends -->
<?php } ?>
