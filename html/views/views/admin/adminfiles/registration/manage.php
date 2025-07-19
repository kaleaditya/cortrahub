<script type="text/javascript">
	function opentable()
	{
		document.getElementById("roottable").style.display="";
		$("#backbutton").show();
		$("#addbutton").hide();
	}

	function closetable()
	{
		document.getElementById("roottable").style.display="none";
		$("#backbutton").hide();
		$("#addbutton").show();
		$("#imagemsg").hide();
		$("#filemsg").hide();
		document.forms[0].reset();
		var validator = $( "#form1" ).validate();
		validator.resetForm();
	}

	function TxtReset()
	{
		$("#imagemsg").hide();
		$("#filemsg").hide();
		document.forms[0].reset();
		var validator = $( "#form1" ).validate();
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
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
			<li><a href="#" class="button-big" id="addbutton" onclick="opentable();">Add</a></li>
			<li><a href="#" id="backbutton" onclick="closetable();" style="display:none;" class="button-big">Back to List View</a></li>
        </ul>
		<div id="tab-1" class="tabs-container">
			<div class="globalContainer">
				<? if ($this->session->flashdata('message'))
				{
					echo "<div class='pansucess'>".$this->session->flashdata('message')."</div>";
				}
				if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				} ?>
				<?php echo form_open('admins/registration/add','name="form1" id="form1" enctype="multipart/form-data"'); ?>
					<table id="roottable" style="display:none;" cellpadding="5" cellspacing="0" border="0" width="100%" summary="" class="tblDisplay widthPc">

						<tr class="odd">
							<td class="width130" valign="top">Article Name <span class="highlight">*</span></td>
							<td>
								<input type="text" name="articlename" class="required" maxlength="200" minlength="2" style='width:400px;'>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Upload Article Image </td>
							<td>
								<input type="file" name="image" id="image" accept=".jpg,.jpeg,.png,.gif">
								[ .jpg,.jpeg,.png Only ] and [ Recommended Size more than or equal to 248px * 300px. ] <br/>
								<div id="imagemsg"></div>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Upload Article <span class="highlight">*</span></td>
							<td>
								<input type="file" name="document" id="document" class="required" accept=".pdf">
								[ .pdf Only ] and [ Max 2 MB. ]<br/>
								<div id="filemsg"></div>
							</td>
						</tr>

						<tr class="odd">
							<td >Is Active?</td>
							<td>  
								<?php $agreeCheck = array(
									'name' => 'agreeCheck', 
									'id' => 'agreeCheck', 
									'value' => 'agree', 
									'checked' => set_checkbox('agreeCheck', 'agree', FALSE)
									);
								echo form_checkbox($agreeCheck); ?> 
							</td>
						</tr>
						<tr class="odd">
							<td>&nbsp;</td>  
							<td>
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
							<th>Name</th>
							<th width="15%">Email</th>
							<th width="15%">Phone No</th>
							<th width="15%">Created Date</th>
							<th width="15%">Register Type</th>
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
<script type="text/javascript" charset="utf-8">

	function rendercheckbox(data, type, full)
	{
		var id = full[0];
		if(data==1)
		{
			var value = "<a href='javascript:void(0);' onclick='inactive("+id+");' title='In Activate?'><img src='<?= site_url('assets/admin/images/check.png') ?>'/></a>";
		}
		else
		{
			var value = "<a href='javascript:void(0);' onclick='active("+id+");' title='Activate?'><img src='<?= site_url('assets/admin/images/uncheck.png') ?>'/></a>";
		}
		return value;
	}

	function active(id)
	{
		var value= confirm('Are you sure you want to Activate this Article?');
		if(value)
		{
			window.location = '<? echo site_url("admins/registration/active");?>'+"/"+id;
		}
	}

	function inactive(id)
	{
		var value= confirm('Are you sure you want to In activate this Article?');
		if(value)
		{
			window.location = '<? echo site_url("admins/registration/inactive");?>'+"/"+id;
		}
	}

	function renderimage(data, type, full)
	{
		var value = "<a target='_blank' href='<?=site_url('userfiles/postarticle/image/main')?>/"+data+"'><img src='<?=site_url('userfiles/postarticle/image/main')?>/"+data+"' border='0' width='71px'/></a>";
		if(data=="" || data==null)
		{
			return "--";
		}
		else
		{
			return value;
		}
	}

	function renderdocument(data, type, full)
	{	
		var fileName = data;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext == "pdf" || ext == "PDF")
		{
			var value = "<a target='_blank' href='<?php echo site_url('userfiles/postarticle/document/"+data+"');?>'"+data+"'><img src='<?php echo site_url('assets/admin/img/icons/pdf.png');?>'/></a>";
			return value;
		}
		else if(ext == "doc" || ext == "docx")
		{
			var value = "<a target='_blank' href='<?php echo site_url('userfiles/postarticle/document/"+data+"');?>'"+data+"'><img src='<?php echo site_url('assets/admin/img/icons/doc.png');?>'/></a>";
			return value;
		}
	}

	function renderaction(data, type, full)
	{
		var value = "<a href='javascript:void(0);' onclick='confirm_delete("+data+");' title='Delete'><img src='<?= site_url('assets/admin/images/deletepng.png') ?>'/></a>";
		return value;
	}

	function confirm_delete(id)
	{
		var value= confirm('Are you sure you want to delete this Article?');
		if(value)
		{
			window.location = '<? echo site_url("admins/registration/delete");?>'+"/"+id;
		}
	}
	function intentionofreg(data, type, full)
	{
		if(data == 1)
	    {
	        var value = "Actor/Model";
	    }
	    else
	    {
		    var value = "Acquire talent";
	    }
		return value;
	}

	$(document).ready(function() 
	{
		$('#example').dataTable(
		{
			"bProcessing": true,
			//"bServerSide": true,
			"aaSorting":[[0,'desc']],
			"aoColumns":[{ "bVisible":false, "bSearchable": false, "bSortable": false},
				{ "bVisible":true,"bSearchable": true, "bSortable": true},
				{ "bVisible":true,"bSearchable": true, "bSortable": true},
				{ "bVisible":true,"bSearchable": true, "bSortable": true},
				{ "bVisible":true,"bSearchable": true, "bSortable": true},
				{ "bVisible":true,"bSearchable": false, "bSortable": false ,"mRender":intentionofreg, "sClass": "center"},
		
				{ "bVisible":true,"bSearchable": false, "bSortable": false ,"mRender":renderaction, "sClass": "center"}
			],
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"sScrollX": "100%",
			"sScrollXInner": "100%",
			"bScrollCollapse": true,
			"sAjaxSource":"<?php echo site_url('admins/registration/getdata');?>"
			//"sDom": "<''f>t<'F'lp>"
		});
	});
</script>
<script type="text/javascript">
	$("#image").change(function()
	{
		var val = $(this).val();
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase())
		{
			case 'jpg': case 'png': case 'jpeg':
				$("#imagemsg").hide();
				break;

			default:
				$(this).val('');
				$("#imagemsg").show();
				document.getElementById("imagemsg").style.color = "red";
				$("#imagemsg").html('.jpg,.jpeg,.png Only');
				break;
		}
	});

	$("#document").change(function()
	{
		var val = $(this).val();

		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase())
		{
			case 'pdf':
			   
				$("#filemsg").hide();
				break;
			default:
				$(this).val('');
				
				$("#filemsg").show();
				document.getElementById("filemsg").style.color = "red";
				$("#filemsg").html('.pdf Only');
			   
				break;
		}
	});
</script>