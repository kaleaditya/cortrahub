<script type="text/javascript">
	$(document).ready(function()
	{
		$("#form1").validate();
	});

	function checktitle()
	{
		var id = "<?=$detail['id']?>";
		var directoryid = $("#directoryid").val();
		var title = $("#title1").val();
		var flag = true;

		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('admins/directorylist/checktitlebyid');?>",
			data : {'id':id,'title': title,'directoryid':directoryid},
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
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?> of <?=$directory_name['name']?></strong></span></a></li>
			<li><a href="<?php echo site_url('admins/directorylist/manage_document/'.$detail['directoryid']);?>" class="button-big">Back to List View</a></li>
		</ul>
		<div id="tab-1" class="tabs-container">
			<div class="globalContainer">
				<?if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				}?>
				<?php echo form_open('admins/directorylist/update_document','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checktitle()"'); ?>
					<table  border="0" cellpadding="5" cellspacing="1" width="100%" class="tblDisplay widthPc">
					
						<tr class="odd">
							<td class="width130" valign="top">Title <span class="highlight">*</span> </td>
							<td>
								<input type="text" id="title1" name="title" class="required" minlength="2" maxlength="200" value="<?=$detail['title']?>" style='width:700px' onblur="checktitle()">
								<span id="errormessage" style="display:none; color:#ff0000">This Title already exists </span>
							</td>
						</tr>

						<tr class="odd">
							<td width="150" valign="top">Document</td>
							<td>
								<input type="file" name="document" id="document" accept=".pdf">
								[ .pdf Only ]  <br/>
								<div>
									<?if($detail['document']!="") 
									{ ?>            
										<a target='_blank' href="<?=site_url('userfiles/directorylist/document/'.$detail['document'])?>"><img src='<?php echo site_url('assets/admin/img/icons/pdf.png');?>'/><?=$detail['document']?></a> 
									<? } ?>
								</div>
								<div class="clear"></div>
								<div id="filemsg"></div>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Sort Order <span class="highlight">*</span></td>
							<td>
								<input type="text" name="sort_order" id="sort_order" maxlength="3" class="required digits" value="<?=$detail['sort_order']?>" style='width:50px'>
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
								<input type="hidden" name="directoryid" id="directoryid" value="<?=$detail['directoryid']?>"/>
								<input type="hidden" name="id" id="id" value="<?=$detail['id']?>" />
								<input type="image" src="<?php echo site_url('assets/admin/images/save.gif');?>"/>
								<a href="<?php echo site_url('admins/directorylist/manage_document/'.$detail['directoryid']);?>"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>
							</td>
						</tr> 
					</table>
				<? echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#document").change(function()
	{
		var val = $(this).val();
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase())
		{
			case 'pdf':
				$("#filemsg").hide();
				break;

			default:
				$(this).val('');
				$("#filemsg").show();
				document.getElementById("filemsg").style.color = "red";
				$("#filemsg").html('.pdf Only');
				break;
		}
	});
</script>