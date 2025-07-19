<?if(count($directorylist))
	{
		foreach($directorylist as $list)
		{
			$subcategory=$this->directory_fm->getsubcategorybydirectory($list['id']);
			$clss="";
			if($this->session->userdata('frontloggedin') == '1' && $this->session->userdata('intention_of_reg') =='2' && $list['isblock'] == 1)
			{
				$clss="";
			}
			elseif($this->session->userdata('frontloggedin') == '1' && $this->session->userdata('intention_of_reg') =='1' && $list['isblock'] == 1) {
				$clss="blockInfoSection";
			}elseif($this->session->userdata('frontloggedin') == '' && $list['isblock'] == 1)
			{
				$clss="blockInfoSection";	
			}
			?>
			<!-- <div <?php if($list['isblock'] == 1){ ?> class="blockInfoSection" <?php }?>> -->
			<div class="<?=$clss?>" >
			<div class="block_info">
				<div class="padd">
					<div><img src="<?=site_url('assets/images/lock.png')?>" alt="" class="img-responsive"></div>
					<strong>Profile Locked</strong>
					<p>This Profile has been locked by request<br> of the member. It can be seen only by<br> Production Houses or Casting Agencies registered with ATOM Directory</p>
				</div>
			</div>
				<div class="company-header">
					<div class="row mobile_570">
                        <div class="col-xs-4 col-sm-4 col-md-3 col-md-push-9 col-sm-push-8 col-xs-push-8 text-right comp-logo">
							<a href="<? echo site_url('directory_detail');?>/<?=$list['categoryslug'];?>/<?=$list['slug'];?>">
							<?if($list['image'] != "")
							{ ?>
								<img src="<?=site_url('userfiles/directorylist/resizeimage').'/'.$list['image']?>" alt="" class="img-responsive dib">
							<? }
							else
							{ ?>
								<img src="<?=site_url('assets/images/ifid_notavailable-128.jpg')?>" alt="" class="img-responsive dib">
							<? } ?>
							</a>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-9 col-md-pull-3 col-sm-pull-4 col-xs-pull-4">
							<p><span class="bold"><a href="<? echo site_url('directory_detail');?>/<?=$list['categoryslug'];?>/<?=$list['slug'];?>"><?=ucwords($list['name'])?></a></span><br>
							    
								   <?= ucwords($list['category'])?>,
								   <?= ucwords($list['city'])?>
							</p>
							<p><?=$list['shortdescription']?></p>
							<p style="color:red;"><a href="<? echo site_url('directory_detail');?>/<?=$list['categoryslug'];?>/<?=$list['slug'];?>">Read More</a></p>
						</div>
						
					</div>
				</div>
				<div class="company-description">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="company-contact-details">
                                <ul class="list_btm_area">
										<? if(isset($list['mobileno']) && $list['mobileno']!='')
										{
											if($this->session->userdata('frontloggedin') != "") 
											{ ?>
												<li>
													<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal2" data-id="<?=$list['mobileno']?>" id="openmobileno">
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

										<? if(isset($list['email']) && $list['email']!='')
										{ ?>
											<li>
												<a href="mailto:<?=$list['email']?>">
																<span class="glyphicon glyphicon-envelope icon-circle border border-dark-blue with-text"></span>Email</a>
											</li>
										<? } ?>

										<? if(isset($list['website']) && $list['website']!='')
										{?><li>
											<a href="<?=$list['website']?>" target="_blank">
															<span class="glyphicon glyphicon-globe icon-circle border border-dark-blue with-text"></span>Website</a></li>
										<?}?>
									
										<? if(isset($list['whatsup']) && $list['whatsup']!='')
										{
											if($this->session->userdata('frontloggedin') != "")
											{ ?>
												<li>
													<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal3" data-id="<?=$list['whatsup']?>" id="openwhatsapp">
																<span class="glyphicon glyphicon-phone icon-circle border border-dark-blue with-text"></span>Whatsapp</a>
												</li>
											<? }
											else
											{ ?>
												<li>
													<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal1">
																	<span class="glyphicon glyphicon-phone icon-circle border border-dark-blue with-text"></span></span>Whatsapp</a>
												</li>
											<? }
										} ?>

										<? if(isset($list['facebook']) && $list['facebook']!='')
										{?><li>
											<a href="<?=$list['facebook']?>" target="_blank">				<span class="glyphicon glyphicon-user icon-circle border border-dark-blue with-text"></span>Facebook/Instagram</a></li>
										<?}?>
										<?php if($this->session->userdata('frontloggedin') == '1' && $this->session->userdata('frontloggedin') != ""){
											$get_all_wishlist_data_userwise=$this->wishlist_fm->get_all_wishlist_data_userwise($list['id']);

											?>
											<form id="wishlist_form" method="post">
												<input type="hidden" name="user_id" value="<?=$this->session->userdata('id') ?>">
												<input type="hidden" name="wishlist_user_id" value="<?=$list['id']?>">
											</form>
											<?php if(!empty($get_all_wishlist_data_userwise)){ ?>
												<a href="javascript:void(0);" class="whislistbtn" onclick="remove_wishlist('<?=$list['id']?>','<?=$this->session->userdata('id')?>');"> Wishlisted </a>
											<?php }else
											{ ?>
												<a href="javascript:void(0);" class="whislistbtn" onclick="add_wishlist('<?=$list['id']?>','<?=$this->session->userdata('id')?>');"> Add to Wishlist </a>
											<?php }?>

										<?php }else{?>
											<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="whislistbtn" onclick="hideregisterdiv();">Add to Wish List</a>
										<?php }?>
									<!-- <a href=""><span class="glyph icon-youtube border border-dark-blue with-text"></span> Youtube</a> -->								
                                    </ul>
                                <div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
	  <?}
    }
  else
	{?>
	   <div class="alert alert-info">No Directory Available.</div>
  <?}?>