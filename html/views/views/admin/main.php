<div id="main">
	<div class="curvedMainBox">
		<div class="dashBoard">
			<div class="dashBoardMainContainer">
				<div class="dashBoardLeft" style="width: 100%">
					<h3><strong>Admin Control Panel</strong></h3>
					<?$menu = $this->menu_m->get_menu();
					if(count($menu)>0)
					{
						foreach($menu as $list)
						{	
							if($list['id']!=1)
							{ ?>
								<div class="dashBoardSections">
									<div class="dashBoardIcons" style="width:53px;">
										<img src="<? echo site_url('assets/admin/img/icons/'.$list['image']);?>" alt="Manage <?=ucwords($list['maintitle'])?>" />
									</div>
									<div class="dashBoardNav">
										<h4>
											<strong>
												<a href="<? echo site_url('admins/'.$list['subwebpagename']);?>"><?=ucwords($list['maintitle'])?></a>
											</strong>
										</h4>                                
										<ul>                                    
											<li class="subItems"><strong>Subitems:</strong></li>
											<?$submenu = $this->menu_m->get_submenu($list['id']);
											foreach($submenu as $sub)
											{ ?>
												<li class="logOut" style="background-image: none;">
														<a id="hyppenorder" href="<? echo site_url('admins/'.$sub['subwebpagename']);?>">Manage <?=ucwords($sub['subtitle'])?></a>
													</li>
											<? } ?>
										</ul>
									</div>
								</div>
							<? }
						} 
					}?>
					<!--<div class="dashBoardSections">
						<div class="dashBoardIcons" style="width:53px;">
							<img src="<? echo site_url('assets/admin/img/icons/home_banner.png');?>" alt="Manage Homebanner" />
						</div>
						<div class="dashBoardNav">
							<h4>
								<strong>
									<a href="<? echo site_url('admins/homebanner/');?>">Home Banner</a>
								</strong>
							</h4>                                
							<ul>                                    
								<li class="subItems"><strong>Subitems:</strong></li>
								<li class="logOut" style="background-image: none;">
									<a id="hyppenorder" href="<? echo site_url('admins/homebanner/');?>">Manage Home Banner</a>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="dashBoardSections">
						<div class="dashBoardIcons" style="width:53px;">
							<img src="<? echo site_url('assets/admin/img/icons/cms.png');?>" alt="Manage Registrations" />
						</div>
						<div class="dashBoardNav">
							<h4>
								<strong>
									<a href="<? echo site_url('admins/aboutus/');?>">CMS</a>
								</strong>
							</h4>                                
							<ul>                                    
								<li class="subItems"><strong>Subitems:</strong></li>
								
								<li class="logOut" style="background-image: none;">
									<a id="hyppenorder" href="<? echo site_url('admins/aboutus/');?>">Manage About us</a>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="dashBoardSections">
						<div class="dashBoardIcons" style="width:53px;">
							<img src="<? echo site_url('assets/admin/img/icons/certificate.png');?>" alt="Manage Certification" />
						</div>
						<div class="dashBoardNav">
							<h4>
								<strong>
									<a href="<? echo site_url('admins/certificate/');?>">Certificate</a>
								</strong>
							</h4>                                
							<ul>                                    
								<li class="subItems"><strong>Subitems:</strong></li>
								<li class="logOut" style="background-image: none;">
									<a id="hyppenorder" href="<? echo site_url('admins/certificate/');?>">Manage Certificate</a>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="dashBoardSections">
						<div class="dashBoardIcons" style="width:53px;">
							<img src="<? echo site_url('assets/admin/img/icons/category.png');?>" alt="Manage Category" />
						</div>
						<div class="dashBoardNav">
							<h4>
								<strong>
									<a href="<? echo site_url('admins/category');?>">Category</a>
								</strong>
							</h4>                                
							<ul>                                    
								<li class="subItems"><strong>Subitems:</strong></li>
								<li class="logOut" style="background-image: none;">
									<a id="hyppenorder" href="<? echo site_url('admins/category');?>">Manage Category</a>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="dashBoardSections">
						<div class="dashBoardIcons" style="width:53px;">
							<img width="40px" src="<? echo site_url('assets/admin/img/icons/product.png');?>" alt="Manage Product" />
						</div>
						<div class="dashBoardNav">
							<h4>
								<strong>
									<a href="<? echo site_url('admins/product');?>">Product</a>
								</strong>
							</h4>                                
							<ul>                                    
								<li class="subItems"><strong>Subitems:</strong></li>
								<li class="logOut" style="background-image: none;">
									<a id="hyppenorder" href="<? echo site_url('admins/product');?>">Manage Product</a>
								</li>
							</ul>
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</div>
</div>