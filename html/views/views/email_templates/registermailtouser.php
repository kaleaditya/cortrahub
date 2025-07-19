<table cellpadding='0' cellspacing='0' width='598px' style='border:1px solid #253f87;'>
	<tr>
		<td style='border-top:1px solid #000000;'><img src='<?php echo site_url('assets/images/email_top.jpg');?>'></td>
	</tr>
	<tr>
		<td style=' min-height:500px; padding:10px;'>
			<table cellpadding='0' cellspacing='0' border=0 width='100%' align='center' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
				<tr align=left>
				<td>
				<table cellpadding='0' cellspacing='0' border=0 width='100%' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
						<tr>
							<td align=left height=30 colspan=2><b>Dear <?=ucwords($_POST['name'])?></b></td>
						</tr>
						<tr>
							<td align=left height=30 colspan="2">You have registered successfully on our website. So now you can Sing In.</td>
						</tr>
						<tr>
							<td align=left colspan="2" height=30><b>Please check below Credentials for Sign In </b></td>
						</tr>
						<tr>
							<td align=left height=30 width="100"><b>Username :</b></td>
							<td align=left><?=$_POST['email']?></td>
						</tr>
						<tr>
							<td align=left height=30><b>Password :</b></td>
							<td align=left><?=$_POST['password']?></td>
						</tr>
						<tr>
							<td align=left height=30 colspan=2>Please do not share your password with anyone.</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
		</table>
		</td>
	</tr><tr>
		<td style='background: #fff none repeat scroll 0 0; border-top:1px solid #000; line-height: 16px;  padding: 10px; color:#000; font-family:Arial; font-size:12px; text-align:center;'>
		Copyright &copy; <?=date('Y')?> <?=$_POST['footer_V'];?>
		</td>
	</tr>
	
</table>