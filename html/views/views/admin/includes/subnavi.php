<?if($webpagename=='dashboard'){ ?>
		 <div id="order" class="subNav2  ">
			<ul>			
				<li class="leftMenuBorder" style="background-image: none;">
					<div id="order" class="menuOn">Welcome to <?=ADMIN_MENUHEADER_SITENAME?></div>
				</li>		
			</ul>
		</div>
<? } ?>
<?$menu = $this->menu_m->get_menu();
foreach($menu as $list)
{
	if($list['id']!=1)
	{
		if($webpagename==$list['webpagename'])
		{ ?>
			<div class="subNav2">
				<ul>
					<?$submenu = $this->menu_m->get_submenu($list['id']);
					foreach($submenu as $sub)
					{ ?>
						<li class="leftMenuBorder" style="background-image: none;">
								<a class="<? if($subwebpagename == $sub['subwebpagename']){echo "menuOn";} ?>" href="<?php echo site_url('admins/'.$sub['subwebpagename']);?>">Manage <?=ucwords($sub['subtitle'])?></a>
							</li>
					<? } ?>
				</ul>
			</div>
	 <? }
	}
} ?>
<!--<?if($webpagename=="homebanner"){ ?>
	<div id="homebanner" class="subNav2">
		<ul>
			<li class="leftMenuBorder" style="background-image: none;">
				<a id="homebanner" class="<? if($webpagename=="homebanner"){echo "menuOn";} ?>" href="<?php echo site_url('admins/homebanner');?>">Manage Home Banner</a>
			</li>
		</ul>
	</div>
<? } ?>
<?if($webpagename=="cms"){ ?>
	<div id="cms" class="subNav2">
		<ul>
			<li class="leftMenuBorder" style="background-image: none;">
				<a id="cms" class="<? if($webpagename=="cms"){echo "menuOn";} ?>" href="<?php echo site_url('admins/cms');?>">Manage Cms</a>
			</li>
		</ul>
	</div>
<? } ?>
<?if($webpagename=="certificate"){ ?>
	<div id="certificate" class="subNav2">
		<ul>
			<li class="leftMenuBorder" style="background-image: none;">
				<a id="certificate" class="<? if($webpagename=="certificate"){echo "menuOn";} ?>" href="<?php echo site_url('admins/certificate');?>">Manage Certificate</a>
			</li>
		</ul>
	</div>
<? } ?>
<? if($webpagename=='category'){ ?>
	 <div id="category" class="subNav2  ">
		<ul>			
			<li class="leftMenuBorder" style="background-image: none;">
				<a id="category" class="<? if($webpagename=="category"){echo "menuOn";} ?>" href="<?php echo site_url('admins/category');?>">Manage Category</a>
			</li>		
		</ul>
	</div>
<? } ?>
<? if($webpagename=='product'){ ?>
	 <div id="product" class="subNav2  ">
		<ul>			
			<li class="leftMenuBorder" style="background-image: none;">
				<a id="product" class="<? if($webpagename=="product"){echo "menuOn";} ?>" href="<?php echo site_url('admins/product');?>">Manage Product</a>
			</li>		
		</ul>
	</div>
<? } ?>
<? if($webpagename=='career'){ ?>
	 <div id="career" class="subNav2  ">
		<ul>			
			<li class="leftMenuBorder" style="background-image: none;">
				<a id="career" class="<? if($webpagename=="career"){echo "menuOn";} ?>" href="<?php echo site_url('admins/career');?>">Manage Career</a>
			</li>		
		</ul>
	</div>
<? } ?>
<? if($webpagename=='news'){ ?>
	 <div id="news" class="subNav2  ">
		<ul>			
			<li class="leftMenuBorder" style="background-image: none;">
				<a id="news" class="<? if($webpagename=="news"){echo "menuOn";} ?>" href="<?php echo site_url('admins/news');?>">Manage News</a>
			</li>		
		</ul>
	</div>
<? } ?>
<? if($webpagename=='faqs'){ ?>
	 <div id="faqs" class="subNav2  ">
		<ul>			
			<li class="leftMenuBorder" style="background-image: none;">
				<a id="faqs" class="<? if($webpagename=="faqs"){echo "menuOn";} ?>" href="<?php echo site_url('admins/faqs');?>">Manage Faqs</a>
			</li>		
		</ul>
	</div>
<? } ?>-->
<div class="clear"></div>