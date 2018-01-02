<div class="cn_wrapper ourteam-block">

	<div class="col-md-4 ourteam-lst-imgs col-sm-12 col-xs-12">
	<div class="ourteam-title">
	<?php if( !empty( $instance['title'] ) ) 
	echo '<h3 class="widget-title">'.esc_html($instance['title']).'</h3>';?>
	<?php if( !empty( $instance['subtitle'] ) ){ echo  '<span class="subtitle">'.esc_html($instance['subtitle']).'</span>'; } ?>
	</div>
	<ul class="cn_list afterLoad owl-carousel">
		<?php foreach($instance['columns'] as $i => $columnssync1) : ?>
			<li class="cn_item" style="display: list-item;">
				<?php if(!empty($columnssync1['testimonials_avatar'])) : ?>
					
						<?php $this->column_image($columnssync1) ; ?>
					
				<?php endif; ?>
			</li>
		<?php endforeach; ?>	
	</ul>
	</div>
		<div class="cn_preview col-md-8 col-sm-12 col-xs-12">
			<?php foreach($instance['columns'] as $i => $column) : ?>
				<div class="cn_content" >
					<div class="col-md-6 col-sm-5 col-xs-5">
						<?php if(!empty($column['testimonials_avatar'])) : ?>
					
						<?php $this->column_image($column) ; ?>
					
				<?php endif; ?>

					</div>
					<div class="col-md-6 col-sm-7 col-xs-7">
							<?php if(!empty($column['testimonials_name'])) : ?>
								<h3 class="testi-title"><?php echo esc_html( $column['testimonials_name'] ) ?></h3>
							<?php endif;?>
							<?php if( !empty($column['testimonials_company']) ) : ?>					
										
									<span class="noo_testimonial_position">
									<a href='<?php 
									if(!empty($column['testimonials_company_url'])){
										echo sow_esc_url($column['testimonials_company_url']);
										}else {echo "#";}  ?>' class="ow-pt-link">
									<?php echo esc_html($column['testimonials_company']) ?>
									</a> 
									</span>
							<?php endif; ?>
							<div>
								
								<?php if(!empty($column['testimonials_content'])) : ?>
								<p>
								<?php echo esc_html( $column['testimonials_content'] ) ?> 
								</p>
							<?php endif;?>
								
							</div>
						</div>
				</div>
			<?php endforeach; ?>		
		</div><!--end preview-->
		
</div>
	<script>
	jQuery(document).ready(function ($) {
	jQuery(".cn_list").owlCarousel({
		items: 2, nav:true, startPosition:1, 
		navText: ['<i class="fa fa-angle-double-left" aria-hidden="true"></i>', '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'],
		responsive:{
			0:{
				items:2,            
			},
			768: {
			    items: 3,
			},
			992:{
				items: 2,margin: 30,
			},
		},	
	});
	var theWindow = jQuery(window);

	jQuery('.cn_wrapper').each(function(){
		var cn_list 	= jQuery(this).find('.cn_list'),
			items 		= cn_list.find('.cn_item'),
			cn_preview = jQuery(this).find('.cn_preview'),
			current		= 1;			
			
		items.each(function(i){
			var item = jQuery(this);
			item.data('idx',i+1);
			
			item.bind('click',function(){
				/*if(theWindow.width() >= 550){*/
			
				var thisItem 		= jQuery(this);
				cn_list.find('.selected').removeClass('selected');
				thisItem.addClass('selected');
				var idx			= jQuery(this).data('idx');
				var newcurrent 	= cn_preview.find('.cn_content:nth-child('+current+')');
				var newnext		= cn_preview.find('.cn_content:nth-child('+idx+')');
				
				newcurrent.stop().hide();
				newnext.stop().fadeIn(150);
				
				current = idx;
				return false;
				/*}*/
			});
		});
	});	
	theWindow.load(function(){
	
		//SHOW CRUMBS
		jQuery('#crumbs #loading').delay(200).fadeOut(200,function(){
			showCrumbs();
		});
		
		//CLICK FIRST SLIDE
		jQuery('.cn_list').addClass('afterLoad');
		jQuery('.cn_item').each(function(){
			var loadMe = jQuery(this).index();
			jQuery(this).delay(250*loadMe).fadeIn(250,function(){
				//jQuery('.cn_item:first-child').click();
				jQuery('.cn_item:first-child').addClass('selected');
			});
		});
	});
	
});
</script>