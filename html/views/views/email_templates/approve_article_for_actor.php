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
							<td align=left height=30></td>
						</tr>
						<tr>
							<td align=left height=30 colspan=2>I trust this email finds you well. Thank you for expressing your interest in ATOM. We appreciate your enthusiasm and commitment to enhancing your profile within
our community.</td>
						</tr>
						<tr>
							<td align=left height=20></td>
						</tr>
						 <tr>
                                <td align=left height=30 colspan=2>Your Credentials are as follows</td>
                            </tr>
                            <!-- <tr>
                                <td align=left height=30 colspan=2><b>URL  :</b><?php echo site_url();?></td>
                            </tr> -->
                            <tr>
                                <td align=left height=30 colspan=2><b>Username  :</b> <?=$email?></td>
                            </tr>
                            <tr>
                                <td align=left height=30 colspan=2><b>Password  :</b><?=$password?></td>
                            </tr>
                            <tr>
							<td align=left height=30></td>
							</tr>
                            <tr>
                                <td align=left height=30 colspan="2">
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000; line-height: 17px; padding: 0px 0px 20px 0px; margin: 0px;">Gentle Reminder :</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000; line-height: 17px; padding: 0px 0px 20px 0px; margin: 0px;">Please be advised that unprofessional content may lead to rejection by production houses. Therefore, we encourage you to take this opportunity seriously and
present yourself in the best possible light.</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000; line-height: 17px; padding: 0px 0px 20px 0px; margin: 0px;">Should you have any questions or require further assistance in optimizing your profile, please don't hesitate to reach out.</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000; line-height: 17px; padding: 0px 0px 20px 0px; margin: 0px;">Thank you for your cooperation and understanding.</p>
                            </tr>
                            <tr>
                                <td align=left height=30colspan=2>Best Regards,</td>
                            </tr>
                            <tr>
                                <td align=left height=30colspan=2>ATOM Support Team</td>
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