<script>
$().ready(function()
	{
		$("#frmsearch").validate();
	});
</script>
<div class="top-listing header_inner">    
	<div class="container">
		<div class="row">
            <div class="show768">
            <div class="listing-block topright inner_number">
                <div class="login_top">
                <ul><? if($this->session->userdata('frontloggedin'))
		{ ?>
			<li class="bgcolor firstli" <?if($websitepagename=="profile"){?> class="active" <? } ?>>
				<a href="<? echo site_url("Profile"); ?>" >My Profile </a><span>|</span>
			</li>
			<li class="bgcolor">
				<a href="<?php echo site_url('Signin/signout'); ?>"> Sign out </a>
			</li>
		<? }
		else
		{ ?>
		<li><a href=""><span class="glyphicon glyphicon-phone"></span> &nbsp;Whatsapp : +971 522 65 6679</a></li><li><a href=""><span class="glyphicon glyphicon-phone"></span> Call Us : +971522656679</a></li>
        	<li><a href="mailto:sales@dbuguae"><span class="glyphicon glyphicon-envelope"></span>&nbsp; Email : info@atomdirectory.com</a></li>
        	<li class="green">
				<!--<a href="<? echo site_url('Registration')?>" class="reg">Registration</a> <span>/</span> -->
				<a href="#" data-toggle="modal" data-target="#myModal" class="log btn_login" onclick="hideregisterdiv();">Registration <span>/</span> Log in</a>
			</li>
		<? } ?></ul>

				
                 <div class="clear"></div> 
            </div>
            
	<div class="clear"></div>
    </div>
                <div class="clear"></div></div>
			<div class="col-xs-12 col-sm-12 col-md-3">
				<div class="logo"><a href="<? echo site_url('');?>"><img src="<? echo site_url('assets/img/atom-header-logo.png');?>" alt="" class="img-responsive dib" /></a></div>
			</div>
            <div class="col-xs-12 col-sm-12 col-md-9 text-right">
                <div class="listing-block topright inner_number hide768">
                    <div class="login_top">
                <ul><? if($this->session->userdata('frontloggedin'))
		{ ?>
			<li class="bgcolor firstli" <?if($websitepagename=="profile"){?> class="active" <? } ?>>
				<a href="<? echo site_url("Profile"); ?>" >My Profile </a><span>|</span>
			</li>
			<li class="bgcolor">
				<a href="<?php echo site_url('Signin/signout'); ?>"> Log Out </a>
			</li>
		<? }
		else
		{ ?>
			
			<li><a href=""><span class="glyphicon glyphicon-phone"></span> &nbsp;Whatsapp : +971 522 6566 79</a></li>
        	<li><a href="mailto:mr@ifid.in"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Email: info@atomdirectory.com</a></li>
        	<li class="green">
				<!--<a href="<? echo site_url('Registration')?>" class="reg">Registration</a> <span>/</span> -->
				<a href="#" data-toggle="modal" data-target="#myModal" class="log btn_login">Registration <span>/</span> Log In</a>
			</li>
		<? } ?></ul>
                <div class="clear"></div>
            </div>
	<div class="clear"></div>
    </div>
                <div class="clear"></div>
				<?if($websitepagename == 'directorylist' || $websitepagename == 'searchlist')
				{ ?>
					<div class="results_serach">
						<div id="resultsfor"></div>
					</div>
				<? } ?>
			</div>

		
		</div>
	</div>
</div>