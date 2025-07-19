<link href="<? echo site_url('assets/css/select2.css');?>" rel="stylesheet">
<script src="<? echo site_url('assets/js/select2/select2.js');?>"></script>
<div class="col-xs-12 col-sm-12 col-md-12 listing-body" >
	<div class="row search-results">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="filter_div">
				<p class="pull-left"><span class="bold">Filter :</span></p>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 block-1">
			<div class="specail_div">

					<?if(count($allcountry))
						{?>
							<div>
								<select id="search_country" name="search_country" class="form-control myval searchselect" >
								<option value="">By Country</option>
								<? foreach($allcountry as $row)
								{?>
								<option value="<?=$row['countryid']?>"><?=$row['country']?></option>
								<?}?>
								</select>
							</div>
					  <?}?>

					<?if(count($allstate))
						{?>
							<div>
								<select id="search_state" name="search_state" class="form-control myval searchselect" >
								<option value="">By State</option>
								<? foreach($allstate as $row)
								{?>
								<option value="<?=$row['stateid']?>"><?=$row['state']?></option>
								<?}?>
								</select>
							</div>
					  <?}?>
					
					<?if(count($allcity))
						{?>
							<div>
								<select id="search_location" name="search_location" class="form-control myval searchselect" >
								<option value="">By City</option>
								<? foreach($allcity as $row)
								{?>
								<option value="<?=$row['cityid']?>" <?if(isset($search_location) && $search_location==$row['cityid']){?>selected<?}?>><?=$row['city']?></option>
								<?}?>
								</select>
							</div>
					  <?}?>
					
					<?if(count($allcategory))
						{?>
							<div>
								<select id="search_category" name="search_category" class="form-control myval searchselect" >
								<option value="">By Category</option>
								<? foreach($allcategory as $row)
								{?>
								<option value="<?=$row['id']?>" <?if(isset($search_name) && $search_name==$row['id']){?>selected<?}?>><?=$row['category']?></option>
								<?}?>
								</select>
							</div>
					  <?}?>

					<?if(count($allspeciality))
						{?>
							<div>
								<select id="search_speciality" name="search_speciality" class="form-control myval searchselect" >
								<option value="">By Language</option>
								<? foreach($allspeciality as $row)
								{?>
								<option value="<?=$row['specialityid']?>"><?=$row['speciality']?></option>
								<?}?>
								</select>
							</div>
					  <?}?>

					<?if(count($allservices))
						{?>
							<div>
								<select id="search_services" name="search_services" class="form-control myval searchselect" >
								<option value="">By Services</option>
								<? foreach($allservices as $row)
								{?>
								<option value="<?=$row['servicesid']?>"><?=$row['services']?></option>
								<?}?>
								</select>
							</div>
					  <?}?>
					 
					<?if(count($allproducts))
						{?>
							<div>
								<select id="search_products" name="search_products" class="form-control myval searchselect" >
								<option value="">By Products</option>
								<? foreach($allproducts as $row)
								{?>
								<option value="<?=$row['productsid']?>"><?=$row['products']?></option>
								<?}?>
								</select>
							</div>
					  <?}?>

					  <div><button id="filterbutton" onclick="GetAjaxfilterList();" class="btn">Filter</button></div>
					  <div><button id="clearall" class="btn">Clear All</button></div>
			</div>
		</div>
	</div>
</div>