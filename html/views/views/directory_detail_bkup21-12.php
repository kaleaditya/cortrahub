<link rel="stylesheet" href="<?=site_url('assets/css/jquery.fancybox.css');?>" media="all" />
<link href="<?=site_url('assets/css/set1.css');?>" rel="stylesheet" />
<script src="<?=site_url('assets/js/jquery.fancybox.min.js');?>"></script>
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="display-block paddleftright15">
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-md-push-8 text-center">
			<div class="details-banner">
				<?if($directory['image'] != "")
				{ ?>
					<img src="<?=site_url('userfiles/directorylist/orignalimage').'/'.$directory['image']?>" alt="" class="img-responsive dib" />
				<? }
				else
				{ ?>
					<img src="<?=site_url('assets/images/ifid_notavailable.jpg')?>" alt="" class="img-responsive dib">
				<? } ?>

			</div>
			<div class="btnBlock"> 
			<?php if($this->session->userdata('frontloggedin') == '1' && $this->session->userdata('frontloggedin') != ""){
											$get_all_wishlist_data_userwise=$this->wishlist_fm->get_all_wishlist_data_userwise($directory['id']);

											?>
											<form id="wishlist_form" method="post">
												<input type="hidden" name="user_id" value="<?=$this->session->userdata('id') ?>">
												<input type="hidden" name="wishlist_user_id" value="<?=$directory['id']?>">
											</form>
											<?php if(!empty($get_all_wishlist_data_userwise)){ ?>
												<a href="javascript:void(0);" class="whislistbtn" onclick="remove_wishlist('<?=$directory['id']?>','<?=$this->session->userdata('id')?>');"> Wishlisted </a>
											<?php }else
											{ ?>
												<a href="javascript:void(0);" class="whislistbtn" onclick="add_wishlist('<?=$directory['id']?>','<?=$this->session->userdata('id')?>');"> Add to Wishlist </a>
											<?php }?>

										<?php }else{?>
											<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="whislistbtn" onclick="hideregisterdiv();">Add to Wish List</a>
										<?php }?>
			<a href="<?php echo site_url('directorylist/'.$category);?>"  class="backBtn"> Back to Listing Page </a> </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-md-pull-4">
			<div>
				<div class="company-header">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-7">
							<a href="">
								<div><h1 class="title"><?=ucwords($directory['name']);?></h1><br>
								<!-- <?=ucwords($directory['state']);?>, -->
								<?=ucwords($directory['category']);?>,
								 <?=ucwords($directory['city']);?></div>
							</a>
						</div>
					</div>
				</div>
				<div class="company-description detail_page">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="company-content paddleftrightnone paddbtn0">
                                <div class="min_height1 paddleftright15">
								<p><?=$directory['shortdescription']?></p>
                                </div>
								<!--<div class="cell last-cell">
									<div class="contact-legal-id contact-legal-id-search">
									
									</div>
								</div>-->
								<div class="row no-left-right-margin poi-and-body paddbtm_detail">
                                    <ul class="list_btm_area">
                                    	<? if(isset($directory['mobileno']) && $directory['mobileno']!='')
										{
											if($this->session->userdata('frontloggedin') != "") 
											{ ?>
												<li>
													<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal2" data-id="<?=$directory['mobileno']?>" id="openmobileno">
															<span class="glyphicon glyphicon-phone icon-circle border border-dark-blue with-text"></span>Mobile</a>
												</li>
											<? }
											else
											{ ?>
												<li>
													<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal1">
																	<span class="glyphicon glyphicon-earphone icon-circle border border-dark-blue with-text"></span>Mobile</a>
												</li>
											<? }
										} ?>
									

										<? if(isset($directory['email']) && $directory['email']!='')
										{ ?>
											<li>
												<a href="mailto:<?=$directory['email']?>">
												<span class="glyphicon glyphicon-envelope icon-circle border border-dark-blue with-text"></span>Email</a>
											</li>
										<? } ?>

										<? if(isset($directory['website']) && $directory['website']!='')
										{?><li>
											<a href="<?=$directory['website']?>" target="_blank">
											<span class="glyphicon glyphicon-globe icon-circle border border-dark-blue with-text"></span>Website</a></li>
										<?}?>
									
										<? if(isset($directory['whatsup']) && $directory['whatsup']!='')
										{
											if($this->session->userdata('frontloggedin') != "")
											{ ?>
												<li>
													<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal3" data-id="<?=$directory['whatsup']?>" id="openwhatsapp">
													<span class="glyphicon glyphicon-phone icon-circle border border-dark-blue with-text"></span>Whatsapp</a>
												</li>
											<? }
											else
											{ ?>
												<li>
													<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal1">
													<span class="	glyphicon glyphicon-phone icon-circle border border-dark-blue with-text"></span>Whatsapp</a>
												</li>
											<? }
										} ?>

										<? if(isset($directory['facebook']) && $directory['facebook']!='')
										{?><li>
											<a href="<?=$directory['facebook']?>" target="_blank"><span class="glyphicon glyphicon-user icon-circle border border-dark-blue with-text"></span>Facebook/Instagram</a></li>
										<?}?>
                                    </ul>
                                    <div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
            </div>
            </div>
        
        </div>
        		
	</div>
</div>
<div class="container paddtab">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="details-block white-block">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 tab-head">
						<div>
							<div class="tabFlex">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#aboutus" aria-controls="aboutus" data-toggle="tab">About</a></li>
								<? if(count($allproducts) > 0 || count($allservices) > 0)
								   {?>
										<li><a href="#productandservice" aria-controls="productandservice" data-toggle="tab">Products and Services</a></li>
								 <?}?>
								<? if(count($allspeciality))
								   {?>
										<li><a href="#speciality" aria-controls="speciality" data-toggle="tab">Languages</a></li>
								 <?}?>

								<? if(count($allphotogallery))
								   {?>
										<li><a href="#photogallery" aria-controls="photogallery" data-toggle="tab">Photo Gallery</a></li>
								 <?}?>
								
								<? if(count($allvideogallery))
								   {?>
										<li><a href="#videogallery" aria-controls="videogallery" data-toggle="tab">Video Gallery</a></li>
								 <?}?>

							    <? if(count($alldocument))
								   {?>
										<li><a href="#download" aria-controls="download" data-toggle="tab">Downloads</a></li>
								 <?}?>
							</ul>
							<?php if($this->session->userdata('frontloggedin') == '1'  && $this->session->userdata('frontloggedin') != ""){
											$get_all_wishlist_data_userwise=$this->wishlist_fm->get_all_wishlist_data_userwise($directory['id']);

											?>
											<form id="wishlist_form" method="post">
												<input type="hidden" name="user_id" value="<?=$this->session->userdata('id') ?>">
												<input type="hidden" name="wishlist_user_id" value="<?=$directory['id']?>">
											</form>
											<?php if(!empty($get_all_wishlist_data_userwise)){ ?>
												<a href="javascript:void(0);" class="whislistbtn" onclick="remove_wishlist('<?=$directory['id']?>','<?=$this->session->userdata('id')?>');"> Wishlisted </a>
											<?php }else
											{ ?>
												<a href="javascript:void(0);" class="whislistbtn" onclick="add_wishlist('<?=$directory['id']?>','<?=$this->session->userdata('id')?>');"> Add to Wishlist </a>
											<?php }?>

										<?php }else{?>
											<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="whislistbtn" onclick="hideregisterdiv();">Add to Wish List</a>
										<?php }?>
							</div>
							
							<div class="tab-content">

								<div class="tab-pane active" id="aboutus">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 block-1">
											<?=$directory['description']?>		
										</div>
										
									</div>
								</div>

								<? if(count($allproducts) > 0 || count($allservices) > 0)
								   {?>
										<div class="tab-pane" id="productandservice">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 block-1">
												   <? if(count($allproducts))
														{?>
															<p class="bold">Products</p>
															<ul class="item-list">
															   <? foreach($allproducts as $list)
																	{?>
																		<li><span class="glyph icon-tick with-text"></span><?=ucwords($list['productname'])?></li>
																  <?}?>
															</ul>
															<br />
													  <?}?>
												
												   <? if(count($allservices) > 0)
														{?>
															<p class="bold">Services</p>
															<ul class="item-list">
																<? foreach($allservices as $list)
																	{?>
																		<li><span class="glyph icon-tick with-text"></span><?=ucwords($list['servicename'])?></li>
																  <?}?>
															</ul>
															<br />
													  <?}?>
												</div>
											</div>
										</div>
								 <?}?>

								<? if(count($allspeciality))
								   {?>
										<div class="tab-pane" id="speciality">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 block-1">
												   <? if(count($allspeciality))
														{?>
															<p class="bold">Languages Known</p>
															<ul class="item-list">
															   <? foreach($allspeciality as $list)
																	{?>
																		<li><span class="glyph icon-tick with-text"></span><?=ucwords($list['specialityname'])?></li>
																  <?}?>
															</ul>
															<br />
													  <?}?>
												</div>
											</div>
										</div>
								 <?}?>

							    <? if(count($allphotogallery))
								   {?>
										<div class="tab-pane photogallery_area" id="photogallery">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 block-1">
												   <div class="photo-gallery">
                                                       <div class="row">
                                                           <? foreach($allphotogallery as $list)
																{?>
                                                       <div class="col-md-4 col-sm-4 col-xs-4">
                                                           <div class="gallery-photo">
                                                               <table>
                                                               <tr>
                                                                   <td><figure class="gal-photo">  <a data-fancybox="gallery" href="<?=site_url('userfiles/gallery/photo/main').'/'.$list['image']?>"><img src="<?=site_url('userfiles/gallery/photo/medium').'/'.$list['image']?>" alt='' /></a></figure></td>
                                                                   </tr>
                                                               </table>
																	  
														</div>
                                                           </div>
                                                           <?}?>
                                                       </div>
														
												   </div>
												</div>
											</div>
										</div>
								 <?}?>

								<? if(count($allvideogallery))
								   {?>
										<div class="tab-pane" id="videogallery">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 block-1">
													<div class="video-gallery">
														<div class="row">
															<?foreach($allvideogallery as $list)
																{?>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
																	<div class="video-lst">
																	  <div class="video-row">
																		<iframe allowfullscreen="allowfullscreen" width="100%" height="290" frameborder="0" src="<?echo str_replace("watch?v=", "embed/", $list["video"]);?>"></iframe>
																	  </div>
																	
                                                                </div>
                                                                </div>
															  <?}?>
														</div>
													</div>
												</div>
											</div>
										</div>
								 <?}?>

								
								<? if(count($alldocument))
								   {?>
										<div class="tab-pane" id="download">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 block-1">
													<ul class="caseList">
														<? foreach($alldocument as $list)
															{?>
																<li>
																	<div class="caseBlock">
																		<?=$list["title"]?>
																		<div class="downloadBlock"><a target="_blank" href="<?php echo site_url('userfiles/directorylist/document/'.$list["document"]);?>" class="btn btnDownload hvr-rectangle-out"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Download Now</a></div>
																	</div>
																</li>
														  <?}?>
												</div>
											</div>
										</div>
								 <?}?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<? if(isset($directory['facebook']) && $directory['facebook']!='')
				{?>
					<!--<div class="white-block">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 fb-block blue">
								<a href="<?=$directory['facebook']?>" target="_blank"><p class="bold"><span class="glyph icon-facebook"></span> Find us on Facebook</p></a>
							</div>
						</div>
					</div>-->
			  <?}?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 detailsbig-logo">
			<div class="white-block">
				<img src="<?=site_url('assets/img/advert.jpg')?>" alt="advertisement" class="img-responsive dib" />
			</div>
		</div>
		<?if(count($allrelateddirectory))
		   {?>
				<div class="col-xs-12 col-sm-12 col-md-3">
					<div class="feature_listing">
					<div class="related-articles bg_h4">
						<h4>Related Listings</h4>					
					</div>
					<? foreach($allrelateddirectory as $list)
						{
							$subcategory=$this->directory_fm->getsubcategorybydirectory($list['id']);
							?>
							<div class="article-listing paddleftrightnone">
								
									<div class="row f_360">
										<div class="col-xs-3 col-sm-3 col-md-5 block-1">
											<a href="<? echo site_url('directory_detail');?>/<?=$list['categoryslug'];?>/<?=$list['slug'];?>">
												<?if($list['image'] != "")
												{ ?>
													<img src="<?=site_url('userfiles/directorylist/resizeimage').'/'.$list['image']?>" alt="" class="img-responsive dib feature_img_box">
												<? }
												else
												{ ?>
													<img src="<?=site_url('assets/images/ifid_notavailable.jpg')?>" alt="" class="img-responsive dib feature_img_box">
												<? } ?>
											</a>
										</div>
										<div class="col-xs-9 col-sm-9 col-md-7 block-2 feture_name_box">
											<p class="bold"><?=ucwords($list['name'])?></p>
											<p>
												<!-- <? if(count($subcategory))
													{
														foreach($subcategory as $list1)
															{?>
																<?=ucwords($list1['subcategory'])?>,
														  <?}
													}
												  else
													{?>
													   <?=$list['category']?>
												  <?}?> -->
												   <?= ucwords($list['category'])?>,
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