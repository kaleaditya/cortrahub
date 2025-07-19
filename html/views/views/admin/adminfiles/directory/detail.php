<div id="main">
        <div id="globalTabContent">
            <ul class="tabs-nav">
                <li class="tabs-selected"><a href="#tab-1"><span><strong><?=$title?></strong></span></a></li>
				<li>
					<a href="<?php echo site_url('admins/directorylist');?>" class="button-big">Back to List View</a>
                </li>				
                <li></li>
            </ul>
            <div id="tab-1" class="tabs-container">
                <div class="curveTop">
                </div>
                <div class="globalContainer">
				
                    <div id="PanGrid" class="PanGrid">
						<table  border="0" cellpadding="5" cellspacing="1" width="100%" class="tblDisplay widthPc">
						
						    <tr class="odd">
								<td class="width130" valign="top">Directory Name </td>
								<td><?=ucwords($detail['name'])?></td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Mobile No <span class="highlight"></span> </td>
								<td>
								  <? if($detail['mobileno']!='')
								       {?>
									      <?=$detail['mobileno']?>
									 <?}
									 else
									   {
										   echo "-";
									   }?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Email <span class="highlight"></span> </td>
								<td>
								  <? if($detail['email']!='')
								       {?>
									      <?=$detail['email']?>
									 <?}
									 else
									   {
										   echo "-";
									   }?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Facebook <span class="highlight"></span> </td>
								<td>
								  <? if($detail['facebook']!='')
								       {?>
									      <?=$detail['facebook']?>
									 <?}
									 else
									   {
										   echo "-";
									   }?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Website <span class="highlight"></span> </td>
								<td>
								  <? if($detail['website']!='')
								       {?>
									      <?=$detail['website']?>
									 <?}
									 else
									   {
										   echo "-";
									   }?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Whatsup <span class="highlight"></span> </td>
								<td>
								  <? if($detail['whatsup']!='')
								       {?>
									      <?=$detail['whatsup']?>
									 <?}
									 else
									   {
										   echo "-";
									   }?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Country </td>
								<td><?=$detail['country']?></td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">State </td>
								<td><?=$detail['state']?></td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">City </td>
								<td><?=$detail['city']?></td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Age </td>
								<td><?=$detail['agevalue']?></td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Gender </td>
								<td><?=$detail['gendervalue']?></td>
							</tr>



							<tr class="odd">
								<td class="width130" valign="top">Image</td>
								<td>
								    <? if($detail['image']!='')
								       {?>
									<img width="50px" height="50px" src="<?=base_url('userfiles/directorylist/resizeimage/'.$detail['image'])?>">
									<?}else{?>
										<img width='50px' height='50px' src='<?php echo base_url('assets/images/ifid_notavailable-128.jpg');?>'>

									<?}?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Category </td>
								<td><?=$detail['category']?></td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Sub Category </td>
								<td>
									<? if(count($directorysubcategory))
										{
											$i=1;
											foreach($directorysubcategory as $list)
											{
												if(Count($directorysubcategory) > $i)
												{
												  echo $list['subcategory']."</br>";
												}
												else
												{
												  echo $list['subcategory'];
												}
												$i++;
											}
										}
									   else
									    {
											echo "-";
										}?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Experience </td>
								<td>
									<? if(count($directoryspeciality))
										{
											$i=1;
											foreach($directoryspeciality as $list)
											{
												if(Count($directoryspeciality) > $i)
												{
												  echo $list['speciality']."</br>";
												}
												else
												{
												  echo $list['speciality'];
												}
												$i++;
											}
										}
									   else
									    {
											echo "-";
										}?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Language </td>
								<td>
									<? if(count($directoryservices))
										{
											$i=1;
											foreach($directoryservices as $list)
											{
												if(Count($directoryservices) > $i)
												{
												  echo $list['service']."</br>";
												}
												else
												{
												  echo $list['service'];
												}
												$i++;
											}
										}
									   else
									    {
											echo "-";
										}?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Others </td>
								<td>
									<? if(count($directoryproducts))
										{
											$i=1;
											foreach($directoryproducts as $list)
											{
												if(Count($directoryproducts) > $i)
												{
												  echo $list['product']."</br>";
												}
												else
												{
												  echo $list['product'];
												}
												$i++;
											}
										}
									   else
									    {
											echo "-";
										}?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Short Description</td>
								<td><?=$detail['shortdescription']?></td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Description</td>
								<td><?=$detail['description']?></td>
							</tr> 
							
							<tr class="odd">
								<td class="width130" valign="top">Page Title</td>
								<td>
									<? if($detail['pagetitle']!='')
								       {?>
									      <?=$detail['pagetitle']?>
									 <?}
									 else
									   {
										   echo "-";
									   }?>
								</td>
							</tr>
							<tr class="odd">
								<td class="width130" valign="top">Meta Title</td>
								<td>
									<? if($detail['metatitle']!='')
								       {?>
									      <?=$detail['metatitle']?>
									 <?}
									 else
									   {
										   echo "-";
									   }?>
								</td>
							</tr>
							<tr class="odd">
								<td class="width130" valign="top">Meta Keywords</td>
								<td>
									<? if($detail['metakeyword']!='')
								       {?>
									      <?=$detail['metakeyword']?>
									 <?}
									 else
									   {
										   echo "-";
									   }?>
								</td>
							</tr>
							<tr class="odd">
								<td class="width130" valign="top">Meta Description</td>
								<td>
									<? if($detail['metadesc']!='')
								       {?>
									      <?=$detail['metadesc']?>
									 <?}
									 else
									   {
										   echo "-";
									   }?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Sort Order</td>
								<td><?=$detail['sort_order']?></td>
							</tr>

							<?if($detail['isactive']=='1')
							{
								$isactive="True";
							}
							else
							{
								$isactive="False";
							}?>
	
							<tr class="odd">
								<td class="width130" valign="top">Is Active?</td>
								<td>
									<?=$isactive?>
								</td>
							</tr>

							<?if($detail['isfeatured']=='1')
							{
								$isfeatured="Yes";
							}
							else
							{
								$isfeatured="No";
							}?>
	
							<tr class="odd">
								<td class="width130" valign="top">Is Featured?</td>
								<td>
									<?=$isfeatured?>
								</td>
							</tr>
							<?if($detail['isblock']=='1')
							{
								$isblock="Yes";
							}
							else
							{
								$isblock="No";
							}?>
							<tr class="odd">
								<td class="width130" valign="top">Is Blocked?</td>
								<td>
									<?=$isblock?>
								</td>
							</tr>
							</table>
               <div>
			</div>                  
		    </div>
                </div>
            </div>
            <div class="curveBottom">
                <img height="8" width="8" src="/assets/img/bl.jpg" alt="" class="curveCorner" />
            </div>
        </div>
    </div>