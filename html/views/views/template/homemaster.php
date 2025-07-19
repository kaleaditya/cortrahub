<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" >
	<!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="<? echo site_url('favicon.ico');?>">
		<title>ATOM Directory :: A Talent Management directory for fresh actors and models</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
		<link href="<? echo site_url('assets/css/select2.css');?>" rel="stylesheet">

		<link href="<? echo site_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<? echo site_url('assets/css/style.css');?>" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->

		<script src="<? echo site_url('assets/js/custom.modernizr.js');?>" type="text/javascript" ></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="<? echo site_url('assets/js/jquery.validate.js');?>"></script>
		<script>
				window.jQuery || document.write('<script src="<? echo site_url("assets/js/jquery.js");?>"><\/script>')
		</script>
		<script src="<? echo site_url("assets/js/bootstrap.min.js");?>"></script>
	</head>

	<body>
	   <div style="background:url(<? echo site_url('assets/images/with_trn.png');?>) repeat left top; position:fixed; width:100%; height:100%; left:0px; top:0px; z-index:999999;" id="loader">

	<div style="position:absolute; left:0px; top:0px; width:100%; height:100%; background:url(<? echo site_url('assets/images/ajax-loader.gif');?>) no-repeat center center;"></div>
		</div>
		
	    <?php $this->load->view($main);?>
		<footer>
			<?php $this->load->view('includes/footer.php');?>
		</footer>
		<div class="backToTop"></div>

		<!--JavaScript
		================================================== -->
		<script src="<? echo site_url('assets/js/select2/select2.js');?>"></script>
		<script src="<? echo site_url("assets/js/custom.js");?>"></script>
		<script src="<? echo site_url("assets/js/controltag.js");?>"></script>

		<script language="javascript" type="text/javascript">
			 $(window).load(function() {
			 $('#loader').hide();
		  });
		</script> 

		<script>
			$().ready(function()
			{
				$('.success2').delay(8000).fadeOut();
				$('.failure').delay(8000).fadeOut();
			});
		</script>
	</body>
</html>