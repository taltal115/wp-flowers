<!-- <section class="footertop-footer3">
	<div class="container">
		<?php 
			if(is_active_sidebar('footer-top')){
				dynamic_sidebar('footer-top');
			}
		?>
	</div>
</section> -->

<section class="footerbottom-footer3">
	<div class="container">
		<div class="footer-widgets-area">
			<div class="sidebar-footer footer-columns footer-4-columns clearfix">
				<div id="footer-5" class="footer-5 footer-column widget-area">
					<?php 
						if(is_active_sidebar('footer-5')){
							dynamic_sidebar('footer-5'); 
						}
					?>
				</div>
				<div id="footer-6" class="footer-6 footer-column widget-area">
					<?php 
						if(is_active_sidebar('footer-6')){
							dynamic_sidebar('footer-6'); 
						}
					?>
				</div>
				<div id="footer-7" class="footer-7 footer-column widget-area">
					<?php 
						if(is_active_sidebar('footer-7')){
							dynamic_sidebar('footer-7'); 
						}
					?>
				</div>
				<div id="footer-8" class="footer-8 footer-column widget-area">
					<?php 
						if(is_active_sidebar('footer-8')){
							dynamic_sidebar('footer-8'); 
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<aside id = "text-17" class="home1_footer_bottom widget widget_text widget home3_footer_bottom">
	<div class="textwidget">
		<div class="container">
			<div class="f-copyright col-md-12 col-xs-12">
				<p>&#169; <?php echo date('Y') ?> <?php if($f_copyright = nb_flower_get_option('footer_bottom_home_new')) print esc_html($f_copyright); ?> <a href="https://cmsmart.net/" class="link_copyright">Cmsmart.net</a></p>
			</div>
		</div>
	</div>
</aside>