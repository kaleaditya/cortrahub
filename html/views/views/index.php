<script>
$().ready(function()
	{
		$("#frmsearch").validate();
	});
</script>
<div class="top-section">
	<div class="container listing-block">
        <div class="ipad_center topright">
            <div class="login_top">
                <ul><? if($this->session->userdata('frontloggedin'))
		{ ?>
			<li class="bgcolor firstli" <?if($websitepagename=="profile"){?> class="active" <? } ?>>
				<a href="<? echo site_url("Profile"); ?>" >My Profile </a><span>|</span>
			</li>
			<li class="bgcolor">
				<a href="<?php echo site_url('Signin/signout'); ?>"> Log out </a>
			</li>
		<? }
		else
		{ ?>
			
			<li><a href="#"><span class="glyphicon glyphicon-phone"></span> &nbsp;  Whatsapp : +971 522656679</a></li><li><a href="#"><span class="glyphicon glyphicon-earphone"></span> &nbsp; Call Us : +971 522656679</a></li>
        	<li><a href="mailto:sales@dbuguae.com"><span class="glyphicon glyphicon-envelope"></span>&nbsp; Email: info@atomdirectory.com</a></li>
        	<li class="green">
				<!--<a href="<? echo site_url('Registration')?>" class="reg">Registration</a> <span>/</span> -->
				<a href="#" data-toggle="modal" data-target="#myModal" class="log btn_login" onclick="hideregisterdiv();">Registration <span>/</span> Log in</a>
			</li>
		<? } ?></ul>
                <div class="clear"></div>
            </div>
   
	<div class="clear"></div>
            </div>
        <div class="clear"></div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<div class="logo"><img src="<? echo site_url('assets/img/pathway.png');?>" alt="" class="img-responisve dib" /></div>
			</div>
		</div>
		<div class="row search-section">
			<div class="col-xs-12 col-sm-12 col-md-12 text-center block-1">

				<? if($this->session->userdata('frontloggedin') == ""){?><div class="bannerBtn"><a href="#" data-toggle="modal" data-target="#myModal" class="log btn_login" onclick="hideregisterdiv();">Registration <span>/</span> Log in</a> </div><?php } ?>

				<?php echo form_open('searchpost','name="frmsearch" id="frmsearch" enctype="multipart/form-data" class="form-inline"'); ?>
					<div class="form-group">
					    <?
						   $allcategory = $this->dashboard_fm->get_all_category();
						   //$allsubcategory = $this->dashboard_fm->get_all_subcategory();
						?>
					    <select id="search_name" name="search_name" class="form-control myval required">
							 <option value="">You are searching for...</option>
							 <?if(count($allcategory))
								{
									foreach($allcategory as $row)
									  {?>
									   <option value="<?=$row['id']?>"><?=$row['category']?></option>
									<?}
								}?>
							  <?/*if(count($allsubcategory))
							    {
									foreach($allsubcategory as $row)
									  {?>
									   <option value="<?=$row['id']?>"><?=$row['category']?></option>
									<?}
								}*/?>
						</select>
					    <!-- <input type="text" id="search_name" name="search_name" list="searchcategory" class="form-control" placeholder="You are searching for..." autocomplete="off"> -->
					</div>
					<div class="form-group has-success has-feedback">
					    <?
						   $allcity = $this->dashboard_fm->get_all_city();
						?>
					    <select id="search_location" name="search_location" class="form-control myval">
							 <option value="">Locations</option>
							 <?if(count($allcity))
								{
									foreach($allcity as $row)
									  {?>
									   <option value="<?=$row['cityid']?>"><?=$row['city']?></option>
									<?}
								}?>
						</select>
					    <!-- <input type="text" id="search_location" name="search_location" list="searchlocation" class="form-control" placeholder="Locations" autocomplete="off"> -->

						<!-- <span class="glyphicon glyphicon-ok form-control-feedback"></span> -->
					</div>
					
					<button type="submit" class="btn">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</form>
			</div>
			<br /><br /><br /><br /><br />
		</div>
	
</div>

<? if(count($rootcategory))
    {?>
		<div class="category">
			<div class="popular-searches-slider-container">
				<div class="container">
				    <? foreach($rootcategory as $list)
						{?>
							<div class="rsThumb">
								<div class="icon-container">
									<a href = "<? echo site_url('directorylist');?>/<?=$list['slug'];?>">
										<img src="<? echo site_url('userfiles/category/icon/');?><?=$list['image'];?>">
									</a>
									<p class="icon-title"><?=ucwords($list['category']);?></p>
								</div>
							</div>
					  <?}?>
			    </div>
		    </div>
		</div>
  <?}?>