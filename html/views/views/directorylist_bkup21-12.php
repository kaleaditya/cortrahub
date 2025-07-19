<style type="text/css">
	.overlay-container {
      position: relative;
      width: 100%;
      height: 300px; /* Adjust the height as needed */
      background: url('your-background-image.jpg') center/cover no-repeat; /* Replace with your background image */
    }

    .black-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha (fourth) value for the desired opacity */
      display: flex;
      align-items: center;
      justify-content: center;
      color: rgba(255, 255, 255, 0.8); /* Adjust the alpha (fourth) value for the desired text opacity */
    }

    .text {
      text-align: center;
      font-size: 24px;
      /* Add other text styling properties as needed */
    }
</style>
<script>
    $(document).ready(function () {
		  
		var search_country=$("#search_country").val();
		var search_state=$("#search_state").val();
		var search_location=$("#search_location").val();
		var search_subcategory=$("#search_subcategory").val();
		var search_speciality=$("#search_speciality").val();
		var search_services=$("#search_services").val();
		var search_ages=$("#search_ages").val();
		var search_directoryname=$("#search_directoryname").val();
		var search_products=$("#search_products").val();

		pageurl = "<?php echo base_url('directorylist/directory_list/'.$slug)?>";
		
		$(".pagination > ul li a").on("click",function(e){
				e.preventDefault();				
				GetAjaxList(pageurl);
		});
		
		$('#loader').show();

		$.ajax({				
				type: "POST",
				url:pageurl,
				data: {search_location:search_location,search_subcategory:search_subcategory,search_speciality:search_speciality,search_services:search_services,search_products:search_products,search_country:search_country,search_state:search_state,search_ages:search_ages,search_directoryname:search_directoryname},
				success: function(data){
					$("#resultsfor").html(data.resultsfor);
					$("#ajaxBind").html(data.body);
					$(".pagination").html(data.pagination_link);
					$("html, body").animate({ scrollTop: 0 }, "slow");
				},
				complete: function(){
						 setTimeout( "$('#loader').hide();",200);
				 }
		});
    });

	function GetAjaxList(pageurl)
	{
			var search_country=$("#search_country").val();
			var search_state=$("#search_state").val();
			var search_location=$("#search_location").val();
			var search_subcategory=$("#search_subcategory").val();
			var search_subcategory=$("#search_subcategory").val();
			var search_speciality=$("#search_speciality").val();
			var search_services=$("#search_services").val();
			var search_ages=$("#search_ages").val();
			var search_directoryname=$("#search_directoryname").val();
			var search_products=$("#search_products").val();
			
			$('#loader').show();

			$.ajax({
				type: "POST",
				url:pageurl,
				data: {search_location:search_location,search_subcategory:search_subcategory,search_speciality:search_speciality,search_services:search_services,search_products:search_products,search_country:search_country,search_state:search_state,search_ages:search_ages,search_directoryname:search_directoryname},
				success: function(data){
					$("#resultsfor").html(data.resultsfor);
					$("#ajaxBind").html(data.body);
					$(".pagination").html(data.pagination_link);
					$("html, body").animate({ scrollTop: 0 }, "slow");
				},
				complete: function(){
						 setTimeout( "$('#loader').hide();",200);
				 }
				
			});
	}

	function GetAjaxfilterList()
	{
			var search_country=$("#search_country").val();
			var search_state=$("#search_state").val();
			var search_location=$("#search_location").val();
			var search_subcategory=$("#search_subcategory").val();
			var search_subcategory=$("#search_subcategory").val();
			var search_speciality=$("#search_speciality").val();
			var search_services=$("#search_services").val();
			var search_ages=$("#search_ages").val();
			var search_directoryname=$("#search_directoryname").val();
			var search_products=$("#search_products").val();

			//alert(search_location);
			
			$('#loader').show();
			parpage = "<?php echo base_url('directorylist/directory_list/'.$slug)?>";
			$.ajax({
				type: "POST",
				url:parpage,
				data: {search_location:search_location,search_subcategory:search_subcategory,search_speciality:search_speciality,search_services:search_services,search_products:search_products,search_country:search_country,search_state:search_state,search_ages:search_ages,search_directoryname:search_directoryname},
				success: function(data){
					$("#resultsfor").html(data.resultsfor);
					$("#ajaxBind").html(data.body);
					$(".pagination").html(data.pagination_link);
					$("html, body").animate({ scrollTop: 0 }, "slow");
				},
				complete: function(){
						 setTimeout( "$('#loader').hide();",200);
				 }
				
			});
	}

	function bindstate()
	{
		var search_country=$("#search_country").val();
		if(search_country != '')
		{
			$('#loader').show();
			$.ajax({
					type: "POST",
					url:"<? echo site_url('directorylist/ajaxbindstatelist');?>",
					data: {search_country:search_country},
					success: function(data){
						$("#search_state").html(data.statelist);
						$("#search_location").html(data.citylist);
						$("#search_state").select2('val','');
						$("#search_location").select2('val','');
					},
					complete: function(){
							 setTimeout( "$('#loader').hide();",200);
					 }
					
				});
		}
		else
		{
			$("#search_state").select2('val','');
			$("#search_location").select2('val','');
		}
	}

	function bindcity()
	{
		var search_state=$("#search_state").val();
		if(search_state != '')
		{
			$('#loader').show();
			$.ajax({
					type: "POST",
					url:"<? echo site_url('directorylist/ajaxbindcitylist');?>",
					data: {search_state:search_state},
					success: function(data){
						$("#search_location").html(data.citylist);
						$("#search_location").select2('val','');
					},
					complete: function(){
							 setTimeout( "$('#loader').hide();",200);
					 }
					
				});
		}
		else
		{
			$("#search_location").select2('val','');
		}
	}

	function GetAjaxclearallList()
	{
			$("#search_country").select2('val','');
			$("#search_state").select2('val','');
			$("#search_location").select2('val','');
			$("#search_subcategory").select2('val','');
			$("#search_subcategory").select2('val','');
			$("#search_speciality").select2('val','');
			$("#search_services").select2('val','');
			$("#search_ages").select2('val','');
			$("#search_directoryname").val('');
			$("#search_products").select2('val','');
            
			var search_country=$("#search_country").val();
			var search_state=$("#search_state").val();
			var search_location=$("#search_location").val();
			var search_subcategory=$("#search_subcategory").val();
			var search_subcategory=$("#search_subcategory").val();
			var search_speciality=$("#search_speciality").val();
			var search_services=$("#search_services").val();
			var search_ages=$("#search_ages").val();
			var search_directoryname=$("#search_directoryname").val();
			var search_products=$("#search_products").val();

			//alert(search_location);
			
			$('#loader').show();
			parpage = "<?php echo base_url('directorylist/directory_list/'.$slug)?>";
			$.ajax({
				type: "POST",
				url:parpage,
				data: {search_location:search_location,search_subcategory:search_subcategory,search_speciality:search_speciality,search_services:search_services,search_products:search_products,search_country:search_country,search_state:search_state,search_ages:search_ages,search_directoryname:search_directoryname},
				success: function(data){
					$("#resultsfor").html(data.resultsfor);
					$("#ajaxBind").html(data.body);
					$(".pagination").html(data.pagination_link);
					$("html, body").animate({ scrollTop: 0 }, "slow");
				},
				complete: function(){
						 setTimeout( "$('#loader').hide();",200);
				 }
				
			});
	}
</script>
<div class="bg_serch_fitter">
<div class="container">
    <?if(count($allcountry) || count($allstate) || count($allcity) || count($allsubcategory) || count($allspeciality) || count($allservices) || count($allproducts) || count($allages) )
				{?>
    <ul>
    <li><strong>Filter :</strong></li>
     

										<?if(count($allcountry))
											{?>
												<li>
													<select id="search_country" name="search_country" class="form-control myval searchselect" onchange="bindstate();">
													<option value="">By Country</option>
													<? foreach($allcountry as $row)
													{?>
													<option value="<?=$row['countryid']?>"><?=$row['country']?></option>
													<?}?>
													</select>
												</li>
										  <?}?>

										<?if(count($allstate))
											{?>
												<li>
													<select id="search_state" name="search_state" class="form-control myval searchselect" onchange="bindcity();">
													<option value="">By State</option>
													<? foreach($allstate as $row)
													{?>
													<option value="<?=$row['stateid']?>"><?=$row['state']?></option>
													<?}?>
													</select>
												</li>
										  <?}?>
										
										<?if(count($allcity))
											{?>
												<li>
													<select id="search_location" name="search_location" class="form-control myval searchselect" >
													<option value="">By City</option>
													<? foreach($allcity as $row)
													{?>
													<option value="<?=$row['cityid']?>" <?if(isset($search_location) && $search_location==$row['cityid']){?>selected<?}?>><?=$row['city']?></option>
													<?}?>
													</select>
												</li>
										  <?}?>
										
										<?if(count($allsubcategory))
											{?>
												<li>
													<select id="search_subcategory" name="search_subcategory" class="form-control myval searchselect" >
													<option value="">By Subcategory</option>
													<? foreach($allsubcategory as $row)
													{?>
													<option value="<?=$row['subcategoryid']?>"><?=$row['subcategory']?></option>
													<?}?>
													</select>
												</li>
										  <?}?>

										<?if(count($allspeciality))
											{?>
												<li>
													<select id="search_speciality" name="search_speciality" class="form-control myval searchselect" >
													<option value="">By Experience</option>
													<? foreach($allspeciality as $row)
													{?>
													<option value="<?=$row['specialityid']?>"><?=$row['speciality']?></option>
													<?}?>
													</select>
												</li>
										  <?}?>

										<?if(count($allservices))
											{?>
												<li>
													<select id="search_services" name="search_services" class="form-control myval searchselect" >
													<option value="">By Language</option>
													<? foreach($allservices as $row)
													{?>
													<option value="<?=$row['servicesid']?>"><?=$row['services']?></option>
													<?}?>
													</select>
												</li>
										  <?}?>

										  <?if(count($allages))
											{ ?>
												<li>
													<select id="search_ages" name="search_ages" class="form-control myval searchselect" >
													<option value="">By Age</option>
													<? foreach($allages as $row)
													{?>
													<option value="<?=$row['age']?>"><?=$row['agename']?></option>
													<?}?>
													</select>
												</li>
										  <? } ?>
										 
										<?if(count($allproducts))
											{?>
												<li>
													<select id="search_products" name="search_products" class="form-control myval searchselect" >
													<option value="">By Products</option>
													<? foreach($allproducts as $row)
													{?>
													<option value="<?=$row['productsid']?>"><?=$row['products']?></option>
													<?}?>
													</select>
												</li>
										  <?}?>

										<li>
											<input type="text" name="search_directoryname" id="search_directoryname" class="form-control" placeholder="By Name">
										</li>

										  <li class="li_part2 left5"><button id="filterbutton" onclick="GetAjaxfilterList();" class="btn btn_red">Filter</button></li>
										  <li class="li_part2 right_div"><button id="clearall" class="btn btn_bule" onclick="GetAjaxclearallList();">Clear</button></li>
								
    </ul>
    
				
			  <?}?>
    <div class="clear"></div>
    </div>
</div>
<div>
 <div class="padd_main">
	<div class="container">
		<div class="row">	
	
			<div class="col-xs-12 col-sm-12 col-md-9">
				<div id="ajaxBind"></div>                
				<div class="pagination"></div>
                <div class="clear"></div>
			</div>

			<?if(count($allfeatureddirectory))
			   {?>
			  
					<div class="col-xs-12 col-sm-12 col-md-3 pro-cat-related">
						<div class="related-articles bg_h4">
							<h4>Featured Listings<!--Featured Directory--></h4>					
						</div>
						<? foreach($allfeatureddirectory as $list)
							{
								$subcategory=$this->directory_fm->getsubcategorybydirectory($list['id']);
								?>
								<div class="article-listing paddleftrightnone">
									
										<div class="row f_360">
											<div class="col-xs-3 col-sm-3 col-md-5 block-1">
												<a href="<? echo site_url('directory_detail');?>/<?=$list['categoryslug'];?>/<?=$list['slug'];?>">
													<?if($list['image'] != "")
													{ ?>
														<img src="<?=site_url('userfiles/directorylist/resizeimage').'/'.$list['image']?>" alt="" class="img-responsive img-circle dib">
													<? }
													else
													{ ?>
														<img src="<?=site_url('assets/images/ifid_notavailable.jpg')?>" alt="" class="img-responsive img-circle dib">
													<? } ?>
												</a>
											</div>
											<div class="col-xs-9 col-sm-9 col-md-7 block-2 feture_name_box">
												<p class="bold"><?=ucwords($list['name'])?></p>
                                                <p>
													  <?=ucwords($list['category'])?>,
												</p>
                                                <p><?=ucwords($list['city']);?></p>
                                                <div><a href="<? echo site_url('directory_detail');?>/<?=$list['categoryslug'];?>/<?=$list['slug'];?>">Click here to know more</a></div>
											</div>
										</div>
									
								</div>
						  <?}?>
					</div>
					
		     <?}?>
		</div>
	</div>
     </div>
</div>