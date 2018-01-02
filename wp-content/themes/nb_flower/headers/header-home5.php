<div id="topbar-header3" class="site-topbar topbar_header3 topbar_header5">
	<div class="container">
		<div class="topbar-inner row clearfix">
			<div class="header-left-widgets col-xs-12 col-sm-5 col-md-6 ">
				<div class="div-header-left-social">
					<ul class="list-header-social">
						<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-html5" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="header-right-widgets col-xs-12 col-sm-7 col-md-6">
				<div class="header-box-right-widgets">
					<div class="header-social">
							<?php if ( is_user_logged_in() ) { ?>
							<a href="<?php echo esc_url(home_url( '/my-account' )); ?>" title="Account" class="social-user"><i class="fa fa-user" aria-hidden="true"></i><?php esc_html_e('Account','nb_flower') ?></a>
							<?php } else { ?>
							<a href="<?php echo esc_url(home_url( '/my-account' )); ?>" title="Login" class="social-user"><i class="fa fa-sign-in"></i><?php esc_html_e('Login','nb_flower') ?></a>
							
							<?php } ?>
					</div>

						<?php
							if(is_active_sidebar('header-languages')){
								dynamic_sidebar('header-languages');
							}

							if(is_active_sidebar('header-currency')){
								dynamic_sidebar('header-currency'); 
							}
						?>
				</div>	
			</div>
		</div>
	</div>
</div> <!-- /#topbar -->

<header id="masthead" class="site-header main-menu5">
	<div class="header-wrap">
		<div class="container">
			<div class="row">
				<div class="header-center-logo col-xs-12 col-sm-2 col-md-2 text-center">
					<div class="site-branding padding-left-0">
						<?php if ( $header_logo = nb_flower_get_option('header_logo', false, 'url')) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php echo esc_url($header_logo);?>" alt="<?php get_bloginfo( 'name' ) ?>" />
							</a>
						<?php else: ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif; ?>
					</div><!-- /.site-branding -->
				</div>

				<div class="header-mainmenu-navigation col-sm-8 col-md-9">
					<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				</div>

				<div class="header-cart-search bottombar-header3 bottombar-header5 col-md-1 col-sm-2">
					<div class="div-header-cart-from-search">
						<div class="div-header-cart-search">
							<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
							<?php $count = WC()->cart->cart_contents_count;?>
							<a class="cart-contentss" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e( 'View your shopping cart', 'nb_flower' ); ?>"><span class="quantity_cart"><?php if ( $count >= 0 ) echo intval($count) ; ?></span></a>
							<?php } ?>
							<div class="widget_shopping_cart_content"></div>
						</div>
						<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<label class="search-form-label">
								<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'nb_flower' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
							</label>
						</form>
					</div>
					<span id="netbase-responsive-toggle"><i class="fa fa-bars"></i></span>
				</div>
			</div>
		</div>
	</div>
</header><!-- #masthead -->