<script>
	$().ready(function()
	{
		$("#set_password_form").validate();
	});
</script>

<div class="signin padd_main">
    <div class="container">
        <div class="signin_upform">
            <div class="head">
                <h3>Set New Password</h3>
            </div>
            <div class="forma_area max_with600">
                <? echo form_open('Signin/set_new_password','name="set_password_form" id="set_password_form" enctype="multipart/form-data"');?>
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
								<input type="password" placeholder="Password" name="password" id="password" maxlength="20" minlength="8" class="form-control required">
							 </div>  
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="password" name="cpassword" id="cpassword" minlength="8" maxlength="20" class="form-control required" placeholder="Confirm Password" equalTo="#password"/>
							 </div>  
						</div>
						<input type="hidden" name="unique_id" value="<?=$unique_id?>">
						<div class="col-md-12 btn_two">
                            <span>
								<button type="submit" class="greenbtn btn_bule">submit</button> </span>
                                <span><a href="<?php echo site_url('Dashboard');?>" class="greenbtn greenbtn_outer btn_red1">cancel</a></span>
                                <div class="clear"></div>
							
						</div>
					</div>
				</form>
            </div>
            
        </div>
    </div>
    
</div>