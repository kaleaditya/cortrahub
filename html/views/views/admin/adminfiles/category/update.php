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
		var id = '<? echo $category['id']?>';
		var category = $('#category1').val();
		var flag=true;

		$.ajax(
		{
			  type : "POST",
			  url:"<?php echo site_url('admins/category/checkcategorybyid');?>",
			  data : {'id':id,'category': category},
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
			  }
		});
		return flag;
	}
</script>
<div id="main">
	<div id="globalTabContent">
		<ul class="tabs-nav">
			<li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
			<li>
				<? if($category['cat']>0)
				{ ?>
					<a href="<?php echo site_url('admins/category/index');?>/<?=$category['cat']?>" class="button-big">Back to List View</a>
				<?}
				else
				{ ?>
					<a href="<?php echo site_url('admins/category/index');?>" class="button-big">Back to List View</a>
				<?}?>
			</li>
		</ul>
		<div id="tab-1" class="tabs-container">
			<div class="globalContainer">
				<?if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				}?>
				<?php echo form_open('admins/category/update','name="form1" id="form1" enctype="multipart/form-data"'); ?>
					<table  border="0" cellpadding="5" cellspacing="1" width="100%" class="tblDisplay widthPc">	
						<tr class="odd">
							<td class="width130" valign="top">Root Category</td>
							<td> 
								<?if($category["cat"]==0) {echo "Root";} else {echo $category["parentcatname"]; }?>
								<input type="hidden" name="parentcatname" id="parentcatname" value="<?=$category["parentcatname"]?>"/>
							</td>
						</tr>

						
						<tr class="odd">
							<td class="width130" valign="top">Category <span class="highlight">*</span> </td>
							<td>
								<input type="text" id="category1" name="category" class="required" minlength="2" maxlength="200" value="<?=$category['category']?>" style='width:500px'>
								<span id="errormessage" style="display:none; color:#ff0000">This Category is already exists<span>
							</td>
						</tr>

						<?if($category["cat"]==0) 
							{?>
								<tr class="odd">
									  <?
										$required="required";
										$star="*";
										if($category['image']!="") 
										{
											$required="";
											$star="";	
										}
									  ?>
									<td class="width130" valign="top">Image <span class="highlight"><?=$star?></span></td>
									<td>
										<?if($category['image']!="") 
											{
												echo "<img src='".base_url('userfiles/category/icon')."/".$category['image']."' border='0'/>"; 
											}
										  ?>
										<input type="file" id="image" name="image" class="<?=$required?>" accept=".png">
										
										[.png Only ] and [ Icon Size must be equal to 60px X 60px. ]  <br/>
										<div id="imagemsg"></div>
										<input type="hidden" id="image1" name="image1" value='<? echo $category['image']; ?>' />
									</td>
								</tr>
						  <?}?>
					
					    <? if($category["cat"]==0)
							{?>
								<tr class="odd">
									<td class="width130" valign="top">Page Title <span class="highlight"></span></td>
									<td>
										<input type="text" id="pagetitle" name="pagetitle" class="" maxlength="200" minlength="2" style='width:500px'  value="<?=$category['pagetitle']?>">
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Title <span class="highlight"></span></td>
									<td>
										<input type="text" id="metatitle" name="metatitle" class="" maxlength="200" minlength="2" style='width:500px' value="<?=$category['metatitle']?>" >
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Keywords <span class="highlight"></span></td>
									<td>
										<input type="text" id="metakeyword" name="metakeyword" class="" maxlength="200" minlength="2" style='width:500px' value="<?=$category['metakeyword']?>">
									</td>
								</tr>
								<tr class="odd">
									<td class="width130" valign="top">Meta Description <span class="highlight"></span></td>
									<td>
										<textarea name="metadesc" id="meta_keyword" class="" maxlength="500" style='width:500px;height:150px;'><?=$category['metadesc']?></textarea>
									</td>
								</tr>
						  <?}?>

						<tr class="odd">
							<td class="width130" valign="top">Sort Order <span class="highlight">*</span> </td>
							<td>
								<input type="text" id="sort_order" name="sort_order" class="required digits" maxlength="3" value="<?=$category['sort_order']?>" style="width:50px;">
							</td>
						</tr>

						<tr class="odd">
							<td class="width130" valign="top">Is Active?</td>
							<td>
								<?$agreeCheck = array(
									'name' => 'agreeCheck',
									'id' => 'agreeCheck', 
									'value' => 'agree', 
									'checked' => (($category['isactive']=='0')?false:true) 
								); 
								echo form_checkbox($agreeCheck);?>
							</td>
						</tr>

						<tr class="odd">
							<td></td>
							<td>
								<input type="image" src="<?php echo site_url('assets/admin/images/save.gif');?>"/>
								<? if($category['cat']>0)
								{?>
									<a href="<?php echo site_url('admins/category/index');?>/<?=$category['cat']?>"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>
								<?}
								else
								{?>
									<a href="<?php echo site_url('admins/category/index');?>"><img src='<?php echo site_url('assets/admin/images/cancel.gif');?>' /></a>
								<?}?>
								<input type="hidden" name="id" id="id" value="<?=$category['id']?>" />
								<input type="hidden" name="cat" id="cat" value="<?=$category['cat']?>" />
							</td>
						</tr> 
					</table>
				<? echo form_close(); ?> 
			</div>
		</div>
	</div>
</div>

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