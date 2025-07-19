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
								<input type="text" name="phone" value="<?=$details['phone'] ?>" id="contactno" minlength="10" maxlength="13" class="form-control required number" placeholder="Enter Mobile No."/>
							</div>
                                <input type="hidden" name="unique_id" id="unique_id" value="<?=$details['unique_id'] ?>">
						</div></div>				            
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
</script>