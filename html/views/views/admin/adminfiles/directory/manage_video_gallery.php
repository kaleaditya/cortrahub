<script type="text/javascript">
	function opentable()
	{
		document.getElementById("roottable").style.display="";
		$("#backbutton").show();
		$("#addbutton").hide();
		$("#back").hide();
	}

	function closetable()
	{
		document.getElementById("roottable").style.display="none";
		$("#backbutton").hide();
		$("#addbutton").show();
		$("#back").show();
		$('#imagemsg').hide();
		document.forms[0].reset();
		var validator = $("#form1").validate();
		validator.resetForm();
	}

	function TxtReset()
	{
		$('#imagemsg').hide();
		document.forms[0].reset();
		var validator = $("#form1").validate();
		validator.resetForm();
	}
</script>
<script type="text/javascript">
	$().ready(function()
	{
		$("#form1").validate();
	});
</script>
<div id="main">
	<div id="globalTabContent">
		<ul class="tabs-nav">
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?> of <?=$titlename['name']?></strong></span></a></li>
			<li><a href="javascript:void(0);" class="button-big" id="addbutton" onclick="opentable();">Add</a></li>
			<li><a href="javascript:void(0);" id="backbutton" onclick="closetable();" style="display:none;" class="button-big">Back to List View</a></li>
			<li><a href="<?php echo site_url('admins/directorylist');?>" id="back" class="button-big">Back to List View</a></li>
		</ul>
		<div id="tab-1" class="tabs-container">
			<div class="globalContainer">
				<?php  
				if ($this->session->flashdata('message'))
				{
					echo "<div class='pansucess'>".$this->session->flashdata('message')."</div>";
				}
				if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				}?>
				<?php echo form_open('admins/directorylist/add_video_gallery','name="form1" id="form1" enctype="multipart/form-data"'); ?>
					<table id="roottable" style="display:none;" cellpadding="5" cellspacing="0" border="0" width="100%" summary="" class="tblDisplay widthPc">
						<tr class="odd">
							<td class="width130" valign="top">Video Link<span class="highlight">*</span></td>
							<td>
								<input type="text" id="video" name="video" minlength="2" class="required url" maxlength="500" style="width:400px;">
								[ i.e.( https://www.youtube.com ) ]
							</td>
						</tr>

						<tr class="odd">
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="directoryid" value="<?=$directoryid?>">
								<input name="btnsubmit" type="image" src="<?php echo site_url('assets/admin/images/add.gif');?>" />
										
								<a href="javascript:TxtReset();" id="reset"><img src='<?php echo site_url('assets/admin/images/reset.gif');?>' /></a>
										
								<a href="javascript:void(0);" onclick="closetable();"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>
							</td>
						</tr>
					</table>
				<? echo form_close(); ?>

				<table cellpadding="0" width="100%" style="width:100%;" cellspacing="0" border="0" class='display tableStatic' id="example">
					<thead>
						<tr>
							<th></th>
							<th>Video</th>
							<th width="10%">Action</th>								
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="dataTables_empty" colspan='2'>Loading data from server</td>
						</tr>
					</tbody>
				</table>            
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	function renderlink(data, type, full)
	{
		var value = "<a target='_blank' title="+data+" href="+data+">"+data+"</a>";
		return value;
	}

	function confirm_delete(id) 
	{
		var directoryid = '<?=$directoryid;?>';
		var value= confirm('Are you sure you want to delete this Video Link?');
		if(value)
		{
			window.location = '<? echo site_url("admins/directorylist/delete_video_gallery");?>'+"/"+id+"/"+directoryid;
		}
	}

	function renderaction(data, type, full)
	{
	   var value = "<a title='Delete' href='javascript:void(0);' onclick='confirm_delete("+data+");'><img src='<?= site_url('assets/admin/images/deletepng.png') ?>'/></a>";
		return value;
	}

	$(document).ready(function() 
	{
		$('#example').dataTable(
		{
			"bProcessing": true,
			"bFilter":false, 
			//"bServerSide": true,
			"aaSorting": [[0,'desc']],
			"aoColumns":[
				{ "bVisible":false, "bSearchable": false, "bSortable": false},
				{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender":renderlink},
				{ "bVisible":true, "bSearchable": false, "bSortable": false ,"mRender": renderaction, "sClass": "center"}],
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"sScrollX": "100%",
			"sScrollXInner": "100%",
			"bScrollCollapse": true,
			"sAjaxSource":"<?php echo site_url('admins/directorylist/get_video_gallery');?>/<?=$directoryid;?>"
			//"sDom": "<''f>t<'F'lp>"
		});
	});
</script>