<style>
	/* Styles for the modal and overlay */
	#myModal {
		display: none;
		position: fixed;
		z-index: 1;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgba(0, 0, 0, 0.4);
	}

	#modalContent {
		background-color: #fefefe;
		margin: 15% auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
	}

	/* Style for the close button */
	#closeBtn {
		color: #aaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}
</style>
<style>
    #modalContent{max-width: 360px; padding:0px;}
    #closeBtn{cursor: pointer;}
    .modal_header{display: flex; flex-direction: row; justify-content: space-between; align-items: center; padding: 6px 15px 4px 15px; border-bottom: #ddd solid 1px; background: #f0f0f0;}            
    .modal_header h4{padding: 0px; font-size: 14px; font-weight: 600; font-family: Arial, Helvetica, sans-serif; letter-spacing: normal;}
    .content{padding: 18px 15px;}
    .content .row{display: flex;flex-direction: column; justify-content: flex-start; align-items: center; flex-wrap: wrap; margin-bottom: 15px;}
    .content .row.last{margin-bottom: 0px;}
    .lableDiv{ width: 100%; font-size: 13px; font-weight: 600; padding-bottom: 7px;}
    .inputDiv{ /*width:calc(100% - 70px);*/width: 100%;}
    .fullDiv{width: 100%;}
    .fullDiv button{margin: 0px;}
    .closeBtn{float: none;}
    select{border: 1px solid #cdcdcd; color: #333333; padding: 1px 0 1px 3px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; height: 30px; width: 100%;}
    .btnblack{background: #222; color: #fff; padding: 7px 10px; border: none;}
</style>
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
<div id="myModal">
	<!-- Modal content -->
	<div id="modalContent">        
		<div class="modal_content">
			<div class="modal_header"><h4>Action</h4>
			<span id="closeBtn" onclick="close_popup();">&times;</span>
		</div>
            <?php echo form_open('admins/new_registration/isapprove','name="form1" id="form1" enctype="multipart/form-data"'); ?>
            <div class="content">
                <div class="row">
                    <div class="lableDiv">
                      Select Actor Profile
                        </div>
                        <div class="inputDiv">
                            <select id="profile_id" name="profile_id" required>
                                <option value="">Select Profile</option>
                                <?php foreach($all_profile as $row)
                                { ?>
                                    <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                <? }?>
                            </select>
                        </div>
                    
                </div>
                <div class="row last">
                    <div class="fullDiv"><input type="hidden" name="id" id="id">
		                <button class="btnblack" type="submit">Approve</button></div>
                    
                </div>            
            </div>
            <? echo form_close(); ?>
		</div>
		
	</div>
</div>

<script type="text/javascript" charset="utf-8">

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

	
	

	function renderaction(data, type, full)
	{
		var value = "<a title='Approve' href='javascript:void(0)' onclick='approve_request("+data+");'><img src='<?= site_url('assets/admin/images/approve.png') ?>'/></a> | <a title='Reject' href='javascript:void(0);' onclick='confirm_reject("+data+");'><img src='<?= site_url('assets/admin/images/reject.png') ?>'/></a>";
		return value;
	}
	function approve_request1(id)
	{
		$.ajax(
			{
				type : "POST",
				url:"<? echo site_url("admins/new_registration/get_detail");?>",
				data : {'id':id},
				async:false,
				success : function (data)
				{ 

					if(data == 2)
					{

						if (confirm("Are you sure to approve this request?")) {
							
							//alert(data);return false;
							$('#loader').show();
							$.ajax(
							{
								type : "POST",
								url:"<? echo site_url("admins/new_registration/isapprove");?>",
								data : {'id':id,'intention':'2'},
								async:false,
								success : function (data)
								{ 
									if(data == '1')
									{
										$('#loader').hide();
										$("#pansucess").show();
										// window.location.href = '<? echo site_url("admins/registration");?>';
									}
								}});

						}

					}
					else
					{
						if (confirm("Are you sure to approve this request?")) {
							document.getElementById("myModal").style.display = "block";
							$("#id").val(id);

						}
						return false;
					}
				},
			});



		
	}
	function approve_request(id) {
    $.ajax({
        type: "POST",
        url: "<?php echo site_url("admins/new_registration/get_detail"); ?>",
        data: { 'id': id },
        success: function (data) {
            handleResponse(data, id);
        },
        error: function () {
            // Handle error here
        }
    });
}

function handleResponse(data, id) {
    if (data == 2) {
        if (confirm("Are you sure to approve this request?")) {
            $('#loader').show();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("admins/new_registration/isapprove"); ?>",
                data: { 'id': id, 'intention': '2' },
                success: function (data) {
                    if (data == '1') {
                        $('#loader').hide();
                        $("#pansucess").show();
                         window.location.href = '<?php echo site_url("admins/registration"); ?>';
                    }
                },
                error: function () {
                    // Handle error here
                }
            });
        }
    } else {
        if (confirm("Are you sure to approve this request?")) {
            document.getElementById("myModal").style.display = "block";
            $("#id").val(id);
        }
    }
}
	function close_popup()
	{
		document.getElementById("myModal").style.display = "none";
	}
	/*function renderaction(data, type, full)
	{
		var value = "<a title='Approve' href='<? echo site_url('admins/registration/isapprove');?>"+'/'+data+"'><img src='<?= site_url('assets/admin/images/approve.png') ?>'/></a> | <a title='Reject' href='javascript:void(0);' onclick='confirm_reject("+data+");'><img src='<?= site_url('assets/admin/images/reject.png') ?>'/></a>";
		return value;
	}*/

	function confirm_reject(id) 
	{
		var value= confirm('Are you sure you want to reject this Article?');
		if(value)
		{
			window.location = '<? echo site_url("admins/registration/isreject");?>'+"/"+id;
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

		function rendertextbox(data, type, full)
	{
		var id = full[0];
		
		return id;
	}
	$(document).ready(function() 
	{
		$('#example').dataTable(
		{
			"bProcessing": true,
			//"bServerSide": true,
			"aaSorting":[[0,'desc']],
			"aoColumns":[
			{ "bVisible":false, "bSearchable": false, "bSortable": false},
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
			"sAjaxSource":"<?php echo site_url('admins/new_registration/getdata');?>"
			//"sDom": "<''f>t<'F'lp>"
		});
	});
</script>