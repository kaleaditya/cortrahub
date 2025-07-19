<div class="innercontent">
	<div class="aboutus commonpad profile1">
		<div class="sections">
			<div class="container">
				<div class="row">
					<?if ($this->session->flashdata('error'))
					{
						echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
					}
					if ($this->session->flashdata('message'))
					{
						echo "<div class='success2'>".$this->session->flashdata('message')."</div>";
					} ?>
					<div class="col-md-12">
						<div class="tabs">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#profile" data-toggle="tab">Profile</a>
								</li>
								<li>
									<a href="#changepassword" data-toggle="tab">Change Password</a>
								</li>
								<?php if($this->session->userdata('intention_of_reg') == '1'){?>
								<li>
									<a href="#uploadphotos" data-toggle="tab">Photo Upload</a>
								</li>
								<li>
									<a href="#uploadvideos" data-toggle="tab">Video Upload</a>
								</li>
								<li>
									<a href="#uploaddocuments" data-toggle="tab">Video Documents</a>
								</li>
							<?php } ?>
							</ul>
							<div class="tab-content">
								<div id="profile" class="tab-pane forma_area active">
									<?php echo form_open_multipart('Profile/update','name="profileform" id="profileform" onSubmit="return checkemail();"'); ?>
									<div class="row"><div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label class="control-label">Name <span class="required">*</span></label>
											<input type="text" name="name" minlength="2" maxlength="200"  class="form-control required" value="<?=$details['name'] ?>" placeholder="Enter Name"/>
										</div>
									</div></div>
									<div class="row"><div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label class="control-label">Email <span class="required">*</span></label>
											<input type="text" name="email" id="email" minlength="2" maxlength="200" class="form-control required email" value="<?=$details['email'] ?>" placeholder="Enter Email Id" onblur="checkemail();"/>
											<span id="errormessage" style="display:none; color:#ff0000">This Email Address is already Exist !</span>
										</div>
									</div></div>
									<div class="row"><div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label class="control-label">Mobile No <span class="required">*</span></label>
											<input type="text" name="phone" value="<?=$details['phone'] ?>" id="contactno" minlength="10" maxlength="13" class="form-control required number" placeholder="Enter Mobile No." required/>
										</div>
									</div></div>
									<?php if($this->session->userdata('intention_of_reg') == '1'){?>
									<div class="row"><div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label class="control-label">Whatsapp <span class="required">*</span></label>
											<input type="text" name="whatsapp" value="<?=$details['whatsapp'] ?>" id="whatsapp" minlength="10" maxlength="13" class="form-control required number" placeholder="Enter Mobile No." required/>
										</div>
										
									</div></div>
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Facebook <span class="required">*</span></label>
												<input type="text" name="facebook" id="facebook" class=" form-control url" value="<?=$profile_details['facebook']?>" style='width:400px;' maxlength="200" minlength="5" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Intro Video <span class="required">*</span></label>
												<div class="video_input">
													<input type="text" name="intro_video" id="intro_video" class=" form-control url" value="<?=$profile_details['intro_video']?>" style='width:400px;' maxlength="200" minlength="5" required>
													<?php if($profile_details['intro_video']!=''){?>
														<a target='_blank' href="<?=$profile_details['intro_video']?>">Uploaded video</a>
													<?php }?>
												</div>												
												<div class="fnt12_ie">[ i.e.( https://www.youtube.com ) ]</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Speciality <span class="required">*</span></label>
												<select id="specialityid" name="specialityid[]" class="tdlength myval" style="width:280px" multiple>
													<?foreach($speciality as $list)
													{
														$directoryspeciality = $this->profile_fm->getdirectoryspeciality($details['profile_id']);
														?>
														<option value="<?=$list['id']?>" <? foreach($directoryspeciality as $list1)
														{
															if($list['id']==$list1['specialityid'])
															{
																echo "selected";
															}
														}?>><?=$list['speciality']?></option>
														<?}?>
													</select>
												</div>
											</div>
										</div>
								<?php } ?>
									<!-- <div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Website <span class="required">*</span></label>
												<input type="text" name="website" id="website" class=" form-control url" value="<?=$profile_details['website']?>" style='width:400px;' maxlength="200" minlength="5">
											</div>
										</div>
									</div>	
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Country <span class="required">*</span></label>
												<select id="countryid" name="countryid" class="form-control myval searchselect required quesselect" onchange="bindstate(this.value);">
													<option value="">Select Country</option>
													<?foreach($country as $list){?>
														<option <?if($list['id']==$profile_details['countryid']){ echo "selected"; }?> value="<?=$list['id']?>"><?=$list['country']?></option>
														<?}?>
												</select>
											</div>
										</div>
									</div>
									<div class="row" id="state">
										<? if(count($state))
											{?>
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">State <span class="required">*</span></label>
												<select name="stateid" id="stateid" class="tdlength form-control myval searchselect required quesselect" onchange='bindcity(this.value)'>
													<option value="">Select State</option>
													<?foreach($state as $list)
													{?>
														<option value="<? echo $list['id'];?>" <?if($list['id']==$profile_details['stateid']){echo "selected";}?>><? echo $list['state'];?></option>
														<?}?>
													</select>
												</div>
											</div>
										<?php } ?>
									</div> 
									<div class="row" id="city">
										<? if(count($city))
											{?>
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">City <span class="required">*</span></label>
												<select name="cityid" id="cityid" class="tdlength form-control myval searchselect required quesselect" >
													<option value="">Select city</option>
													<?foreach($city as $list)
												 {?>
														<option value="<? echo $list['id'];?>" <?if($list['id']==$profile_details['cityid']){echo "selected";}?>><? echo $list['city'];?></option>
												<?}?>
													</select>
												</div>
											</div>
										<?php } ?>
									</div> -->
									<!-- <div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Age <span class="required">*</span></label>
												<select name="gender" id="gender" class="tdlength form-control myval searchselect required quesselect" >
													<option value="">Select age</option>
													<?foreach($gender as $list){?>
													<option <?if($list['id']==$profile_details['gender']){ echo "selected"; }?> value="<?=$list['id']?>"><?=$list['gender']?></option>
													<?}?>
													</select>
												</div>
											</div>
									</div>  -->  
									<input type="hidden" name="unique_id" id="unique_id" value="<?=$details['unique_id'] ?>" >              
									<input type="hidden" name="profile_id" id="profile_id" value="<?=$details['profile_id'] ?>" >              
									<input type="hidden" name="intention_of_reg" id="intention_of_reg" value="<?=$details['intention_of_reg'] ?>" >              
									<div class="row"><div class="col-md-12 col-sm-12 center">
										<div class="">
											<button type="submit" class="greenbtn signup btn_bule">UPDATE</button>
										</div>
									</div></div>
									<?php echo form_close();?>
								</div>
								<div id="changepassword" class="tab-pane forma_area">
									<? echo form_open('Profile/change_password','name="change_password_form" id="change_password_form" enctype="multipart/form-data" onSubmit="return checkpassword();"');  ?>

									<div class="row"><div class="col-md-12 col-sm-12"><div class="form-group">
										<label class="control-label">Current Password <span class="required">*</span></label>
										<input type="password" placeholder="Enter Current Password" name="oldpassword" id="oldpassword" maxlength="20" minlength="8" class="form-control required" onblur="checkpassword()">
										<span id="errormessage1" style="display:none; color:#ff0000">This Password is not exists</span>
									</div>
								</div></div>
								<div class="row"><div class="col-md-12 col-sm-12">
									<div class="form-group">
										<label class="control-label">New Password <span class="required">*</span></label>
										<input type="password" placeholder="Enter New Password" name="password" id="password" maxlength="20" minlength="8" class="form-control required">
									</div>
								</div></div>
								<div class="row"><div class="col-md-12 col-sm-12">
									<div class="form-group">
										<label class="control-label">Confirm New Password <span class="required">*</span></label>
										<input type="password" name="cpassword" id="cpassword" minlength="8" maxlength="20" class="form-control required" placeholder="Enter Confirm Password" equalTo="#password"/>
									</div>
								</div></div>
								<div class="row"><div class="col-md-12 col-sm-12">
									<div class="">
										<button type="submit" class="greenbtn signup btn_bule">submit</button>
									</div>
									<input type="hidden" name="unique_id" id="unique_id" value="<?=$details['unique_id'] ?>"> 
								</div></div>

								<? echo form_close(); ?>
							</div>
							<?php if($this->session->userdata('intention_of_reg') == '1'){?>
							<div id="uploadphotos" class="tab-pane forma_area"><!--statrt photo panle-->
								<? echo form_open('Profile/add_image_gallery','name="add_image_gallery" id="add_image_gallery" enctype="multipart/form-data" ');  ?>
								<?php $allimage=$this->profile_fm->get_all_images($details['profile_id']); 
								$count=count($allimage);?>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group max-width512">
											<label class="control-label">Photo Uploads <span class="required">*</span></label>
											<input type="file" name="image[]" id="upload_images" class="form-control" accept=".jpg,.png,.jpeg" multiple="" required="" <?php if($count >=12 ){ echo "disabled";}?>>
											<div class="fnt12_ie">[.jpg, .png, .jpeg Only] and [ Recommended Size more than or equal to 400px X 350px. ]</div>
											<div id="filemsg1"></div>
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="">
											<button type="submit" class="greenbtn signup btn_bule" <?php if($count >=12 ){ echo "disabled";}?>>submit</button>
										</div>
										<input type="hidden" name="profile_id" id="profile_id" value="<?=$details['profile_id'] ?>"> 
									</div>
								</div>

								<? echo form_close(); ?>
								<div id="image-listing" class="list_photoSection">
									<p class="spcial1">Note: Only 12 photos are to be uploaded and not more than </p>
									<div class="list_photo">
									<?php 
										foreach($allimage as $row_img)
										{ ?>
										<div>
											<img src="<?=site_url('userfiles/gallery/photo/medium/'.$row_img['image'])?>"  border='0' height='60px' width='60px'/>
											<button class="btnclose" onclick="confirm_delete('<?=$row_img['id']?>')"></button>
										</div>
										<?php }
									?>
									</div>

								</div>
							</div><!--end photo panle-->
						<?php } ?>
						<?php if($this->session->userdata('intention_of_reg') == '1'){?>
							<div id="uploadvideos" class="tab-pane forma_area"><!--start video panle-->
								<? echo form_open('Profile/add_video_gallery','name="add_video_gallery" id="add_video_gallery" enctype="multipart/form-data"');  ?>
								<?php $allvideo=$this->profile_fm->get_all_video($details['profile_id']); 
								$videocount=count($allvideo);?>
								<div class="row">
									<div class="col-md-5 col-sm-12">
										<div class="form-group">
											<label class="control-label">Video Uploads <span class="required">*</span></label>
											<input type="text" name="video" id="video" class=" form-control url" maxlength="200" minlength="5" required onblur="validateURL()" <?php if($videocount >=4 ){ echo "disabled";}?>>											
											<div class="fnt12_ie">[ i.e.( https://www.youtube.com ) ]</div>
										<div id="video_msg"></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="">
										<button type="submit" class="greenbtn signup btn_bule"  <?php if($videocount >=4 ){ echo "disabled";}?>>submit</button>
									</div>
									<input type="hidden" name="profile_id_video" id="profile_id_video" value="<?=$details['profile_id'] ?>"> 
								</div>
							</div>

							<? echo form_close(); ?>
							<div id="image-listing">
								<div class="spcial1">
									<p>Only 4 videos are to be uploaded and not more than </p>
								</div>
								<div class="list_video">								
								<?php 
								foreach($allvideo as $row_vid)
									{ ?>
									<div>
										<a target='_blank' href="<?=$row_vid['video']?>"><?=$row_vid['video']?></a>
										<button class="btnclose" onclick="confirm_delete_video('<?=$row_vid['id']?>')"></button>
									</div>
									<?php }
									?>
								</div>
								</div>
							</div><!--end video panle-->
						<?php }?>
						<?php if($this->session->userdata('intention_of_reg') == '1'){?>
							<div id="uploaddocuments" class="tab-pane forma_area"><!--statrt document panle-->
								<? echo form_open('Profile/add_document','name="add_document" id="add_document" enctype="multipart/form-data"');  ?>
								<?php $alldoc=$this->profile_fm->get_all_document($details['profile_id']); 
								?>
								<div class="row">
										<div class="col-md-5 col-sm-12">
											<div class="form-group">
												<label class="control-label">Title <span class="required">*</span></label>
												<input type="text" name="doc_title" id="doc_title" class="form-control" required>
											</div>
										</div>
									</div>
								<div class="row">
									<div class="col-md-5 col-sm-12">
										<div class="form-group">
											<label class="control-label">Document Uploads <span class="required">*</span></label>
											<input type="file" name="document" id="document" class="form-control" accept=".pdf" required="">
											<div class="fnt12_ie">[.pdf Only]</div>
											<div id="docmsg"></div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="">
											<button type="submit" class="greenbtn signup btn_bule">submit</button>
										</div>
										<input type="hidden" name="profile_id" id="profile_id" value="<?=$details['profile_id'] ?>"> 
									</div>
								</div>

								<? echo form_close(); ?>
								<div id="image-listing" class="margintop26">
								<div class="list_video pdf_li">									
									<?php 
										foreach($alldoc as $doc)
										{ ?>
										<div>
											<span class="iconPdf"></span>
											<a target='_blank' href="<?=site_url('userfiles/directorylist/document/'.$doc['document'])?>"><?=$doc['title']?></a>
											<button class="btnclose" onclick="confirm_delete_document('<?=$doc['id']?>')"></button>
										</div>
										<?php }
									?>
								</div>
								</div>
							</div><!--end document panle-->
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	jQuery.validator.addMethod("lettersonly", function(value, element)
	{
		return this.optional(element) || /^[a-z ]+$/i.test(value);
	}, "Letters only please");

	$().ready(function()
	{
		$("#profileform").validate(
		{
			rules:
			{
				name:{lettersonly: true},
			}
		});
		$("#change_password_form").validate();
	});

	function checkemail()
	{
		var unique_id = $("#unique_id").val();
		var email = $("#email").val();
		var flag=true;

		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('Profile/checkemailbyid');?>",
			data : {'unique_id':unique_id,'email': email},
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
			},
		});
		return flag;
	}

	function checkpassword()
	{
		var unique_id = $("#unique_id").val();
		var oldpassword = $("#oldpassword").val();
		var flag=true;
		if(oldpassword != "")
		{
			$.ajax(
			{
				type : "POST",
				url:"<?php echo site_url('Profile/checkpassword');?>",
				data : {'oldpassword': oldpassword,'unique_id':unique_id},
				async:false,
				success : function (data)
				{
					if(data == 1)
					{
						$("#errormessage1").hide();
						flag=true;	
					}
					else
					{
						$("#errormessage1").show();
						flag=false;
					}
				},
			});
			return flag;
		}
		else
		{
			$("#errormessage1").hide();
		}
	}
	function bindstate(value)
	{
		$('#cityid').val('');
		$('#city').hide();

		var countryid=$('#countryid').val();
		
		$.ajax({
				  type : "POST",
				  url:"<?php echo site_url('Profile/ajaxstate');?>",
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
				  url:"<?php echo site_url('Profile/ajaxcity');?>",
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
	$("#upload_images").change(function() {

    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'jpeg': case 'jpg': case 'png':
           
        	$("#filemsg1").hide();
            break;
        default:
            
            $("#upload_images").val('');
            
            $("#filemsg1").show();
			document.getElementById("filemsg1").style.color = "red";
			$("#filemsg1").html('.jpg, .png, .jpeg Only');
           
            break;
    }
});
	function confirm_delete(id) 
	{
		//var directoryid = '<?=$details['profile_id'];?>';
		var value= confirm('Are you sure you want to delete this Image?');
		if(value)
		{
			window.location = '<? echo site_url("Profile/delete_image_gallery");?>'+"/"+id;
		}
	}
	
	 $("#upload_images").on("change", function(){
  	var numFiles = $(this).get(0).files.length;
    var total_exisit_file_count=<?=$count?>;
    var minus_of_them=12-total_exisit_file_count;
    if(minus_of_them < numFiles )
    {
    	 $("#upload_images").val('');
    	 Swal.fire({
        icon: 'warning',
        //title: 'Hello!',
        text: 'You can only upload a maximum of ' + minus_of_them + ' files.'
      });
    
    }
});
	 function validateURL() {
      // Get the input value
      var url = document.getElementById('video').value;

      // Regular expression for URL validation
      var urlRegex = /^(ftp|http|https):\/\/[^ "]+$/;

      // Check if the input value matches the URL pattern
      if (urlRegex.test(url)) {
        $("#video_msg").hide();
      } else {
        $("#upload_images").val('');
            
            $("#video_msg").show();
			document.getElementById("video_msg").style.color = "red";
			$("#video_msg").html('Please enter a valid URL.');
      }


    }
    function confirm_delete_video(id) 
	{
		//var directoryid = '<?=$details['profile_id'];?>';
		var value= confirm('Are you sure you want to delete this video?');
		if(value)
		{
			window.location = '<? echo site_url("Profile/delete_video_gallery");?>'+"/"+id;
		}
	}
	$("#document").change(function()
	{
		var val = $(this).val();
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase())
		{
			case 'pdf':
				$("#docmsg").hide();
				break;

			default:
				$(this).val('');
				$("#docmsg").show();
				document.getElementById("docmsg").style.color = "red";
				$("#docmsg").html('.pdf Only');
				break;
		}
	});
	function confirm_delete_document(id)
	{
		var value= confirm('Are you sure you want to delete this Document?"');
		if(value)
		{
			window.location = '<? echo site_url("Profile/delete_document");?>'+"/"+id;
		}
	}
</script>