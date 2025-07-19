<script type="text/javascript">
	jQuery.validator.addMethod("lettersonly", function(value, element)
	{
		return this.optional(element) || /^[ a-zA-Z!@#$&()\\-`.+,/\"/\' ]*$/i.test(value);
	}, "Letters and special characters only please");

	$(document).ready(function()
	{
		$("#form1").validate(
		{
			rules:
			{
				state:{lettersonly: true},
			}
		});
	});

	function checkstate()
	{
		var id = '<? echo $detail['id']?>';
		var countryid = '<?=$countryid?>';
		var state = $('#state').val();
		var flag=true;

		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('admins/country/checkstatebyid');?>",
			data : {'id':id,'state': state,'countryid':countryid},
			async:false,
			success : function (data)
			{
				if(data == 1)
				{
					$("#errormessage").show();
					flag=false;	
				}
				else
				{
					$("#errormessage").hide();
					flag=true;
				}
			}
		});
		return flag;
	}
</script>
<div id="main">
	<div id="globalTabContent">
		<ul class="tabs-nav">
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?> Of <?=$countryname['country']?></strong></span></a></li>
			<li><a href="<?php echo site_url('admins/country/manage_state/'.$countryid);?>" class="button-big">Back to List View</a></li>
		</ul>
		<div id="tab-1" class="tabs-container">
			<div class="globalContainer">
				<?if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				}?>
				<?php echo form_open('admins/country/update_state','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checkstate()"'); ?>
					<table  border="0" cellpadding="5" cellspacing="1" width="100%" class="tblDisplay widthPc">
					
						<tr class="odd">
							<td class="width130" valign="top">Country <span class="highlight">*</span></td>
							<td>
								<input type="text" name="state" id="state" class="required" value="<?=$detail['state']?>" onblur="checkstate()" style='width:400px;' maxlength="200" minlength="2">
								<span id="errormessage" style="display:none; color:#ff0000">This State already exists
								</span>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Is Active?</td>
							<td>
								<?$agreeCheck = array(
									'name' => 'agreeCheck', 
									'id' => 'agreeCheck', 
									'value' => 'agree', 
									'checked' => (($detail['isactive']=='0')?false:true)
								); 
								echo form_checkbox($agreeCheck);?>
							</td>
						</tr>

						<tr class="odd">
							<td></td>
							<td>
								<input type="hidden" name="id" value="<?=$detail['id']?>" />
								<input type="hidden" name="countryid" value="<?=$countryid?>">
								<input type="image" src="<?php echo site_url('assets/admin/images/save.gif');?>"/>
								<a href="<?php echo site_url('admins/country/manage_state/'.$countryid);?>"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>
							</td>
						</tr> 
					</table>
				<? echo form_close(); ?>
			</div>
		</div>
	</div>
</div>