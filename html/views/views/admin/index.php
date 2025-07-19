<?php $this->load->view('admin/includes/header');?>
<script type="text/javascript">
	$().ready(function() 
	{
		$("#form1").validate();
	});
</script>
<script type="text/javascript">
	$(document).ready(function() 
	{
		$("#username").focus();
	});
</script>
	<?	
	$name_value="";
	$pass_value="";
	$chk_value="";

	if(isset($_COOKIE['cookchk']) && ($_COOKIE['cookchk']) == "yes")
	{
		$name_value=($_COOKIE['cookname']);
		$pass_value=($_COOKIE['cookpass']);
		$chk_value=($_COOKIE['cookchk']);
	} ?>
	<div id="pageWrapper">
		<div class="adminContainer">
			<div id="adminHeader">
				<div id="logo">
					<img id="logo" class="logo" src="<? echo site_url('assets/admin/images/logo.png');?>" width="" height="" />
				</div> 
				<div class="clear"> </div>
			</div>
			<div class="subNav2">
				<ul>
					<li style="font-size: 11px; background-image: none; margin: 4px 0 0 0;">Log In to <?=ADMIN_MENUHEADER_SITENAME?> Content Management System</li>
				</ul>
			</div>
			<div id="midArea">
				<div id="midAreaTop">
					<span id="midAreaRight"></span>
					<span id="midAreaLeft"></span>
				</div>
				<div id="midAreaCont">
					<div id="Div1">
						<div style="background-color: #f1f1f1;">
							<strong style="background-color: #f1f1f1; font-size: 12px;">Log In with your credentials</strong><br>
							<?if ($this->session->flashdata('error'))
							{
								echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
							}
							if ($this->session->flashdata('message'))
							{
								echo "<div class='failure'>".$this->session->flashdata('message')."</div>";
							} ?>
							<?php echo form_open_multipart('admin','name="form1" id="form1" enctype="multipart/form-data"');?>
								<table id="login1" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;">
									<tr>
										<td>
											<table border="0" cellspacing="0" cellpadding="0" style="font-size: 12px;" width="100%">
												<tr>
													<td colspan="2">
														<?if(isset($warning))
														{
															echo $warning;
														}?>
													</td>
												</tr>
												<tr><td>&nbsp;</td></tr>
												<tr>
													<td width="120" valign="middle" height="30"> User Name :</td>
													<td width="350" align="left">
														<?
															$udata = array(
																'name'=>'username',
																'id'=>'username',
																'value'=>$name_value,
																'placeholder'=>'Username',
																'class'=>'required',
																'size'=>25,
																'autocomplete'=>'off');
															echo form_input($udata);
														?>
													</td>
												</tr>
												<tr><td>&nbsp;</td></tr>
												<tr>
													<td valign="middle" height="30"> Password :</td>
													<td align="left" width="350">
														<? 
															$pdata = array(
																'name'=>'password',
																'id'=>'password',
																'value'=>$pass_value,
																'placeholder'=>'Password',
																'class'=>'required',
																'size'=>25);
															echo form_password($pdata);
														?>	
													</td>
												</tr>
												<tr><td>&nbsp;</td></tr>
												<tr>
													<td>&nbsp;</td>
														<td align="left"> 
													<? if(isset($_COOKIE['cookchk']) && $_COOKIE['cookchk'] == "yes")
													{
														$soldto = array(
															'name' => 'chklogin',
															'id' => 'chklogin',
															'value' => 'yes',
															'checked' => set_checkbox('chklogin', 'yes', True));
														echo form_checkbox($soldto);
													}
													else
													{
														$soldto = array(
															'name' => 'chklogin',
															'id' => 'chklogin',
															'value' => 'yes',
															'checked' => set_checkbox('chklogin', 'yes', FALSE));
														echo form_checkbox($soldto);
													} ?>
													&nbsp; Remember me next time. </td>
												</tr>
												<tr><td colspan="2">&nbsp;</td></tr>
												<tr>
													<td>&nbsp;</td>
													<td align="left">
														<input type="image" src="<?php echo site_url('assets/admin/images/submit.gif');?>" />
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							<?php echo form_close();?>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<div id="midAreaBot">
					<span id="midBotRight"></span>
					<span id="midBotLeft"></span>
				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>
<?php $this->load->view('admin/includes/footer');?>