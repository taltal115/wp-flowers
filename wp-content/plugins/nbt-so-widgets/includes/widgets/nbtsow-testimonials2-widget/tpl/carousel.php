<?php if( !empty( $instance['title'] ) ) 
echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'] ?>

<ul class="wpnetbase-testi owl-carousel" id="owl-demo">
	<?php foreach($instance['columns'] as $i => $column) : ?>
		<li>
			<?php 	
			if(!empty($column['testimonials_avatar'])) : ?>
					<div class="ow-pt-image">
						<?php $this->column_image($column) ?>
					</div>
			<?php endif;  
				
			?>
			<div class="noo-testi-content">
				<i class="fa fa-quote-left"></i>
				<?php if(!empty($column['testimonials_content'])) : ?>
					<p class="testimonials-widget-content">
						<?php echo esc_html( $column['testimonials_content'] ) ?> 
					</p>
				<?php endif;?>
				
				<div class="testi-author">
				<?php if(!empty($column['testimonials_name'])) : ?>			
				<div class="testi-name">
					<?php echo esc_html( $column['testimonials_name'] ) ?>					
				</div>
				<?php endif;?> 
				<?php if( !empty($column['testimonials_company']) ) : ?>
					<div class="ow-pt-button">
						<a href='<?php echo sow_esc_url($column['testimonials_company_url']) ?>' class="ow-pt-link"> - <?php echo esc_html($column['testimonials_company']) ?></a>
					</div>
				<?php endif; ?> 
				</div>
			</div>
		</li>
	<?php endforeach; ?>
</ul>	
<script>
jQuery(document).ready(function ($) {
 	jQuery(".wpnetbase-testi").each(function(){
        jQuery(this).owlCarousel({
                               autoplay: false,loop: true,slideSpeed : 2000,
                                nav : true,
                                navText: ["",""],
                                items : 1

       });
    });
});	
</script>	
