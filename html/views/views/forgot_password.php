<script>
	$().ready(function()
	{
		$("#forgot_password_form").validate();
	});

	function checkusername()
	{
		var username= $("#username").val();
		var flag=true;

		if(username != "")
		{
			$.ajax(
			{
				type : "POST",
				url:"<?php echo site_url('Signin/checkusername');?>",
				data : {'username': username},
				async:false,
				success : function (data)
				{
					if(data == 1)
					{
						$("#errormessage").hide();
						flag=true;	
					}
					else
					{
						$("#errormessage").show();
						flag=false;
					}
				},
			});
			return flag;
		}
		else
		{
			$("#errormessage").hide();
		}
	}
</script>

<div class="signin">
    <div class="container">
        <div class="signin_upform">
            <div class="head">
                <h3>Forgot Password</h3>
            </div>
            <div class="paddlr20">
                <? echo form_open('Signin/forgot_password','name="forgot_password_form" id="forgot_password_form" enctype="multipart/form-data" onsubmit="return checkusername()"');?>
					<?if ($this->session->flashdata('error'))
					{
						echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
					}
					if ($this->session->flashdata('message'))
					{
						echo "<div class='success2'>".$this->session->flashdata('message')."</div>";
					} ?> 
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" placeholder="Username" name="username" id="username" maxlength="200" minlength="2" class="form-control required email" onblur="checkusername()"><br/>
								<span id="errormessage" style="display:none; color:#ff0000">This Username is not exists</span>
							 </div>  
						</div>
						<div class="col-md-12">
							<button type="submit" class="greenbtn">submit</button> 
						</div>
					</div>
				</form>
                  <div class="center">
                      <a href="<?php echo site_url('Signin');?>" class="greenbtn greenbtn_outer">cancel</a>
                 </div>
            </div>
            
        </div>
    </div>
    
</div>