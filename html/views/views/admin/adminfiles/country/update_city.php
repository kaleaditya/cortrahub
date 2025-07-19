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
				city:{lettersonly: true},
			}
		});
	});

	function checkcity()
	{
		var id = '<? echo $detail['id']?>';
		var stateid = '<?=$stateid?>';
		var city = $('#city').val();
		var flag=true;

		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('admins/country/checkcitybyid');?>",
			data : {'id':id,'city': city,'stateid':stateid},
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
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?> Of <?=$statename['state']?></strong></span></a></li>
			<li><a href="<?php echo site_url('admins/country/manage_city/'.$stateid.'/'.$countryid);?>" class="button-big">Back to List View</a></li>
		</ul>
		<div id="tab-1" class="tabs-container">
			<div class="globalContainer">
				<?if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				}?>
				<?php echo form_open('admins/country/update_city','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checkcity()"'); ?>
					<table  border="0" cellpadding="5" cellspacing="1" width="100%" class="tblDisplay widthPc">
					
						<tr class="odd">
							<td class="width130" valign="top">City <span class="highlight">*</span></td>
							<td>
								<input type="text" name="city" id="city" class="required" value="<?=$detail['city']?>" onblur="checkcity()" style='width:400px;' maxlength="200" minlength="2">
								<span id="errormessage" style="display:none; color:#ff0000">This City already exists
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
								<input type="hidden" name="stateid" value="<?=$stateid?>">
								<input type="hidden" name="countryid" value="<?=$countryid?>">
								<input type="image" src="<?php echo site_url('assets/admin/images/save.gif');?>"/>
								<a href="<?php echo site_url('admins/country/manage_city/'.$stateid.'/'.$countryid);?>"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>
							</td>
						</tr> 
					</table>
				<? echo form_close(); ?>
			</div>
		</div>
	</div>
</div>