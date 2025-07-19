<script type="text/javascript">
	function opentable()
	{
		$("#backbutton").show();
		$("#addbutton").hide();
		document.getElementById("roottable").style.display="";
	}

	function closetable()
	{
		document.forms[0].reset();
		CKEDITOR.instances['description'].setData('');
		var validator = $("#form1").validate();
		validator.resetForm();
		$("#backbutton").hide();
		$("#addbutton").show();
		$("#filemsg1").hide();
		$("#errormessage").hide();
		document.getElementById("roottable").style.display="none";
	}

	function TxtReset()
	{
		$("#filemsg1").hide();
		$("#errormessage").hide();
		document.forms[0].reset();
		CKEDITOR.instances['description'].setData('');
		var validator = $( "#form1" ).validate();
		validator.resetForm();
	}
</script>
<script type="text/javascript">
	
	jQuery.validator.addMethod("lettersonly", function(value, element)
	{
		return this.optional(element) || /^[a-z ]+$/i.test(value);
	}, "Letters only please");

	$().ready(function() 
	{
		$("#form1").validate(
		{
			ignore: [],
            debug: false,
			rules: { 
					name:{lettersonly: true},
					description:{
						 required: function() 
						{
						 CKEDITOR.instances.description.updateElement();
						},

						 minlength:10
					}
                   },
            messages:
                   {
                    description:{
                        required:"This field is required.",
                        minlength:"Please enter 10 characters"
                    }
                   }
		});
	});

	function checkdirectory()
	{
		var name= $("#name").val();
		var flag=true;

		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('admins/directorylist/checkdirectory');?>",
			data : {'name': name},
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

	function bindstate(value)
	{
		$('#cityid').val('');
		$('#city').hide();

		var countryid=$('#countryid').val();
		
		$.ajax({
				  type : "POST",
				  url:"<?php echo site_url('admins/directorylist/ajaxstate');?>",
				  data : 'countryid='+countryid,
				  async:false,
				  success : function (data)
							{
								$('#state').show();
								
								$('#state').html(data);
							}
			  });
	}

	function bindcity(value)
	{
		var stateid=$('#stateid').val();
		
		$.ajax({
				  type : "POST",
				  url:"<?php echo site_url('admins/directorylist/ajaxcity');?>",
				  data : 'stateid='+stateid,
				  async:false,
				  success : function (data)
							{
								$('#city').show();
								
								$('#city').html(data);
							}
			  });
	}

	function bindsubcategory(value)
	{
		var categoryid=$('#categoryid').val();
		
		if(categoryid!='')
		{
			$.ajax({
					  type : "POST",
					  url:"<?php echo site_url('admins/directorylist/ajaxsubcategory');?>",
					  data : 'categoryid='+categoryid,
					  async:false,
					  success : function (data)
								{
									$('#subcategory').show();
									
									$('#subcategory').html(data);
								}
				  });
		}
		else
		{
			$('#subcategory').html('');
			$('#subcategory').hide();						
		}
	}
</script>
<div id="main">
	<div id="globalTabContent">
		<ul class="tabs-nav">
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
			<li><a href="javascript:void(0);" class="button-big" id="addbutton" onclick="opentable();">Add</a></li>
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
				<?php echo form_open('admins/directorylist/add','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checkdirectory()"'); ?>
					<table id="roottable" style="display:none;" cellpadding="5" cellspacing="0" border="0" width="100%" summary="" class="tblDisplay widthPc">
						
						<tr class="odd">
							<td class="width130" valign="top">Directory Name <span class="highlight">*</span></td>
							<td>
								<input type="text" name="name" id="name" class="required" onblur="checkdirectory()" style='width:400px;' maxlength="200" minlength="2">
								<span id="errormessage" style="display:none; color:#ff0000">This Directory Name already exists
								</span>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Mobile No <span class="highlight">*</span></td>
							<td>
								<input type="text" name="mobileno" id="mobileno" class="required digits" style='width:400px;' maxlength="10" minlength="2">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Email</td>
							<td>
								<input type="text" name="email" id="email" class="email" style='width:400px;' maxlength="200" minlength="5">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Facebook <span class="highlight"></span></td>
							<td>
								<input type="text" name="facebook" id="facebook" class="url" style='width:400px;' maxlength="200" minlength="5">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Website <span class="highlight"></span></td>
							<td>
								<input type="text" name="website" id="website" class="url" style='width:400px;' maxlength="200" minlength="5">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Whatsup <span class="highlight"></span></td>
							<td>
								<input type="text" name="whatsup" id="whatsup" class="digits" style='width:400px;' maxlength="10" minlength="2">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Country <span class="highlight">*</span> </td>
							<td><select id="countryid" name="countryid" class="myval required" onchange="bindstate(this.value);">
							<option value="">Select Country</option>
							<?foreach($country as $list){?>
							<option value="<?=$list['id']?>"><?=$list['country']?></option>
							<?}?>
							</select>
							</td>
						</tr>

						<tr class="odd" style="display:none" id="state" ></tr>
						<tr class="odd" style="display:none" id="city" ></tr>

						<tr class="odd">
							<td class="width130" valign="top">Age <span class="highlight"></span> </td>
							<td><select id="age" name="age" class="myval">
							<option value="">Select Age</option>
							<?foreach($age as $list){?>
							<option value="<?=$list['id']?>"><?=$list['age']?></option>
							<?}?>
							</select>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Gender <span class="highlight"></span> </td>
							<td><select id="gender" name="gender" class="myval">
							<option value="">Select Gender</option>
							<?foreach($gender as $list){?>
							<option value="<?=$list['id']?>"><?=$list['gender']?></option>
							<?}?>
							</select>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Image </td>
							<td>
								<input type="file" name="image" id="image1" class="" accept=".jpg,.png,.jpeg">
								
								[.jpg, .png, .jpeg Only] &nbsp;&nbsp;[ Image Size must be equal to 375px X 375px. ] <br/>
								<div id="filemsg1"></div>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Category <span class="highlight">*</span> </td>
							<td><select id="categoryid" name="categoryid" class="myval required" onchange="bindsubcategory(this.value);">
							<option value="">Select Category</option>
							<?foreach($category as $list){?>
							<option value="<?=$list['id']?>"><?=$list['category']?></option>
							<?}?>
							</select>
							</td>
						</tr>

						<tr class="odd" style="display:none" id="subcategory" ></tr>

						<tr class="odd">
							<td class="width130" valign="top">Experience <span class="highlight"></span> </td>
							<td><select id="specialityid" name="specialityid[]" class="tdlength myval" style="height:100px; width:280px" multiple>
							<?foreach($speciality as $list){?>
							<option value="<?=$list['id']?>"><?=$list['speciality']?></option>
							<?}?>
							</select><span>  To select multiple options please press (CTRL+Click)</span>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Language <span class="highlight"></span> </td>
							<td><select id="servicesid" name="servicesid[]" class="tdlength myval" style="height:100px; width:280px" multiple>
							<?foreach($services as $list){?>
							<option value="<?=$list['id']?>"><?=$list['service']?></option>
							<?}?>
							</select><span>  To select multiple options please press (CTRL+Click)</span>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Others <span class="highlight"></span> </td>
							<td><select id="productsid" name="productsid[]" class="tdlength myval" style="height:100px; width:280px" multiple>
							<?foreach($products as $list){?>
							<option value="<?=$list['id']?>"><?=$list['product']?></option>
							<?}?>
							</select><span>  To select multiple options please press (CTRL+Click)</span>
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Short Description<span class="highlight"> *</span> </td>
							<td><textarea name='shortdescription' id='shortdescription' class="required" maxlength="350" style="width:700px; height:100px;"></textarea><span>Maximum 350 characters allowed.</span></td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Description<span class="highlight"> *</span> </td>
							<td><textarea name='description' id='description' class=""></textarea></td>
							<script>
							  // CKEDITOR.replace('detail');
							   CKEDITOR.replace('description', {
									"extraPlugins" : 'imgbrowse',
									'filebrowserUploadUrl' : '<?=base_url("assets/ckeditor/plugins/link/uploader/upload.php?type=Files")?>',
									'filebrowserImageBrowseUrl': '<?=base_url("assets/ckeditor/plugins/imgbrowse/imgbrowse.html?imgroot=userfiles")?>',
									'filebrowserImageUploadUrl': '<?=base_url("assets/ckeditor/plugins/imgbrowse/imgupload.php")?>'
									});
							</script>
						</tr>
						<tr class="odd">
									<td class="width130" valign="top">Page Title <span class="highlight"></span></td>
									<td>
										<input type="text" id="pagetitle" name="pagetitle" class="" maxlength="200" minlength="2" style='width:500px' >
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Title <span class="highlight"></span></td>
									<td>
										<input type="text" id="metatitle" name="metatitle" class="" maxlength="200" minlength="2" style='width:500px' >
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Keywords <span class="highlight"></span></td>
									<td>
										<input type="text" id="metakeyword" name="metakeyword" class="" maxlength="200" minlength="2" style='width:500px' >
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Description <span class="highlight"></span></td>
									<td>
										
										<textarea name="metadesc" id="metadesc" maxlength="500" minlength="2" style='width:500px ;height: 150px;'></textarea>
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
							<td >Is Featured?</td>
							<td>  
								<?php $isfeatured = array(
									'name' => 'isfeatured', 
									'id' => 'isfeatured', 
									'value' => 'agree', 
									'checked' => set_checkbox('isfeatured', 'agree', FALSE)
									);
								echo form_checkbox($isfeatured); ?> 
							</td>
						</tr>
						<tr class="odd">
							<td >Is Blocked?</td>
							<td>  
								<?php $isblock = array(
									'name' => 'isblock', 
									'id' => 'isblock', 
									'value' => 'agree', 
									'checked' => set_checkbox('isblock', 'agree', FALSE)
									);
								echo form_checkbox($isblock); ?> 
							</td>
						</tr>
						<tr class="odd">
							<td>&nbsp;</td>  
							<td>
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
							<th width="8%">Is Featured</th>
							<th width="10%">Image</th>
							<th>Directory Name</th>
							<th width="15%">Categoey</th>
							<th width="15%">Manage</th>
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

<script>
var _URL = window.URL || window.webkitURL;

$("#image1").change(function(e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
		img.onload = function() 
		{
			if(this.width != 375)
			{
				$("#filemsg1").show();
				document.getElementById("filemsg1").style.color = "red";
				$("#filemsg1").html('Image size must be 375px X 375px');
				$("#flag1").val(false);
				document.getElementById("image1").value = "";
			}
			if(this.height != 375)
			{
				$("#filemsg1").show();
				document.getElementById("filemsg1").style.color = "red";
				$("#filemsg1").html('Image size must be 375px X 375px');
				$("#flag1").val(false);
				document.getElementById("image1").value = "";
			}

			else
			{
				$("#flag1").val(true);
				$("#filemsg1").hide();
			}
		};
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        img.src = _URL.createObjectURL(file);
    }

});
</script>

<script type="text/javascript">
	$("#image1").change(function() {

    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'jpeg': case 'jpg': case 'png':
           
        	$("#filemsg1").hide();
            break;
        default:
            $(this).val('');
            
            $("#filemsg1").show();
			document.getElementById("filemsg1").style.color = "red";
			$("#filemsg1").html('.jpg,.jpeg,.png Only');
           
            break;
    }
});
</script>
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

	function renderfeatured(data, type, full)
	{
		var id = full[0];
		if(data==1)
		{
			var value = "<a href='javascript:void(0);' onclick='unfeatured("+id+");' title='Unfeatured?'><img src='<?= site_url('assets/admin/images/check.png') ?>'/></a>";
		}
		else
		{
			var value = "<a href='javascript:void(0);' onclick='featured("+id+");' title='Featured?'><img src='<?= site_url('assets/admin/images/uncheck.png') ?>'/></a>";
		}
		return value;
	}

	function active(id)
	{
		var value= confirm('Are you sure you want to Activate this Directory Name?');
		if(value)
		{
			window.location = '<? echo site_url("admins/directorylist/active");?>'+"/"+id;
		}
	}

	function inactive(id)
	{
		var value= confirm('Are you sure you want to In activate this Directory Name?');
		if(value)
		{
			window.location = '<? echo site_url("admins/directorylist/inactive");?>'+"/"+id;
		}
	}

	function featured(id)
	{
		var value= confirm('Are you sure you want to featured this Directory Name?');
		if(value)
		{
			window.location = '<? echo site_url("admins/directorylist/featured");?>'+"/"+id;
		}
	}

	function unfeatured(id)
	{
		var value= confirm('Are you sure you want to unfeatured this Directory Name?');
		if(value)
		{
			window.location = '<? echo site_url("admins/directorylist/unfeatured");?>'+"/"+id;
		}
	}

	function renderaction(data, type, full)
	{
		var value = "<a href='<? echo site_url('admins/directorylist/update');?>"+'/'+data+"' title='Edit'><img src='<?= site_url('assets/admin/images/editpng.png') ?>'/></a> | <a href='<? echo site_url('admins/directorylist/detail');?>"+'/'+data+"' title='Detail'><img src='<?= base_url('assets/admin/images/detailpng.png') ?>'/></a> | <a href='#' onclick='confirm_delete("+data+");' title='Delete'><img src='<?= site_url('assets/admin/images/deletepng.png') ?>'/></a>";
		return value;
	}

	function confirm_delete(id)
	{
		var value= confirm('Are you sure you want to delete this Directory Name?');
		if(value)
		{
			window.location = '<? echo site_url("admins/directorylist/delete");?>'+"/"+id;
		}
	}

	function renderimage(data, type, full)
	{
	    if(data == "" || data == null)
	    {
	        var value = "<img width='80px' height='80px' src='<?php echo base_url('assets/images/ifid_notavailable-128.jpg');?>'>";
	    }
	    else
	    {
		    var value = "<img width='80px' height='80px' src='<?php echo base_url('userfiles/directorylist/resizeimage');?>"+'/'+data+"'>";
	    }
		return value;
	}

	function renderucwords(data, type, full){
            
        var str=data;
		return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
		});

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
			url: "<?php echo site_url('admins/directorylist/updatesort1');?>",
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

	function renderlink(data, type, full)
	{
		var value = "<table border='0' cellspacing='0' align='center' cellpadding='0' class='brdnone'><tr><td><a href='<?=site_url('admins/directorylist/manage_image_gallery')?>/"+data+"'>Manage Image Gallery</a></td></tr><tr><td><a href='<?=site_url('admins/directorylist/manage_video_gallery')?>/"+data+"'>Manage Video Gallery</a></td></tr><tr><td><a href='<?=site_url('admins/directorylist/manage_document')?>/"+data+"'>Manage Document</a></td></tr></table>";
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
				{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender":rendercheckbox, "sClass": "center"},
				{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender":renderfeatured, "sClass": "center"},
				{ "bVisible":true,"bSearchable": false, "bSortable": false, "mRender": renderimage, "sClass": "center"},
				{ "bVisible":true,"bSearchable": true, "bSortable": true, "mRender": renderucwords},
				{ "bVisible":true,"bSearchable": true, "bSortable": true, "mRender": renderucwords},
				{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender":renderlink, "sClass": "center"},
				{ "bVisible":true, "bSearchable": false, "bSortable": false, "mRender": render_sortorder,"sClass": "center" },
				{ "bVisible":true,"bSearchable": false, "bSortable": false ,"mRender":renderaction, "sClass": "center"}
			],
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"sScrollX": "100%",
			"sScrollXInner": "100%",
			"bScrollCollapse": true,
			"sAjaxSource":"<?php echo site_url('admins/directorylist/getdata');?>"
			//"sDom": "<''f>t<'F'lp>"
		});
	});
</script>