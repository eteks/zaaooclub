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
                <a href="#">Admin Users </a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> -->Admin Users</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
  <div class="box-content">
       <!--  <a class="btn btn-success" id="add" href="<?php echo base_url(); ?>admin/users/add_adminusers">
        <i class="glyphicon glyphicon-edit icon-white"></i>
        Add
        </a> -->
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive scroll">
    <thead>
    <tr>
    <th class="product">User Name</th>
       <th class="product">Email</th>
     <th class="product_small">Mobile</th>
     <th class="product_small">Is SuperUser</th> 
    <th class="product_small">Status</th>
     <th class="product_small">Created Date</th>
     <th class="product_small">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($adminusers_list as $usr): ?>
        <tr>
            <td><?php echo $usr["adminuser_username"] ?></td>
            <td class="center"><?php echo $usr["adminuser_email"] ?></td>
            <td class="center"><?php echo $usr["adminuser_mobile"] ?></td>
            <td class="center">
            <?php 
                if( $usr['adminuser_is_superuser'] == 1) 
                    echo "Yes";
                else
                    echo "No";
            ?>
            </td>
            <td class="center"><span class="<?php if($usr["adminuser_status"] ==1 ){ ?>label-success<?php } ?> label label-default"><?php if($usr["adminuser_status"] ==1 )echo "Active";else echo "InActive"; ?></span></td>
            <td class="center"><?php echo date("d/m/Y", strtotime($usr["adminuser_create_date"])); ?></td>
            <td class="center">             
                    <a class="btn btn-info" href="<?php echo base_url(); ?>admin/users/edit_adminusers/<?php echo $usr["adminuser_id"] ?>">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Edit
                    </a>
                <?php if($usr['adminuser_is_superuser'] == 1 ) { ?>
                    <span class="restrict">
                    <a class="btn btn-danger" title="Delete">
                        <i class="glyphicon glyphicon-trash icon-white"><div class="restrict_tooltip">Delete not possible.</div></i>
                        Delete
                    </a>
                    </span>
                <?php } else { ?>
                    <a class="btn btn-danger" href="#myModal1" data-toggle="modal" id="delete">
                        <i class="glyphicon glyphicon-trash icon-white"></i>
                        Delete
                <?php } ?>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->
    <script type="text/javascript" >
		$(document).on("click", ".delete", function () {
		var myId = $(this).data('id');
		$(".modal-body #vId").val( myId );
		$("#del_link").prop("href", "users.php?delete="+myId);
		});
	</script>
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body delete_message_style">
					<input type="hidden" name="delete" id="vId" value=""/>
						<button type="button" class="close popup_tx" data-dismiss="modal" aria-hidden="true">&times;</button>
						<center class="popup_tx">
							<h5>Are you sure you want to delete this item? </h5>
						</center>
				</div>
				<div id="delete_btn" class="modal-footer footer_model_button" >
					<a name="action" id="del_link" class="btn btn-danger popup_btn" id="popup_btn1" href=""  value="Delete">Yes</a>						
					<button type="button" class="btn btn-info popup_btn" id="popup_btn" data-dismiss="modal">No</button>
				</div>
    </div><!--/row-->
        </div>
    </div>
    </div><!--/.fluid-container-->
    </div>
    </div>
    </div>
<?php include "templates/footer.php" ?>