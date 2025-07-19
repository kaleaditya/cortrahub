<script type="text/javascript">
	$().ready(function()
	{
		$("#form1").validate();
	});
</script>
<div id="main">
	<div id="globalTabContent">
		<ul class="tabs-nav">
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
			<li><a href="<?php echo site_url('admins/new_registration');?>" class="button-big">Back to List View</a></li>
		</ul>
		<div id="tab-1" class="tabs-container">
			<div class="globalContainer">
				<?php  
				if ($this->session->flashdata('message'))
				{
					echo "<div class='pansucess'>".$this->session->flashdata('message')."</div>";
				}
				if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				}?>
				<?php echo form_open('admins/new_registration/reject','name="form1" id="form1" enctype="multipart/form-data"'); ?>
					<table  border="0" cellpadding="5" cellspacing="1" width="100%" class="tblDisplay widthPc">
						<tr class="odd">
							<td class="width130" valign="top" style="width:200px;">Reason for Reject <span class="highlight">*</span></td>
							<td>
							   <textarea type="text" name="reason" id="reason" minlength="2" class="required" maxlength="500" style="width:400px;height:100px"></textarea>
							</td>
						</tr>

						<tr class="odd">
							<td></td>
							<td>
								<input type="hidden" name="id" value="<?=$id?>">
								<input type="image" src="<?php echo site_url('assets/admin/images/save.gif');?>"/>
								<a href="<?php echo site_url('admins/new_registration');?>"><img src='<?php echo site_url("assets/admin/images/cancel.gif");?>'/></a>
							</td>
						</tr>
					</table>
				<? echo form_close(); ?>
			</div>
		</div>
	</div>
</div>