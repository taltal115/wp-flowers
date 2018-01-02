		<div class="container">
			<?php 
				if(is_active_sidebar('footer-top-two')){
					dynamic_sidebar('footer-top-two');
				} 
			?>

			<div class="footer-widgets-area">
				<div class="sidebar-footer footer-columns footer-4-columns clearfix">
					<div id="footer-1" class="footer-1 footer-column widget-area">
						<?php 
							if(is_active_sidebar('footer-1')){
								dynamic_sidebar('footer-1'); 
							}
						?>
					</div>
					<div id="footer-2" class="footer-2 footer-column widget-area">
						<?php 
							if(is_active_sidebar('footer-2')){
								dynamic_sidebar('footer-2'); 
							}
						?>
					</div>
					<div id="footer-3" class="footer-3 footer-column widget-area">
						<?php 
							if(is_active_sidebar('footer-3')){
								dynamic_sidebar('footer-3'); 
							}
						?>
					</div>
					<div id="footer-4" class="footer-4 footer-column widget-area">
						<?php 
							if(is_active_sidebar('footer-4')){
								dynamic_sidebar('footer-4'); 
							}
						?>
					</div>
				</div>
			</div>
			
		</div>
		<aside id = "text-17" class="home1_footer_bottom widget widget_text widget">
			<div class="textwidget">
				<div class="container">
					<div class="f-copyright col-md-6 col-xs-12">
						<p>&#169; <?php echo date('Y') ?> <?php if($f_copyright = nb_flower_get_option('footer_bottom_copyright')) print esc_html($f_copyright); ?></p>
					</div>
					<div class="f-checkout-method col-md-6 col-xs-12">
							<?php if($bottom_img = nb_flower_get_option('footer_bottom_image', false, 'url')): ?>
								<img src="<?php print esc_url($bottom_img) ?>" alt="<?php esc_html_e('checkout-method','nb_flower') ?>">
							<?php endif; ?>
					</div>
				</div>
			</div>
		</aside>