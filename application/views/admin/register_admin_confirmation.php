<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Oozaaoo Club Email-Template</title>

<style type="text/css">
	.ReadMsgBody {width: 100%; background-color: #ffffff;}
	.ExternalClass {width: 100%; background-color: #ffffff;}
	body	 {width: 100%; background-color: #ffffff; margin:0; padding:0; -webkit-font-smoothing: antialiased;font-family: Georgia, Times, serif}
	table {border-collapse: collapse;}

	@media only screen and (max-width: 640px)  {
					body[yahoo] .deviceWidth {min-width:440px!important;max-width:440px!important; padding:0;}
					body[yahoo] .center {text-align: center!important;}
			}

	@media only screen and (max-width: 479px) {
					body[yahoo] .deviceWidth {min-width:280px!important;max-width:280px!important; padding:0;}
					body[yahoo] .center {text-align: center!important;}
			}

</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family: Georgia, Times, serif">

<!-- Wrapper -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td width="100%" valign="top" bgcolor="#f0f0f0" style="padding-top:20px">

			<!-- Start Header-->
			<table width="580" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth" style="margin:0 auto;">
				<tr>
					<td width="100%" bgcolor="#4fbfa8">

                            <!-- Logo -->
                            <table border="0" cellpadding="0" cellspacing="0" align="left" class="deviceWidth">
                                <tr>
                                    <td style="padding:0px 20px" class="center">
                                    	<p style="font-family: Roboto; font-size:20px; color: #fff;">Oozaaoo Club</p>
                                    </td>
                                </tr>
                            </table><!-- End Logo -->
                    </td>
				</tr>
			</table><!-- End Header -->

			<!-- One Column -->
			<table width="580"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#ffffff" style="margin:0 auto;box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">
				   <tr>
                    <td colspan="2" style="font-size: 20px; color: #000; font-weight: normal; text-align: center; font-family: Roboto, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px" bgcolor="#fff">
                    <div>A new User Registered With Oozaaoo Club on <?php echo date("d/m/Y", strtotime($user_createddate)); ?></div>
					<div>Package Info: <?php echo $package ?></div>	
                    </td>
                   </tr>
                   <tr>
                    <td colspan="2" style="font-size: 16px;min-width:564px;max-width:564px;min-height: 100px !important; color: #000; font-weight: normal; text-align: center; font-family: Roboto, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px" bgcolor="#fff">
						Details of the user.
                    </td>
                   </tr>
                   <tr>
	                    <td style="font-size: 14px; color: #000; font-weight: normal; text-align: right; font-family: Roboto, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px;width: 50%;" bgcolor="#fff">
							Name
	                    </td>
	                    <td style="font-size: 14px; color: #000; font-weight: normal; text-align: left; font-family: Roboto, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px;width: 50%;" bgcolor="#fff">
							: <?php echo $first_name; ?>
	                    </td>                  
                   </tr>
                   <tr>
	                    <td style="font-size: 14px; color: #000; font-weight: normal; text-align: right; font-family: Roboto, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px;width: 50%;" bgcolor="#fff">
							Email
	                    </td>
	                    <td style="font-size: 14px; color: #000; font-weight: normal; text-align: left; font-family: Roboto, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px;width: 50%;" bgcolor="#fff">
							: <?php echo $user_email; ?>
	                    </td>                  
                   </tr>
                   <tr>
						<td style="font-size: 14px; color: #000; font-weight: normal; text-align: right; font-family: Roboto, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px;width: 50%;" bgcolor="#fff">
						Phone
						</td>
						<td style="font-size: 14px; color: #000; font-weight: normal; text-align: left; font-family: Roboto, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px;width: 50%;" bgcolor="#fff">
						: <?php echo $user_mobile; ?>
						</td>
                   </tr>
                   <tr>
						<td style="font-size: 14px; color: #000; font-weight: normal; text-align: right; font-family: Roboto, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px;width: 50%;" bgcolor="#fff">
						Username
						</td>
						<td style="font-size: 14px; color: #000; font-weight: normal; text-align: left; font-family: Roboto, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px;width: 50%;" bgcolor="#fff">
						: <?php echo $result; ?>
						</td>
                   </tr>
           </table><!-- End One Column -->             
<div style="height:15px;margin:0 auto;">&nbsp;</div><!-- spacer -->
<div style="height:0px;margin:0 auto;">&nbsp;</div><!-- spacer -->
			

		</td>
	</tr>
</table> <!-- End Wrapper -->
<div style="display:none; white-space:nowrap; font:15px courier; color:#ffffff;">
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
</div>
</body>
</html>
