<?php $this->load->view('admin/includes/header');?>
	<div id="pageWrapper">
		<div class="adminContainer">
			<?php $this->load->view('admin/includes/mainnavi');?>
			<div class="clear"></div>
			<?php $this->load->view('admin/includes/subnavi');?>
			<script type="text/javascript">
				$().ready(function() 
				{
					$('.pansucess').delay(6000).fadeOut();
					$('.failure').delay(6000).fadeOut();
				});
			</script>

			<?if(isset($webpagename) && $webpagename=="main")
			{ ?>
				<script> 
					$(function()
					{
						var oTable = $('.table').dataTable( 
						{
							"bJQueryUI": true,
							"sScrollX": "",
							"bSortClasses": false,
							"aaSorting": [[0,'desc']],
							"bAutoWidth": true,
							"bInfo": true,
							"sScrollY": "100%",	
							"sScrollX": "100%",
							"bScrollCollapse": true,
							"sPaginationType": "full_numbers",
							"bRetrieve": true
						});
					});
				</script>
			<? } ?>
			<?php $this->load->view($main);?>
		</div>
		<div class="push"></div>
	</div>
<?php $this->load->view('admin/includes/footer');?>