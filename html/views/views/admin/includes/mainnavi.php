<div id="header" class="printorder">
	<div class="topNav">
		<h2>
			<strong><a href="#" title="<?=ADMIN_TOPHEADER_SITENAME?>"><?=ADMIN_TOPHEADER_SITENAME?></a></strong>
		</h2>
		<ul>
			<li>
				<a href="#" title="<?=ADMIN_TOPHEADER_SITENAME?>">Welcome
				<span style="text-transform: capitalize;">
					<span id="LoginName2">Administrator</span>
				</span>
				</a>
				<span class="chngpwd">
					<a class="more" title="Change Password" style="text-align: center;" href="<?php echo site_url('admins/dashboard/changepassword');?>"
					  onclick="return hs.htmlExpand(this, { objectType: 'iframe',preserveContent:false, width:500, height:300 })">Change Password</a>
				</span>
				<a id="LoginStatus2" title="Logout" href="<?php echo site_url('admin/logout');?>" style="color:Brown;font-weight:bold;background: none; padding-right: 5px;">Logout</a>
			</li>
		</ul>
	</div>
	<input type="submit" name="ctl00$Button1" value="" id="Button1" style="display: none" />
		<div id="Div1">
			<a id="hyplogo">
				<img id="logo" src="<? echo site_url('assets/admin/images/logo.png');?>" width="" height="" />
			</a>
		</div>
	<div class="clear"></div>
	<ul id="priNavigation">
		<?$menu = $this->menu_m->get_menu();
		foreach($menu as $list)
		{ ?>
			<li class="<? if($webpagename==$list['webpagename']){echo "activePriNav";} ?>"><a href="<?php echo site_url('admins/'.$list['subwebpagename']);?>" id="a1"><span><strong><?=ucwords($list['maintitle'])?></strong></span></a></li>
		 <? } ?>
		<!--<li id="Dashboard" class="<? if($webpagename=="main"){echo "activePriNav";} ?>"><a href="<?php echo site_url('admins/dashboard');?>" id="a1"><span><strong>Dashboard</strong></span></a></li>

		<li id="homebanner" class="<? if($webpagename=="homebanner"){echo "activePriNav";} ?>"><a href="<?php echo site_url('admins/homebanner');?>" id="a4"><span><strong>Home Banner</strong></span></a></li>

		<li id="cms" class="<? if($webpagename=="cms"){echo "activePriNav";} ?>"><a href="<?php echo site_url('admins/cms');?>" id="a1"><span><strong>CMS</strong></span></a></li>

		<li id="certificate" class="<? if($webpagename=="certificate"){echo "activePriNav";} ?>"><a href="<?php echo site_url('admins/certificate');?>" id="a1"><span><strong>Certificate</strong></span></a></li>

		<li id="category" class="<? if($webpagename=="category"){echo "activePriNav";} ?>"><a href="<?php echo site_url('admins/category');?>" id="a1"><span><strong>Category</strong></span></a></li>

		<li id="product" class="<? if($webpagename=="product"){echo "activePriNav";} ?>"><a href="<?php echo site_url('admins/product');?>" id="a1"><span><strong>Product</strong></span></a></li>

		<li id="career" class="<? if($webpagename=="career"){echo "activePriNav";} ?>"><a href="<?php echo site_url('admins/career');?>" id="a1"><span><strong>Career</strong></span></a></li>

		<li id="news" class="<? if($webpagename=="news"){echo "activePriNav";} ?>"><a href="<?php echo site_url('admins/news');?>" id="a1"><span><strong>News</strong></span></a></li>

		<li id="faqs" class="<? if($webpagename=="faqs"){echo "activePriNav";} ?>"><a href="<?php echo site_url('admins/faqs');?>" id="a1"><span><strong>Faqs</strong></span></a></li>-->
	</ul>
	<div class="subNav"></div>
</div>