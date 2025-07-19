<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" >
	<!--<![endif]-->
	<head>
    	   <? if(isset($pagetitle) && $pagetitle!='')
    	    { ?>
    	      <meta name="pagetitle" content="<?= ucwords($pagetitle)?>" />
    	    <? }
    	    else
    	    { ?>
    	     
    	      <meta name="pagetitle" content=""/>
    	    <? } ?>
    
    		<? if(isset($metakeyword) && $metakeyword!='')
    	    { ?>
    	      <meta name="keywords" content="<?=$metakeyword?>" />
    	    <? }
    	    else
    	    { ?>
    	     
    	      <meta name="keywords" content=""/>
    	    <? } ?>
    	    
    	    <? if(isset($metadescription) && $metadescription!='')
    	    { ?>
    	    	 <meta name="description" content="<?=$metadescription?>" />
    	    <? }
    	    else  
    	    { ?>
          		
          		<meta name="description" content="" />
        	<? } ?> 
	    
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="<? echo site_url('favicon.ico');?>">
 <? /**if(isset($title) && $title!='')
		{ ?>
		 <title><?=ucwords($title)?></title>
		<? }
		else  **/
		{ ?>
		  
		  <title>ATOM Directory :: A Talent Organizing and Management Directory for New Actors and Models</title>
		<? } ?>
		
		<link href="<? echo site_url('assets/css/select2.css');?>" rel="stylesheet">

		<link href="<? echo site_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<? echo site_url('assets/css/style.css');?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo site_url('assets/vendor/pnotify/pnotify.custom.css');?>" />
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
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="<? echo site_url("assets/js/bootstrap.min.js");?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/ckeditor/ckeditor.js');?>"></script>
	</head>

	<body>
		<div style="background:url(<? echo site_url('assets/images/with_trn.png');?>) repeat left top; position:fixed; width:100%; height:100%; left:0px; top:0px; z-index:999999;" id="loader">

		<div style="position:absolute; left:0px; top:0px; width:100%; height:100%; background:url(<? echo site_url('assets/images/ajax-loader.gif');?>) no-repeat center center;"></div>
		</div>

		<?php $this->load->view('includes/header.php');?>
		<?php $this->load->view($main);?>
		
		<footer>
			<?php $this->load->view('includes/footer.php');?>
		</footer>
		
		<div class="backToTop"></div>

		<!--JavaScript
		================================================== -->
		<script src="<? echo site_url('assets/js/select2/select2.js');?>"></script>
		<script src="<? echo site_url("assets/js/custom.js");?>"></script>
		<script src="<?php echo site_url('assets/vendor/pnotify/pnotify.custom.js');?>"></script>
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