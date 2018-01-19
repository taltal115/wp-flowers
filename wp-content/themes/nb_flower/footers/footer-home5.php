<section class="footer5">
	<div class="container">
		<div class="footer-widgets-area">
			<div class="sidebar-footer footer-columns footer-4-columns clearfix">
				<div id="footer-9" class="footer-9 footer-column widget-area">
					<?php 
						if(is_active_sidebar('footer-9')){
							dynamic_sidebar('footer-9'); 
						}
					?>
				</div>
				<div id="footer-10" class="footer-10 footer-column widget-area">
					<?php 
						if(is_active_sidebar('footer-10')){
							dynamic_sidebar('footer-10'); 
						}
					?>
				</div>
				<div id="footer-11" class="footer-11 footer-column widget-area">
					<?php 
						if(is_active_sidebar('footer-11')){
							dynamic_sidebar('footer-11'); 
						}
					?>
				</div>
				<div id="footer-12" class="footer-12 footer-column widget-area">
					<?php 
						if(is_active_sidebar('footer-12')){
							dynamic_sidebar('footer-12'); 
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<aside id = "text-17" class="home1_footer_bottom widget widget_text widget home3_footer_bottom home5_footer_bottom">
	<div class="textwidget">
		<div class="container">
			<div class="f-copyright col-md-12 col-xs-12">
				<p>&#169; <?php echo date('Y') ?> <?php if($f_copyright = nb_flower_get_option('footer_bottom_home_new')) print esc_html($f_copyright); ?> <a href="https://cmsmart.net/" class="link_copyright">Cmsmart.net</a></p>
			</div>
		</div>
	</div>
</aside>