<script type="text/javascript">
	$(document).ready(function()
	{
		$("#form1").validate(
		{
			ignore: [],
			debug: false,
			rules:
			{
				description:
				{
					required: function() 
					{
						CKEDITOR.instances.description.updateElement();
					},
					minlength:10
				}
			},
			messages:
			{
				description:
				{
					required:"This field is required.",
					minlength:"Please enter 10 characters"
				}
			}
		});
	});
</script>
<div id="main">
	<div id="globalTabContent">
		<ul class="tabs-nav">
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
			<li><a href="<?php echo site_url('admins/cms');?>" class="button-big">Back to List View</a></li>
		</ul>
		<div id="tab-1" class="tabs-container">
			<div class="globalContainer">
				<? if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				} ?>
				<?php echo form_open('admins/cms/update','name="form1" id="form1" enctype="multipart/form-data"'); ?>
					<table cellpadding="5" cellspacing="0" border="0" width="100%" summary="" class="tblDisplay widthPc">
						<tr class="odd">
							<td class="width130" valign="top">Title <span class="highlight">*</span> </td>
							<td>
							   <input type="text" name="title" id="title" minlength="2" class="required" value="<?=$cms['title']?>" maxlength="200" style="width:700px;" readonly>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Description <span class="highlight">*</span></td>
							<td>
								<textarea name="description" id="description" class="required" ><?=set_value('description',$cms['description'])?></textarea>
								<script>
									 CKEDITOR.replace('description',{
									"extraPlugins" : 'imgbrowse',
									'filebrowserImageBrowseUrl': '/assets/ckeditor/plugins/imgbrowse/imgbrowse.html?imgroot=userfiles',
									"filebrowserImageUploadUrl": "/assets/ckeditor/plugins/imgbrowse/imgupload.php"
									});
								</script>
							</td>
						</tr>
						
						<tr class="odd">
									<td class="width130" valign="top">Page Title <span class="highlight"></span></td>
									<td>
										<input type="text" id="pagetitle" name="pagetitle" class="" maxlength="200" minlength="2" style='width:500px' value="<?=$cms['pagetitle']?>">
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Title <span class="highlight"></span></td>
									<td>
										<input type="text" id="metatitle" name="metatitle" class="" maxlength="200" minlength="2" style='width:500px'  value="<?=$cms['metatitle']?>" >
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Keywords <span class="highlight"></span></td>
									<td>
										<input type="text" id="metakeyword" name="metakeyword" class="" maxlength="200" minlength="2" style='width:500px'  value="<?=$cms['metakeyword']?>" >
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Description <span class="highlight"></span></td>
									<td>
										
										<textarea name="metadesc" id="metadesc" maxlength="500" minlength="2" style='width:500px ;height: 150px;'><?=$cms['metadesc']?></textarea>
									</td>
								</tr>

						<tr class="odd">
							<td class="width130" valign="top">Is Active?</td>
							<td>
								<?php $agreeCheck = array( 'name' => 'agreeCheck', 'id' => 'agreeCheck', 'value' => 'agree', 'checked' => (($cms['isactive']=='0')?false:true) ); 
								echo form_checkbox($agreeCheck);?>
							</td>
						</tr>

						<tr class="odd">
							<td></td>
							<td>
								<input type="hidden" name="id" id="id" value="<?=$cms['id']?>">
								<input type="image" src="<?php echo site_url('assets/admin/images/save.gif');?>"/>
								<a href="<?php echo site_url('admins/cms');?>"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>		
							</td>
						</tr>
					</table>
				<? echo form_close(); ?>
			</div>                  
		</div>
	</div>
</div>