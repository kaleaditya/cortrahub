<div id="main">
	<div id="globalTabContent">
		<ul class="tabs-nav">
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
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
				<table cellpadding="0" width="100%" style="width:100%;" cellspacing="0" border="0" class='display tableStatic' id="example">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th width="15%">Email</th>
							<th width="15%">Profession</th>
							<th width="10%">Created Time</th>
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

	function renderaction(data, type, full)
	{
		var value = "<a href='javascript:void(0);' onclick='confirm_delete("+data+");' title='Delete'><img src='<?= site_url('assets/admin/images/deletepng.png') ?>'/></a>";
		return value;
	}

	function confirm_delete(id)
	{
		var value= confirm('Are you sure you want to delete this Inquiry?');
		if(value)
		{
			window.location = '<? echo site_url("admins/articles_inquiry/delete");?>'+"/"+id;
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
				{ "bVisible":true,"bSearchable": true, "bSortable": true},
				{ "bVisible":true,"bSearchable": true, "bSortable": true},
				{ "bVisible":true,"bSearchable": true, "bSortable": true},
				{ "bVisible":true,"bSearchable": true, "bSortable": true, "sClass": "center"},
				{ "bVisible":true,"bSearchable": false, "bSortable": false ,"mRender":renderaction, "sClass": "center"}
			],
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"sScrollX": "100%",
			"sScrollXInner": "100%",
			"bScrollCollapse": true,
			"sAjaxSource":"<?php echo site_url('admins/articles_inquiry/getdata');?>"
			//"sDom": "<''f>t<'F'lp>"
		});
	});
</script>