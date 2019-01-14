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
                <a href="#">Primary Users </a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> -->Users</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    
    <div class="box-content">
    <p class='error_msg_del alert alert-info'></p>
        <a class="btn btn-success" id="add" href="<?php echo base_url(); ?>admin/users/add_primary_users">
        <i class="glyphicon glyphicon-edit icon-white"></i>
        Add
        </a>
    <input type="hidden" class="table_name" value="saai_users">
    <input type="hidden" class="field_name" value="user_id">
    <input type="hidden" class="action" value="<?php echo base_url(); ?>admin/delete">

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive scroll">
    <thead>
    <tr>
	<th class="product">User Name</th>
	<th class="product">Email</th>
	<th class="product_small">Date of birth</th>
	<th class="product_small">mobile</th>
    <th class="product_small">Package - Id</th>
    <th class="product_small">Count</th>
	<th class="product_small">Status</th>
	<th class="product_small">Created Date</th>
	<!-- <th class="product_small">Actions</th> -->
</tr>
   </thead>
<tbody>
    <?php foreach ($endusers_list as $endusr): ?>
        <tr>
            <td><?php echo $endusr["first_name"] ?></td>
            <td class="center"><?php echo $endusr["user_email"] ?></td>
            <td class="center"><?php echo date("d/m/Y", strtotime($endusr["user_dob"])); ?></td>
            <td class="center"><?php echo $endusr["user_mobile"] ?></td>
            <td class="center"><?php echo $endusr["package"] ?></td>
            <td class="center"><?php echo $endusr["users_count"] ?></td>
            <td class="center"><span class="<?php if($endusr["user_status"] ==1 ){ ?>label-success<?php } ?> label label-default"><?php if($endusr["user_status"] ==1 )echo "Active";else echo "InActive"; ?></span></td>
            <td class="center"><?php echo date("d/m/Y", strtotime($endusr["user_createddate"])); ?></td>
           <!--  <td class="center">
                <a class="btn btn-info" href="<?php echo base_url(); ?>admin/users/edit_primary_users/<?php echo $endusr["user_id"] ?>">
                    <i class="glyphicon glyphicon-edit icon-white"></i>
                    Edit
                </a>
                <a class="btn btn-danger delete" href="#myModal1" data-toggle="modal" data-id="<?php echo $endusr["user_id"] ?>" title="Delete">
                    <i class="glyphicon glyphicon-trash icon-white"></i>
                    Delete
                </a>
            </td> -->
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        	<div class="modal-content">
        		<div class="modal-body delete_message_style">
        			<input type="hidden" name="delete" id="vId" value=""/>
        			<button type="button" class="close popup_tx" data-dismiss="modal" aria-hidden="true">
        				&times;
        			</button>
        			<center class="popup_tx">
        				<h5>Are you sure you want to delete this item? </h5>
        			</center>
        		</div>
        		<div id="delete_btn" class="modal-footer footer_model_button" >
        			<a name="action" class="btn btn-danger popup_btn yes_btn_act" id="popup_btn1"
                    value="Delete">Yes</a>
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