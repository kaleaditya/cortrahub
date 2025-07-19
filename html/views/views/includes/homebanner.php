<!-- =========== Home banner Area Start =========== --> 

 <section class="regular slider homeslider" style="display: none;">
	<?if(count($homebanner)>0)
	{           
		$c=1; 
		foreach($homebanner as $banner) 
		{
			if($c==1)
			{ ?>
				<div>
				  <img src="<? echo site_url('userfiles/homebanner/main').'/'.$banner['homebanner'];?>" alt="img">
				  <div class="slider-text">
					<?=$banner['title']?>
					<div class="slider-readmore">
						<a href="<? echo site_url('Aboutus/index/collapse'.$banner['id']);?>"> Read More  </a> 
					</div>
				  </div>
				</div>
			<? $c++; 
			} 
			else 
			{ ?>
				<div>
				  <img src="<? echo site_url('userfiles/homebanner/main').'/'.$banner['homebanner'];?>">
				  <div class="slider-text">
					<?=$banner['title']?>
					<div class="slider-readmore">
						<a href="<? echo site_url('Aboutus/index/collapse'.$banner['id']);?>"> Read More  </a> 
					</div>
				  </div>
				</div>
		<?	}
		} 
	} ?>
 	
    
  </section>


 