<table cellpadding='0' cellspacing='0' width='598px' style='border:1px solid #253f87;'>
	<tr>
		<td style='border-top:1px solid #000000;'><img src='<?php echo site_url('assets/images/email_top.jpg');?>'></td>
	</tr>
	<tr>
		<td style='min-height:500px; padding:10px;'>
			<table cellpadding='0' cellspacing='0' border=0 width='100%' align='center' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
				<tr align=left>
				<td>
				<table cellpadding='0' cellspacing='0' border=0 width='100%' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
						<tr>
							<td align=left height=30><b>Dear <?=$name?></b></td>
						</tr>
						<tr>
							<td align=left height=30>Your request is rejected for below reason</td>
						</tr>
						<tr>
							<td align=left><?=$reason?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
		</table>
		</td>
	</tr><tr>
		<td style='background: #fff none repeat scroll 0 0; border-top:1px solid #000; line-height: 16px;  padding: 10px; color:#000; font-family:Arial; font-size:12px; text-align:center;'>
		Copyright &copy; <?=date('Y')?> ATOM Directory, All Rights Reserved.
		</td>
	</tr>
	
</table>