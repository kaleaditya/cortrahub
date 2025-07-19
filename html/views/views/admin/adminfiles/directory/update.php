<script type="text/javascript">
	jQuery.validator.addMethod("lettersonly", function(value, element)
	{
		return this.optional(element) || /^[a-z ]+$/i.test(value);
	}, "Letters only please");

	$().ready(function() 
	{
		$("#form1").validate(
		{
			ignore: [],
            debug: false,
			rules: { 
					name:{lettersonly: true},
					description:{
						 required: function() 
						{
						 CKEDITOR.instances.description.updateElement();
						},

						 minlength:10
					}
                   },
            messages:
                   {
                    description:{
                        required:"This field is required.",
                        minlength:"Please enter 10 characters"
                    }
                   }
		});
	});


	function checkdirectory()
	{
		var id = '<? echo $detail['id']?>';
		var name = $('#name').val();
		var flag=true;

		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('admins/directorylist/checkdirectorybyid');?>",
			data : {'id':id,'name': name},
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

	function bindstate(value)
	{
		$('#cityid').val('');
		$('#city').hide();

		var countryid=$('#countryid').val();
		
		$.ajax({
				  type : "POST",
				  url:"<?php echo site_url('admins/directorylist/ajaxstate');?>",
				  data : 'countryid='+countryid,
				  async:false,
				  success : function (data)
							{
								$('#state').show();
								
								$('#state').html(data);
							}
			  });
	}

	function bindcity(value)
	{
		var stateid=$('#stateid').val();
		
		$.ajax({
				  type : "POST",
				  url:"<?php echo site_url('admins/directorylist/ajaxcity');?>",
				  data : 'stateid='+stateid,
				  async:false,
				  success : function (data)
							{
								$('#city').show();
								
								$('#city').html(data);
							}
			  });
	}

	function bindsubcategory(value)
	{
		var categoryid=$('#categoryid').val();
		
		if(categoryid!='')
		{
			$.ajax({
					  type : "POST",
					  url:"<?php echo site_url('admins/directorylist/ajaxsubcategory');?>",
					  data : 'categoryid='+categoryid,
					  async:false,
					  success : function (data)
								{
									$('#subcategory').show();
									
									$('#subcategory').html(data);
								}
				  });
		}
		else
		{
			$('#subcategory').html('');
			$('#subcategory').hide();						
		}
	}
</script>
<div id="main">
	<div id="globalTabContent">
		<ul class="tabs-nav">
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
			<li><a href="<?php echo site_url('admins/directorylist');?>" class="button-big">Back to List View</a></li>
		</ul>
		<div id="tab-1" class="tabs-container">
			<div class="globalContainer">
				<?if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				}?>
				<?php echo form_open('admins/directorylist/update','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checkdirectory()"'); ?>
					<table  border="0" cellpadding="5" cellspacing="1" width="100%" class="tblDisplay widthPc">
					
						<tr class="odd">
							<td class="width130" valign="top">Directory Name <span class="highlight">*</span></td>
							<td>
								<input type="text" name="name" id="name" class="required" value="<?=$detail['name']?>" onblur="checkdirectory()" style='width:400px;' maxlength="200" minlength="2">
								<span id="errormessage" style="display:none; color:#ff0000">This Directory Name already exists
								</span>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Mobile No <span class="highlight">*</span></td>
							<td>
								<input type="text" name="mobileno" id="mobileno" class="required digits" value="<?=$detail['mobileno']?>" style='width:400px;' maxlength="10" minlength="2">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Email</td>
							<td>
								<input type="text" name="email" id="email" class="email" value="<?=$detail['email']?>" style='width:400px;' maxlength="200" minlength="5">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Facebook <span class="highlight"></span></td>
							<td>
								<input type="text" name="facebook" id="facebook" class="url" value="<?=$detail['facebook']?>" style='width:400px;' maxlength="200" minlength="5">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Website <span class="highlight"></span></td>
							<td>
								<input type="text" name="website" id="website" class="url" value="<?=$detail['website']?>" style='width:400px;' maxlength="200" minlength="5">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Whatsup <span class="highlight"></span></td>
							<td>
								<input type="text" name="whatsup" id="whatsup" class="digits" value="<?=$detail['whatsup']?>" style='width:400px;' maxlength="10" minlength="2">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Country <span class="highlight">*</span> </td>
							<td><select id="countryid" name="countryid" class="myval required" onchange="bindstate(this.value);">
							<option value="">Select Country</option>
							<?foreach($country as $list){?>
							<option <?if($list['id']==$detail['countryid']){ echo "selected"; }?> value="<?=$list['id']?>"><?=$list['country']?></option>
							<?}?>
							</select>
							</td>
						</tr>

						<tr class="odd" id="state">
							<? if(count($state))
								{?>
									<td width="150px" valign="top">State <span class="highlight">*</span></td>
									<td>
										<select name="stateid" id="stateid" class="tdlength required myval" onchange='bindcity(this.value)'>
										<option value="">Select State</option>
										<?foreach($state as $list)
										 {?>
												<option value="<? echo $list['id'];?>" <?if($list['id']==$detail['stateid']){echo "selected";}?>><? echo $list['state'];?></option>
										<?}?>
										</select>
									</td>
							  <?}?>
						</tr>

						<tr class="odd" id="city">
							<? if(count($city))
								{?>
									<td width="150px" valign="top">City <span class="highlight">*</span></td>
									<td>
										<select name="cityid" id="cityid" class="tdlength required myval">
										<option value="">Select City</option>
										<?foreach($city as $list)
										 {?>
												<option value="<? echo $list['id'];?>" <?if($list['id']==$detail['cityid']){echo "selected";}?>><? echo $list['city'];?></option>
										<?}?>
										</select>
									</td>
							  <?}?>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Age <span class="highlight"></span> </td>
							<td><select id="age" name="age" class="myval">
							<option value="">Select Age</option>
							<?foreach($age as $list){?>
							<option <?if($list['id']==$detail['age']){ echo "selected"; }?> value="<?=$list['id']?>"><?=$list['age']?></option>
							<?}?>
							</select>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Gender <span class="highlight"></span> </td>
							<td><select id="gender" name="gender" class="myval">
							<option value="">Select Gender</option>
							<?foreach($gender as $list){?>
							<option <?if($list['id']==$detail['gender']){ echo "selected"; }?> value="<?=$list['id']?>"><?=$list['gender']?></option>
							<?}?>
							</select>
							</td>
						</tr>

						<tr class="odd">
						  <?
							$required="required";
							$star="*";
							if($detail['image']!="") 
							{
								$required="";
								$star="";	
							}
						  ?>
						  <td width="150" valign="top"> Image </td>
						  <td>
							  <?if($detail['image']!="") 
								{
									echo "<img src='".base_url('userfiles/directorylist/resizeimage')."/".$detail['image']."' border='0' height='50px' width='50px'/>"; 
								}
							  ?>
							  <?php

								$data = array(
								'accept'        => '.jpg,.png,.jpeg',
								'class'        => '',
								'name'        => 'image',
								'id'          => 'imagenew',''
								);

								echo form_upload($data); 
							 ?>
							
							[.jpg, .png, .jpeg Only]  [ Image Size must be equal to 375px X 375px. ] <br/>
							<div id="filemsg1"></div>
							<input type="hidden" id="image1" name="image1" value='<? echo $detail['image']; ?>' />
						  </td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Category <span class="highlight">*</span> </td>
							<td><select id="categoryid" name="categoryid" class="myval required" onchange="bindsubcategory(this.value);">
							<option value="">Select Category</option>
							<?foreach($category as $list){?>
							<option <?if($list['id']==$detail['categoryid']){ echo "selected"; }?> value="<?=$list['id']?>"><?=$list['category']?></option>
							<?}?>
							</select>
							</td>
						</tr>

						<tr class="odd" id="subcategory">
							<? if(count($subcategory))
								{?>
									<td width="150px" valign="top">Sub Category <span class="highlight">*</span></td>
									<td>
										<select name="subcategoryid[]" id="subcategoryid" class="tdlength required myval" style="height:100px; width:280px" multiple>
										<?foreach($subcategory as $list)
										 {
											 $directorysubcategory = $this->directory_m->getdirectorysubcategory($detail['id']);
											
											 ?>
												
												<option value="<? echo $list['id'];?>" 
												<? foreach($directorysubcategory as $list1)
												{
														if($list['id']==$list1['subcategoryid'])
														{
															echo "selected";
														}
												}?>
													
													>
													
													<? echo $list['category'];?></option>
										<?}?>
										</select><span>  To select multiple options please press (CTRL+Click)</span>
									</td>
							  <?}?>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Experience <span class="highlight"></span> </td>
							<td><select id="specialityid" name="specialityid[]" class="tdlength myval" style="height:100px; width:280px" multiple>
							<?foreach($speciality as $list)
								{
									$directoryspeciality = $this->directory_m->getdirectoryspeciality($detail['id']);
									?>
							<option value="<?=$list['id']?>" <? foreach($directoryspeciality as $list1)
											{
													if($list['id']==$list1['specialityid'])
													{
														echo "selected";
													}
											}?>><?=$list['speciality']?></option>
							<?}?>
							</select><span>  To select multiple options please press (CTRL+Click)</span>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Language <span class="highlight"></span> </td>
							<td><select id="servicesid" name="servicesid[]" class="tdlength myval" style="height:100px; width:280px" multiple>
							<?foreach($services as $list)
								{
									$directoryservices = $this->directory_m->getdirectoryservices($detail['id']);
									?>
							<option value="<?=$list['id']?>" <? foreach($directoryservices as $list1)
											{
													if($list['id']==$list1['servicesid'])
													{
														echo "selected";
													}
											}?>><?=$list['service']?></option>
							<?}?>
							</select><span>  To select multiple options please press (CTRL+Click)</span>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Others <span class="highlight"></span> </td>
							<td><select id="productsid" name="productsid[]" class="tdlength myval" style="height:100px; width:280px" multiple>
							<?foreach($products as $list)
								{
									$directoryproducts = $this->directory_m->getdirectoryproducts($detail['id']);
									?>
							<option value="<?=$list['id']?>" <? foreach($directoryproducts as $list1)
											{
													if($list['id']==$list1['productsid'])
													{
														echo "selected";
													}
											}?>><?=$list['product']?></option>
							<?}?>
							</select><span>  To select multiple options please press (CTRL+Click)</span>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Short Description<span class="highlight"> *</span> </td>
							<td><textarea name='shortdescription' id='shortdescription' class="required" maxlength="350" style="width:700px; height:100px;"><?=$detail['shortdescription']?></textarea><span>Maximum 350 characters allowed.</span></td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Description<span class="highlight"> *</span> </td>
							<td>
								<textarea name='description' id='description' class=""><?=$detail['description']?></textarea></td>
								<script>
								  // CKEDITOR.replace('detail');
								   CKEDITOR.replace('description', {
										"extraPlugins" : 'imgbrowse',
										'filebrowserUploadUrl' : '<?=base_url("assets/ckeditor/plugins/link/uploader/upload.php?type=Files")?>',
										'filebrowserImageBrowseUrl': '<?=base_url("assets/ckeditor/plugins/imgbrowse/imgbrowse.html?imgroot=userfiles")?>',
										'filebrowserImageUploadUrl': '<?=base_url("assets/ckeditor/plugins/imgbrowse/imgupload.php")?>'
										});
								</script>
						</tr>
						
						<tr class="odd">
									<td class="width130" valign="top">Page Title <span class="highlight"></span></td>
									<td>
										<input type="text" id="pagetitle" name="pagetitle" class="" maxlength="200" minlength="2" style='width:500px' value="<?=$detail['pagetitle']?>">
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Title <span class="highlight"></span></td>
									<td>
										<input type="text" id="metatitle" name="metatitle" class="" maxlength="200" minlength="2" style='width:500px'  value="<?=$detail['metatitle']?>" >
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Keywords <span class="highlight"></span></td>
									<td>
										<input type="text" id="metakeyword" name="metakeyword" class="" maxlength="200" minlength="2" style='width:500px'  value="<?=$detail['metakeyword']?>" >
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Description <span class="highlight"></span></td>
									<td>
										
										<textarea name="metadesc" id="metadesc" maxlength="500" minlength="2" style='width:500px ;height: 150px;'><?=$detail['metadesc']?></textarea>
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
							<td class="width130" valign="top">Is Featured?</td>
							<td>
								<?$isfeatured = array(
									'name' => 'isfeatured', 
									'id' => 'isfeatured', 
									'value' => 'agree', 
									'checked' => (($detail['isfeatured']=='0')?false:true)
								); 
								echo form_checkbox($isfeatured);?>
							</td>
						</tr>
						<?php $is_Actor_in_reg=$this->directory_m->is_Actor_in_reg($detail['id']);
						if($is_Actor_in_reg['cnt_id'] ==0){?>
						<tr class="odd">
							<td class="width130" valign="top">Is Blocked?</td>
							<td>
								<?$isblock = array(
									'name' => 'isblock', 
									'id' => 'isblock', 
									'value' => 'agree', 
									'checked' => (($detail['isblock']=='0')?false:true)
								); 
								echo form_checkbox($isblock);?>
							</td>
						</tr>
					<?php } ?>
						<tr class="odd">
							<td></td>
							<td>
								<input type="hidden" name="id" value="<?=$detail['id']?>" />
								<input type="image" src="<?php echo site_url('assets/admin/images/save.gif');?>"/>
								<a href="<?php echo site_url('admins/directorylist');?>"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>
							</td>
						</tr> 
					</table>
				<? echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<script>
var _URL = window.URL || window.webkitURL;

$("#imagenew").change(function(e) {
	
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        

		img.onload = function() 
		{
			if(this.width != 375)
			{
				$("#filemsg1").show();
				document.getElementById("filemsg1").style.color = "red";
				$("#filemsg1").html('Image size must be 375px X 375px');
				$("#flag1").val(false);
				document.getElementById("imagenew").value = "";
			}
			if(this.height != 375)
			{
				$("#filemsg1").show();
				document.getElementById("filemsg1").style.color = "red";
				$("#filemsg1").html('Image size must be 375px X 375px');
				$("#flag1").val(false);
				document.getElementById("imagenew").value = "";
			}

			else
			{
				$("#flag1").val(true);
				$("#filemsg1").hide();
			}
		};
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        img.src = _URL.createObjectURL(file);


    }

});
</script>

<script type="text/javascript">
	$("#imagenew").change(function() {

    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'jpeg': case 'jpg': case 'png':
           
        	$("#filemsg1").hide();
            break;
        default:
            $(this).val('');
            
            $("#filemsg1").show();
			document.getElementById("filemsg1").style.color = "red";
			$("#filemsg1").html('.jpg,.jpeg,.png Only');
           
            break;
    }
});
</script>