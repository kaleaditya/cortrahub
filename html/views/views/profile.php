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
									<a href="#uploaddocuments" data-toggle="tab">PDF Profile</a>
								</li>
							<?php } ?>
							</ul>
							<div class="tab-content">
								<div id="profile" class="tab-pane forma_area active">
									<?php echo form_open_multipart('Profile/update','name="profileform" id="profileform" enctype="multipart/form-data" onSubmit="return checkemail();"'); ?>
									<div class="row"><div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label class="control-label">Name <span class="required">*</span></label>
											<input type="text" name="name" minlength="2" maxlength="200"  class="form-control required" value="<?=$details['name'] ?>" placeholder="Enter Name" readonly/>
										</div>
									</div></div>
									<div class="row"><div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label class="control-label">Email <span class="required">*</span></label>
											<input type="text" name="email" id="email" minlength="2" maxlength="200" class="form-control required email" value="<?=$details['email'] ?>" placeholder="Enter Email Id" onblur="checkemail();" readonly/>
											<span id="errormessage" style="display:none; color:#ff0000">This Email Address is already Exist !</span>
										</div>
									</div></div>
									<div class="row"><div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label class="control-label">Mobile No <span class="required">*</span></label>
											<input type="text" name="phone" value="<?=$details['phone'] ?>" id="contactno" minlength="10" maxlength="13" class="form-control required number" placeholder="Enter Mobile No." required readonly/>
										</div>
									</div></div>
									<?php if($this->session->userdata('intention_of_reg') == '1'){?>
									<div class="row"><div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label class="control-label">Whatsapp <span class="required">*</span></label>
											<input type="text" name="whatsapp" value="<?=$details['whatsapp'] ?>" id="whatsapp" minlength="10" maxlength="13" class="form-control required number" placeholder="Enter Mobile No." required readonly/>
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
												<label class="control-label">Short Description <span class="required">*</span></label>
												<!-- <input type="text" name="shortdescription" id="shortdescription" class=" form-control url" value="<?=$profile_details['shortdescription']?>" style='width:400px;' maxlength="200" minlength="5" required> -->
												<textarea name='shortdescription' id='shortdescription' class="form-control " maxlength="350" style="width:700px; height:100px;"><?=$profile_details['shortdescription']?></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Description  <span class="required">*</span></label>
												<!-- <input type="text" name="description" id="description" class=" form-control url" value="<?=$profile_details['description']?>" style='width:400px;' maxlength="200" minlength="5" required> -->
												<textarea name='description' id='description' class="form-control "><?=$profile_details['description']?></textarea>
												<script>
												  // CKEDITOR.replace('detail');
												   CKEDITOR.replace('description', {
														"extraPlugins" : 'imgbrowse',
														'filebrowserUploadUrl' : '<?=base_url("assets/ckeditor/plugins/link/uploader/upload.php?type=Files")?>',
														'filebrowserImageBrowseUrl': '<?=base_url("assets/ckeditor/plugins/imgbrowse/imgbrowse.html?imgroot=userfiles")?>',
														'filebrowserImageUploadUrl': '<?=base_url("assets/ckeditor/plugins/imgbrowse/imgupload.php")?>'
														});
												</script>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Introduction Video <span class="required">*</span></label>
												<div class="video_input">
													<input type="text" name="intro_video" id="intro_video" class=" form-control url" value="<?=$profile_details['intro_video']?>" style='width:400px;' maxlength="200" minlength="5" required>
													<div class="fnt12_ie" style="color: red;">[ Click PDF for instructions to upload introduction video <a href="<?=base_url("assets/intro_pdf/PDF_for_intro_video.pdf")?>" target='_blank' ><img src="<?=base_url("assets/images/icon_pdf.png")?>"> </a> ]</div>
												</div>	
												<div class="paddtop10"><?php if($profile_details['intro_video']!=''){?>
														<a class="btn_video" target='_blank' href="<?=$profile_details['intro_video']?>">Uploaded Video</a>
													<?php }?>	
												</div>										
												
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Profile Photo <span class="required">*</span></label>
												<div class="video_input">
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
													<input type="hidden" id="image1" name="image1" value='<? echo $profile_details['image']; ?>' />
													
												</div>	
												<div class="paddtop10">
													<?if($profile_details['image']!="") 
													{
													echo "<img src='".base_url('userfiles/directorylist/resizeimage')."/".$profile_details['image']."' border='0' height='50px' width='50px'/>"; 
													}
													?>	
												</div>										
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Experience <span class="required">*</span></label>
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
											<div class="fnt12_ie">[.jpg, .png, .jpeg Only] and [ Recommended Size equal to 400px X 350px. ]</div>
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
									<p class="spcial1">Note: Only 12 photos are to be uploaded and not more than 100kb in size</p>
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
<style>
	.video_input .fnt12_ie a{max-width: 13px; background: none!important;padding-left: 0px;  padding-right: 0px;}
	.video_input .fnt12_ie a img{max-width: 100%;}
</style>
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
		var profile_id=$("#profile_id").val();
		$.ajax(
		{
			type : "POST",
			url:"<? echo site_url("Profile/get_all_images_count");?>",
			data : {'id':profile_id},
			async:false,
			success : function (data)
			{ 
				if(data && data !='')
				{
					var minus_of_them=12-data;
					if(minus_of_them < numFiles )
					{
						$("#upload_images").val('');
						Swal.fire({
							icon: 'warning',

							text: 'You can only upload a maximum of ' + minus_of_them + ' files.'
						});

					}
				}

			}
		});

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