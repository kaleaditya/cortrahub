<div class="padd_main">
	<div class="container">
		<div class="row">		    
			<div class="col-md-8 col-sm-8 justify-center">
				<h1>Feedback Form</h1>
				<p> The success of any business lies in a positive user experience; you our target audience simply won’t interact with us if you don’t enjoy doing so.We want to provide the best user experience, so we are actively listening to you; our users.We know that the only way to foster a positive user experience and improve our business is by maintaining a continuous dialogue with our valued audience.</p> 

<p>We have put lots of time, money and effort into building this website and it’s easy for us to be biased and assume that everything’s perfect. But the fact is, we can’t know everything. We might not see the flaws that others do, so it is vital to get feedback from you our valued patronswho are actually using our site. </p>
<p> Thank you for your valuable time to give us feedbacl.Alternately you can also email us on info@atomdirectory.com or call us</p>
				<? echo form_open('Feedback/sendmail','name="contact_form" id="contact_form" enctype="multipart/form-data" onsubmit="return validatecaptcha();"');?>
					<?if ($this->session->flashdata('error'))
					{
						echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
					}
					if ($this->session->flashdata('message'))
					{
						echo "<div class='success'>".$this->session->flashdata('message')."</div>";
					} ?>
					<div class="form-group">
						<input type="text" placeholder="Name*" name="txtname" maxlength="200" minlength="2" class="form-control required">
						<input type="hidden" name="txtname_V" value="Name">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Phone No.*" name="txtphone" maxlength="10" minlength="10" class="form-control required number">  
						<input type="hidden" name="txtphone_V" value="Phone">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Email*" name="txtemail" maxlength="200" minlength="2" class="form-control required email">   
						<input type="hidden" name="txtemail_V" value="Email">
					</div>
					<div class="form-group">
						<textarea class="form-control" placeholder="Message" name="txtmessage" maxlength="500" ></textarea> 
						<input type="hidden" name="txtmessage_V" value="Message">
					</div>
					<div class="form-group">
						<div class="roboto">
							<label class="pull-left"><img src="<?=site_url('php_captcha')?>"></label>
							<? $keyvalue = '';
							if ($this->session->userdata('ResultStr'))
							{
								$keyvalue = $this->session->userdata('ResultStr');
							} ?>
							<input type="text" name="number_V" class="form-control required" id="number" onblur="validatecaptcha()" placeholder="Enter Captcha Code">
							<label id="captchaerror" style="display:none;color:#ff0000;margin-top:10px;">Enter valid string</label>
						</div>
					</div>  
					<div class="form-group">
						<input type="hidden" name="heading_V" value="Feedback Details">
						<input type="hidden" name="footer_V" value="ATOM Directory, All Rights Reserved.">
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				<?php echo form_close(); ?>
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
		$("#contact_form").validate(
		{
			rules:
			{
				txtname:{lettersonly: true},
			}
		});
	});
</script>
<script>
	function validatecaptcha()
	{
		var flag = true;
		var captchacode = $('#number').val();
		if(captchacode != "")
		{
			$.ajax(
			{
				type: "POST",
				url: "<? echo site_url('Feedback/checkcaptchacode'); ?>",
				data: {code: captchacode},
				async: false,
				success : function (data)
				{
					if(data=="false")
					{
						$("#captchaerror").show();
						flag = false;
					}
					else
					{
						$("#captchaerror").hide();
						flag = true;
					}
				}
			});
		}
		else
		{
			$("#captchaerror").hide();
			flag = true;
		}
		return flag;
	}
</script>