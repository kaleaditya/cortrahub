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
	}

	function TxtReset()
	{
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

	function checktitle()
	{
		var directoryid= $("#directoryid").val();
		var title= $("#title1").val();
		var flag=true;

		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('admins/directorylist/checktitle');?>",
			data : {'title': title,'directoryid':directoryid},
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
</script>
<div id="main">
	<div id="globalTabContent">
		<ul class="tabs-nav">
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?> of <?=$directory_name['name']?></strong></span></a></li>
			<li><a href="javascrip:void(0);" class="button-big" id="addbutton" onclick="opentable();">Add</a></li>
			<li><a href="javascript:TxtReset();" id="backbutton" onclick="closetable();" style="display:none;" class="button-big">Back to List View</a></li>
			<li><a href="<?php echo site_url('admins/directorylist');?>" id="back" class="button-big">Back to List View</a></li>
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
				<?php echo form_open('admins/directorylist/add_document','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checktitle()"'); ?>
					<table id="roottable" style="display:none;" cellpadding="5" cellspacing="0" border="0" width="100%" summary="" class="tblDisplay widthPc">

						<tr class="odd">
							<td class="width130" valign="top">Title <span class="highlight">*</span></td>
							<td>
								<input type="text" name="title" id="title1" class="required" onblur="checktitle()" style='width:400px;' maxlength="200" minlength="2">
								<span id="errormessage" style="display:none; color:#ff0000">This Title already exists</span>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Document <span class="highlight">*</span></td>
							<td>
								<input type="file" name="document" id="document" class="required" accept=".pdf">
								[ .pdf Only ] <br/>
								<div id="filemsg"></div>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Sort Order <span class="highlight">*</span></td>
							<td>
								<input type="text" name="sort_order" id="sort_order" maxlength="3" class="required digits" style='width:50px'>
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
								<input type="hidden" name="directoryid" id="directoryid" value="<?=$directoryid?>"/>
								<input name="btnsubmit" type="image" src="<?php echo site_url('assets/admin/images/add.gif');?>" />
										
								<a href="javascript:TxtReset();" id="reset"><img src='<?php echo site_url('assets/admin/images/reset.gif');?>' /></a>
										
								<a href="javascript:TxtReset();" onclick="closetable();"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>
							</td>
						</tr>
					</table>
				<? echo form_close(); ?>
				<table cellpadding="0" width="100%" style="width:100%;" cellspacing="0" border="0" class='display tableStatic' id="example">
					<thead>
						<tr>
							<th></th>
							<th width="6%">Is Active</th>
							<th>Title</th>
							<th width="6%">Document</th>
							<th width="10%">Sort Order</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="dataTables_empty" colspan='2'>Loading data from server</td>
						</tr>
					</tbody>
				</table>
				<div class="updatebutton" style="padding-top:10px;position:relative;float:right;margin-right:175px;">
					<input type="button" name="submit" Value="Update Sort Order" class="button-big margin_top" onclick="updatesortorder1()"></div>
				</div>
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
		var directoryid = "<?=$directoryid?>";
		var value= confirm('Are you sure you want to Activate this Document?');
		if(value)
		{
			window.location = '<? echo site_url("admins/directorylist/active_document");?>'+"/"+id+"/"+directoryid;
		}
	}

	function inactive(id)
	{
		var directoryid = "<?=$directoryid?>";
		var value= confirm('Are you sure you want to In activate this Document?');
		if(value)
		{
			window.location = '<? echo site_url("admins/directorylist/inactive_document");?>'+"/"+id+"/"+directoryid;
		}
	}

	function renderdocument(data, type, full)
	{	
		var fileName = data;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext == "pdf" || ext == "PDF")
		{
			var value = "<a target='_blank' href='<?php echo site_url('userfiles/directorylist/document/"+data+"');?>'"+data+"'><img src='<?php echo site_url('assets/admin/img/icons/pdf.png');?>'/></a>";
			return value;
		}
	}

	function render_sortorder(data, type, full)
	{
		var str1 = data;
		var str2 = full[0];
		
		var value = '<table border="0" cellspacing="0" align="center" cellpadding="0" class="brdnone"><tr><td><input type="text" name="sortorder[]" onkeypress="return numbersonly(event)" autocomplete="off" class="'+str2+' width20" value='+str1+' maxlength="3" style="text-align: center;" /><input type="hidden" name="id[]" autocomplete="off" width20" value='+str2+' style="text-align: center;" />'+" "+'</td></tr></table>';
		return value;
	}

	function updatesortorder1()
	{
		var id = $('input[name="id[]"]').map(function(){return $(this).val();}).get();
		var sortorder = $('input[name="sortorder[]"]').map(function(){return $(this).val();}).get();

		$.ajax(
		{
			type:"POST",
			url: "<?php echo site_url('admins/directorylist/updatesortorder');?>",
			data:'sortorder='+sortorder+'&id='+id,
			success: function(data)
			{
				location.reload();
				$("#message").show();
			}
		});
	}

	function numbersonly(e)
    {
		var unicode=e.charCode? e.charCode : e.keyCode
	
		if (unicode!=8)
		{
			if (unicode<48||unicode>57 ) 
			{		
				if(unicode==9 || unicode==44 || unicode==127 ||  unicode==37 || unicode==39 || unicode==46)
				{		
					return true;
				}
				else
				{
					return false 
				}
			}
		}
	}

	function renderaction(data, type, full)
	{
		var directoryid = "<?=$directoryid?>";
		var value = "<a href='<? echo site_url('admins/directorylist/update_document');?>"+'/'+data+"/"+directoryid+"' title='Edit'><img src='<?= site_url('assets/admin/images/editpng.png') ?>'/></a> | <a href='javascript:void(0);' onclick='confirm_delete("+data+","+directoryid+");' title='Delete'><img src='<?= site_url('assets/admin/images/deletepng.png') ?>'/></a>";
		return value;
	}

	function confirm_delete(id,directoryid)
	{
		var value= confirm('Are you sure you want to delete this Document?"');
		if(value)
		{
			window.location = '<? echo site_url("admins/directorylist/delete_document");?>'+"/"+id+"/"+directoryid;
		}
	}

	$(document).ready(function() 
	{
		$('#example').dataTable(
		{
			"bProcessing": true,
			//"bServerSide": true,
			"aaSorting":[[0,'desc']],
			"aoColumns":[{ "bVisible":false, "bSearchable": false, "bSortable": false},
				{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender":rendercheckbox, "sClass": "center"},
				{ "bVisible":true,"bSearchable": true, "bSortable": false},
				{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender":renderdocument, "sClass": "center"},
				{ "bVisible":true, "bSearchable": false, "bSortable": false, "mRender": render_sortorder,"sClass": "center" },
				{ "bVisible":true,"bSearchable": false, "bSortable": false ,"mRender":renderaction, "sClass": "center"}
			],
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"sScrollX": "100%",
			"sScrollXInner": "100%",
			"bScrollCollapse": true,
			"sAjaxSource":"<?php echo site_url('admins/directorylist/get_document_data');?>/<?=$directoryid;?>"
			//"sDom": "<''f>t<'F'lp>"
		});
	});
</script>
<script type="text/javascript">
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