<div id="main">
	<div id="globalTabContent">
		<ul class="tabs-nav">
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
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
				<table cellpadding="0" width="100%" style="width:100%;" cellspacing="0" border="0" class='display tableStatic' id="example">
					<thead>
						<tr>
							<th></th>
							<th width="6%">Is Active</th>
							<th>Title</th>
							<th width="10%">Action</th>								
						</tr>
					</thead>
					<tbody>
						<tr>
							<td  class="dataTables_empty" colspan='2'>Loading data from server</td>
						</tr>
					</tbody>
				</table>  
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	function rendercheckbox(data, type, full)
	{
		if(data==1)
		{
			var checked="checked";
		}
		else
		{
			var checked="";
		}
		 var value = "<input type='checkbox' "+checked+" onclick='return false' />";
		return value;
	}
	
	function renderucwords(data, type, full)
	{
        var str=data;
		return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) 
		{
			return $1.toUpperCase();
		});
	}

	function renderaction(data, type, full)
	{
		if(data == '1')
		{
			var value = "<a title='Edit' href='<? echo site_url('admins/cms/update');?>"+'/'+data+"'><img src='<?= site_url('assets/admin/images/editpng.png') ?>'/></a> | <a target='_blank' title='Detail' href='<? echo site_url('Aboutus');?>'><img src='<?= site_url('assets/admin/images/detailpng.png') ?>'/></a>";
		}
		else if(data == '2')
		{
			var value = "<a title='Edit' href='<? echo site_url('admins/cms/update');?>"+'/'+data+"'><img src='<?= site_url('assets/admin/images/editpng.png') ?>'/></a> | <a target='_blank' title='Detail' href='<? echo site_url('Termsandconditions');?>'><img src='<?= site_url('assets/admin/images/detailpng.png') ?>'/></a>";
		}
		else if(data == '3')
		{
			var value = "<a title='Edit' href='<? echo site_url('admins/cms/update');?>"+'/'+data+"'><img src='<?= site_url('assets/admin/images/editpng.png') ?>'/></a> | <a target='_blank' title='Detail' href='<? echo site_url('Privacystatement');?>'><img src='<?= site_url('assets/admin/images/detailpng.png') ?>'/></a>";
		}
		else if(data == '4')
		{
			var value = "<a title='Edit' href='<? echo site_url('admins/cms/update');?>"+'/'+data+"'><img src='<?= site_url('assets/admin/images/editpng.png') ?>'/></a> | <a target='_blank' title='Detail' href='<? echo site_url('Registrationprocedures');?>'><img src='<?= site_url('assets/admin/images/detailpng.png') ?>'/></a>";
		}
		else if(data == '5')
		{
			var value = "<a title='Edit' href='<? echo site_url('admins/cms/update');?>"+'/'+data+"'><img src='<?= site_url('assets/admin/images/editpng.png') ?>'/></a> | <a target='_blank' title='Detail' href='<? echo site_url('Contactus');?>'><img src='<?= site_url('assets/admin/images/detailpng.png') ?>'/></a>";
		}

		return value;
	}

	function confirm_delete(id) 
	{
		var value= confirm('Are you sure you want to delete this Page');
		if(value)
		{
			window.location = '<? echo site_url("admins/cms/delete");?>'+"/"+id;
		}
	}

	$(document).ready(function()
	{
		$('#example').dataTable( 
		{
			"bProcessing": true,
			//"bServerSide": true,
			"aaSorting": [[0,'asc']],
			"aoColumns":[
			{ "bVisible":false, "bSearchable": false, "bSortable": false},
			{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender":rendercheckbox, "sClass": "center"},
			{ "bVisible":true,"bSearchable": true, "bSortable": true, "mRender": renderucwords},
			{ "bVisible":true, "bSearchable": false, "bSortable": false ,"mRender": renderaction, "sClass": "center"}
			],
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"sScrollX": "100%",
			"sScrollXInner": "100%",
			"bScrollCollapse": true,
			"sAjaxSource":"<?php echo site_url('admins/cms/getdata');?>"
			//"sDom": "<''f>t<'F'lp>"
		});
	});
</script>