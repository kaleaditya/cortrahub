<script type="text/javascript">
	function opentable()
	{
		$("#backbutton").show();
		$("#addbutton").hide();
		$("#back").hide();
		document.getElementById("roottable").style.display="";
	}

	function closetable()
	{
		document.forms[0].reset();
		var validator = $("#form1").validate();
		validator.resetForm();
		$("#backbutton").hide();
		$("#back").show();
		$("#addbutton").show();
		$('#imagemsg').hide();
		$("#errormessage").hide();
		document.getElementById("roottable").style.display="none";
	}

	function TxtReset()
	{
		$('#imagemsg').hide();
		document.forms[0].reset();
		$("#errormessage").hide();
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
				category:{lettersonly: true},
			}
		});
	});

	function checkcategory()
	{
		var category= $("#category1").val();
		var flag=true;

		$.ajax({
			  type : "POST",
			  url:"<?php echo site_url('admins/category/checkcategory');?>",
			  data : {'category': category},
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
			<? if($cat>0)
			{ ?>
				<li class="tabs-selected"><a href="#tab-1"><span><strong>Manage <?=ucwords($category["category"]);?></strong></span></a></li>
			<? }
			else
			{ ?>
				<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
			<? } ?>

			
			<li><a href="javascript:void(0)" class="button-big" id="addbutton" onclick="opentable();">Add</a></li>
			<li><a href="javascript:void(0)" id="backbutton" onclick="closetable();" style="display:none;" class="button-big">Back to List View</a></li>
			<li>
			<?if(count($category)!=0 && $category['level']<2)
			{
				if(isset($category['cat']) && $category['cat']!=0)
				{ ?>
					<a href="<?php echo site_url('admins/category/index').'/'.$category['cat'];?>" class="button-big back" id="back"> Back to list view</a>
			<?	}
				else
				{ ?>
					<a href="<?php echo site_url('admins/category/index');?>" class="button-big back" id="back"> Back to list view</a>
			<?	}
			} ?>
			</li>
        </ul>
		<div id="tab-1" class="tabs-container">
			<div class="globalContainer">
				<?if ($this->session->flashdata('errorcat'))
				{
					echo "<div class='failure'>".$this->session->flashdata('errorcat')."</div>";
				}
				if ($this->session->flashdata('message'))
				{
					echo "<div class='pansucess'>".$this->session->flashdata('message')."</div>";
				}
				if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				}?>
				<?php echo form_open('admins/category/add','name="form1" id="form1" enctype="multipart/form-data"'); ?>
					<table id="roottable" style="display:none;" cellpadding="5" cellspacing="0" border="0" width="100%" summary="" class="tblDisplay widthPc">
						
						<tr class="odd">
						    
							<td valign="top">Root Category </td>
							<td>
							 <? if($cat>0)
								 {?>
									<?=ucwords($category["category"]);?> 
									<input type="hidden" name="parentcat" id="parentcat" value="<?=$cat?>"/>
									<input type="hidden" name="level" value="<?php echo ($category['level']+1) ?>"/>
									<input type="hidden" name="parentcatname" id="parentcatname" value="<?=$category["category"]?>"/>
							   <?}
								else
								 {?>
								   Root
								   <input type="hidden" name="parentcat" id="parentcat" value="0"/>
								   <input type="hidden" name="level" value="1"/>
								   <input type="hidden" name="parentcatname" id="parentcatname" value=""/>
							   <?}?>
							   
							</td>
						</tr>
						<tr class="odd">
							<td class="width130" valign="top">Category <span class="highlight">*</span> </td>
							<td>
								<input type="text" name="category" id="category1" class="required" style='width:500px' maxlength="200" minlength="2">
								<span id="errormessage" style="display:none; color:#ff0000">This Category is already exists<span>
							</td>
						</tr>

						<? if($cat==0)
							{?>
								<tr class="odd">
									<td class="width130" valign="top">Icon <span class="highlight">*</span></td>
									<td>
										<input type="file" id="image" name="image" class="required" accept=".png">
										
										[.png Only ] and [ Icon Size must be equal to 60px X 60px. ]  <br/>
										<div id="imagemsg"></div>
									</td>
								</tr>
						  <?}?>
						  
						   <? if($cat==0)
							{?>
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
						  <?}?>

						<tr class="odd">
							<td class="width130" valign="top">Sort Order <span class="highlight">*</span> </td>
							<td>
								<input type="text" name="sort_order" id="sort_order" maxlength="3" class="required digits" style='width:50px'>
							</td>
						</tr>
						
						<tr class="odd">
							<td >Is Active?</td>
							<td>  
								<?php $agreeCheck = array( 'name' => 'agreeCheck', 'id' => 'agreeCheck', 'value' => 'agree', 'checked' => set_checkbox('agreeCheck', 'agree', FALSE));
								echo form_checkbox($agreeCheck); ?> 
							</td>
						</tr>

						<tr class="odd">
							<td>&nbsp;</td>
							<td>
								<input type="image" src="<?php echo site_url('assets/admin/images/add.gif');?>" />
										
								<a href="javascript:TxtReset();" id="reset"><img src='<?php echo site_url('assets/admin/images/reset.gif');?>' /></a>
							
							<? if($cat>0)
								{?>
								  <a href="javascript:void(0);" onclick="closetable();"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>
							  <?}
							   else
							   {?>
								  <a href="javascript:void(0);" onclick="closetable();"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>
							   <?}?>
							</td>
						</tr>
					</table>
				<? echo form_close(); ?>
				<table cellpadding="0" width="100%" style="width:100%;" cellspacing="0" border="0" class='display tableStatic' id="example">
					<thead>
						<tr>
						    <? if($level==1)
							    {?>
								    <th></th>
									<th width="6%">Is Active</th>
									<th>Category</th>
									<th width="10%">Sort Order</th>
									<th width="10%">Action</th>
							  <?}
							   else
							    {?>
									<th></th>
									<th width="6%">Is Active</th>
									<th width="10%">Image</th>
									<th>Category</th>
									<th width="10%">Sort Order</th>
									<th width="10%">Action</th>
							  <?}?>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="dataTables_empty" colspan='2'>Loading data from server</td>
						</tr>
					</tbody>
				</table>
				<?if(count($category)!=0 && $category['level']==1){?>
					<div class="updatebutton" style="padding-top:10px;position:relative;float:right;margin-right:175px;">
						<input type="button" name="submit" Value="Update Sort Order" class="button-big margin_top" onclick="updatesortorder1()">
					</div>
				<? }
				else
				{?>
					<div class="updatebutton" style="padding-top:10px;position:relative;float:right;margin-right:185px;">
						<input type="button" name="submit" Value="Update Sort Order" class="button-big margin_top" onclick="updatesortorder1()">
					</div>
				<?}?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	function renderimage(data, type, full)
	{
		var value = "<a target='_blank' href='<?=site_url('userfiles/category/medium')?>/"+data+"'><img src='<?=site_url('userfiles/category/icon')?>/"+data+"' border='0'/></a>";
		if(data=="")
		{
			return "--";
		}
		else
		{
			return value;
		}
	}

	function rendercheckbox(data, type, full)
	{
		var data=full[1];
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
		var cat=full[8];
		var level=full[9];
		var str=full[3];
		var string= (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1)
		{
			return $1;
		});

		if(level=="2")
		{
			var value = string;
		}
		else
		{
			var value = "<a href='<? echo site_url('admins/category/index');?>"+'/'+full[0]+"'>"+string+"</a>";
		}
		return value;
	}
	
	function rendertextbox(data, type, full)
	{
		var str1 = full[4];
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
			url: "<?php echo site_url('admins/category/updatesort1');?>",
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
		if(unicode!=8)
		{
			if(unicode<48||unicode>57) 
			{
				if(unicode==9)
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
		var data = full[0];
		var level = full[9];

		var value = "<a href='<? echo site_url('admins/category/update');?>"+'/'+data+"' title='Edit'><img src='<?= site_url('assets/admin/images/editpng.png') ?>'/></a> | <a href='#' onclick='confirm_delete("+data+","+full[8]+");' title='Delete'><img src='<?= site_url('assets/admin/images/deletepng.png') ?>'/></a>";
		
		return value;
	}

	function confirm_delete(id,cat) 
	{
		var value= confirm('Are you sure you want to delete this Category?');
		if(value)
		{
			if(cat>0)
			{
				window.location = '<? echo site_url("admins/category/delete");?>'+"/"+id+"/"+cat;
			}
			else
			{
				window.location = '<? echo site_url("admins/category/delete");?>'+"/"+id;
			}
		}
	}


	$(document).ready(function() 
	{
		var level="<?=$level;?>";
		if(level==1)
		{
			$('#example').dataTable(
			{
				"bProcessing": true,
				//"bFilter":false,
				//"bServerSide": true,
				"aaSorting":[[0,'desc']],
				"aoColumns":[
					{ "bVisible":false, "bSearchable": false, "bSortable": false},
					{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender":rendercheckbox,"sClass": "center"},
					{ "bVisible":true,"bSearchable": true, "bSortable": true, "mRender": renderucwords},
					{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender": rendertextbox, "sClass": "center"},
					{ "bVisible":true,"bSearchable": false, "bSortable": false ,"mRender":renderaction, "sClass": "center"}
				],
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"sScrollX": "100%",
				"sScrollXInner": "100%",
				"bScrollCollapse": true,
				"sAjaxSource":"<?php echo site_url('admins/category/getdata');?>/<?=$cat?>"
				//"sDom": "<''f>t<'F'lp>"
			});
		}
		else
		{
			$('#example').dataTable(
			{
				"bProcessing": true,
				//"bFilter":false,
				//"bServerSide": true,
				"aaSorting":[[0,'desc']],
				"aoColumns":[
					{ "bVisible":false, "bSearchable": false, "bSortable": false},
					{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender":rendercheckbox,"sClass": "center"},
					{ "bVisible":true,"bSearchable": false, "bSortable": false, "mRender": renderimage,"sClass": "center"},
					{ "bVisible":true,"bSearchable": true, "bSortable": true, "mRender": renderucwords},
					{ "bVisible":true,"bSearchable": false, "bSortable": false , "mRender": rendertextbox, "sClass": "center"},
					{ "bVisible":true,"bSearchable": false, "bSortable": false ,"mRender":renderaction, "sClass": "center"}
				],
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"sScrollX": "100%",
				"sScrollXInner": "100%",
				"bScrollCollapse": true,
				"sAjaxSource":"<?php echo site_url('admins/category/getdata');?>/<?=$cat?>"
				//"sDom": "<''f>t<'F'lp>"
			});
		}
	});
</script>

<script>
var _URL = window.URL || window.webkitURL;

$("#image").change(function(e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
		img.onload = function() 
		{
			if(this.width != 60)
			{
				$("#imagemsg").show();
				document.getElementById("imagemsg").style.color = "red";
				$("#imagemsg").html('Icon size must be 60px X 60px');
				$("#flag").val(false);
				document.getElementById("image").value = "";
			}
			if(this.height != 60)
			{
				$("#imagemsg").show();
				document.getElementById("imagemsg").style.color = "red";
				$("#imagemsg").html('Icon size must be 60px X 60px');
				$("#flag").val(false);
				document.getElementById("image").value = "";
			}

			else
			{
				$("#flag").val(true);
				$("#imagemsg").hide();
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
	$("#image").change(function() 
	{
		var val = $(this).val();
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase())
		{
			case 'png':
        		$("#imagemsg").hide();
				break;
			default:
				$(this).val('');
				$("#imagemsg").show();
				document.getElementById("imagemsg").style.color = "red";
				$("#imagemsg").html('.png Only');
				break;
		}
	});
</script>