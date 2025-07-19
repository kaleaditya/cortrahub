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
	}

	function TxtReset()
	{
		$("#errormessage").hide();
		document.forms[0].reset();
		var validator = $( "#form1" ).validate();
		validator.resetForm();
	}
</script>
<script type="text/javascript">
	jQuery.validator.addMethod("lettersonly", function(value, element)
	{
		return this.optional(element) || /^[ a-zA-Z!@#$&()\\-`.+,/\"/\' ]*$/i.test(value);
	}, "Letters and special characters only please");

	$().ready(function() 
	{
		$("#form1").validate(
		{
			rules:
			{
				country:{lettersonly: true},
			}
		});
	});

	function checkcountry()
	{
		var country= $("#country").val();
		var flag=true;

		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('admins/country/checkcountry');?>",
			data : {'country': country},
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
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
			<li><a href="#" class="button-big" id="addbutton" onclick="opentable();">Add</a></li>
			<li><a href="javascript:TxtReset();" id="backbutton" onclick="closetable();" style="display:none;" class="button-big">Back to List View</a></li>
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
				<?php echo form_open('admins/country/add','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checkcountry()"'); ?>
					<table id="roottable" style="display:none;" cellpadding="5" cellspacing="0" border="0" width="100%" summary="" class="tblDisplay widthPc">
						
						<tr class="odd">
							<td class="width130" valign="top">Country <span class="highlight">*</span></td>
							<td>
								<input type="text" name="country" id="country" class="required" onblur="checkcountry()" style='width:400px;' maxlength="200" minlength="2">
								<span id="errormessage" style="display:none; color:#ff0000">This Country already exists
								</span>
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
							<th width="6%">Is Active</th>
							<th>Country</th>
							<th width="10%">Manage State</th>
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
		var value= confirm('Are you sure you want to Activate this Country?');
		if(value)
		{
			window.location = '<? echo site_url("admins/country/active");?>'+"/"+id;
		}
	}

	function inactive(id)
	{
		var value= confirm('Are you sure you want to In activate this Country?');
		if(value)
		{
			window.location = '<? echo site_url("admins/country/inactive");?>'+"/"+id;
		}
	}

	function renderlink(data, type, full)
	{
		var value = "<a href='<?=site_url('admins/country/manage_state')?>/"+data+"'>Manage State</a>";
		return value;
	}

	function renderaction(data, type, full)
	{
		var value = "<a href='<? echo site_url('admins/country/update');?>"+'/'+data+"' title='Edit'><img src='<?= site_url('assets/admin/images/editpng.png') ?>'/></a> | <a href='#' onclick='confirm_delete("+data+");' title='Delete'><img src='<?= site_url('assets/admin/images/deletepng.png') ?>'/></a>";
		return value;
	}

	function confirm_delete(id)
	{
		var value= confirm('Are you sure you want to delete this Country?');
		if(value)
		{
			window.location = '<? echo site_url("admins/country/delete");?>'+"/"+id;
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
				{ "bVisible":true,"bSearchable": true, "bSortable": true},
				{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender":renderlink, "sClass": "center"},
				{ "bVisible":true,"bSearchable": false, "bSortable": false ,"mRender":renderaction, "sClass": "center"}
			],
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"sScrollX": "100%",
			"sScrollXInner": "100%",
			"bScrollCollapse": true,
			"sAjaxSource":"<?php echo site_url('admins/country/getdata');?>"
			//"sDom": "<''f>t<'F'lp>"
		});
	});
</script>