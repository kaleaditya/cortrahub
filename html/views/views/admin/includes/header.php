<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="ctl00_Head1">
	<title><?=$title;?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="shortcut icon" href="<? echo site_url('favicon.ico');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/global.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/base.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/datePicker.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/CalendarControl.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/font-awesome.css');?>" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/main.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/admin.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/jqueryui.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/reset.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/structure.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/tabs.css');?>"/> 
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/datePicker.css');?>"/> 
	<link rel="stylesheet" media="print" type="text/css" href="<? echo site_url('assets/admin/css/print.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/spectrum.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/highslide/highslide.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/admin/css/jquery-ui.multidatespicker.css');?>"/> 
	<link rel="stylesheet" href="<?php echo site_url('assets/admin/css/jquery-datatables-bs3/assets/css/datatables.css');?>" />

	<script type="text/javascript" src="<?php echo site_url('assets/admin/js/jquery-1.9.1.js');?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/admin/js/jquery.validate.js');?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/admin/js/jquery-ui.js');?>"></script>
	<script src="<?php echo site_url('assets/admin/css/jquery-datatables-bs3/assets/js/datatables.js');?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/admin/highslide/highslide-with-html.js');?>"></script>
	<script type="text/javascript">
		hs.graphicsDir = "<?php echo site_url('assets/admin/highslide/graphics'); ?>"+'/';
		hs.outlineType = 'rounded-white';
		hs.wrapperClassName = 'draggable-header';
	</script>
	<script type="text/javascript" src="<?php echo site_url('assets/admin/js/date.js');?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/admin/js/jquery.datePicker.js');?>"></script> 
	<script type="text/javascript" src="<?php echo site_url('assets/admin/js/jquery.dataTables.js');?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/ckeditor/ckeditor.js');?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/admin/js/spectrum.js');?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/admin/js/jquery-ui.multidatespicker.js');?>"></script>

	<script src="<?php echo site_url('assets/admin/js/tables/examples.datatables.default.js');?>"></script>
	<script src="<?php echo site_url('assets/admin/js/tables/examples.datatables.row.with.details.js');?>"></script>
	<script src="<?php echo site_url('assets/admin/js/tables/examples.datatables.tabletools.js');?>"></script>

</head>
<!-- <div style="background:url(<? echo site_url('assets/admin/images/with_trn.png');?>) repeat left top; position:fixed; width:100%; height:100%; left:0px; top:0px; z-index:999999;display:none;" id="loader">
 <div style="position:absolute; left:0px; top:0px; width:100%; height:100%; background:url(<? echo site_url('assets/admin/images/loading.gif');?>) no-repeat center center;"></div>
</div> -->
<div style="background:url(<? echo site_url('assets/images/with_trn.png');?>) repeat left top; position:fixed; width:100%; height:100%; left:0px; top:0px; z-index:999999;display:none;" id="loader">

		<div style="position:absolute; left:0px; top:0px; width:100%; height:100%; background:url(<? echo site_url('assets/images/ajax-loader.gif');?>) no-repeat center center;"></div>
		</div>