<div id="topbar" class="site-topbar">
	<div class="container">
		<div class="topbar-inner row clearfix">
			
			<div class="header-left-widgets col-xs-12 col-sm-3 col-md-3 ">
<!-- 	here was account link, currency and languige			 -->
			</div>
			
			<div class="header-center-logo col-xs-12 col-sm-6 col-md-6 text-center">
				
				
				<div data-strokewidth="0" data-svg-id="svgshape.v2.Svg_c2b0db4fd566444f934ccab2858cfe57" data-display-mode="legacyFit" tabindex="0" role="image" class="style-imf4yftj" id="comp-imf6zixy" style="    position: relative;float: right;margin: 80px 0px;"><style type="text/css">.style-imf4yftj svg {width:100%;height:100%;position:absolute;top:0;right:0;bottom:0;left:0;margin:auto;fill:#E31275;fill-opacity:1;stroke:rgba(232, 23, 23, 1);stroke-width:0px;}
.style-imf4yftj svg * {vector-effect:non-scaling-stroke;}
.style-imf4yftj a {display:block;height:100%;}</style><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -0.000002384185791015625 77.79999542236328 168.6999969482422" role="img" preserveAspectRatio="xMidYMid meet" style="stroke-width: 0px; width: 44px; height: 88px;">
    <g>
        <path d="M73.7 108.6H44.2l15.5-20.7-4.2-3.2-14.2 19.2V77c2.6-1 4.7-3 5.6-5.7 1.7 1.5 3.9 2.5 6.3 2.5 5.2 0 9.3-4.2 9.3-9.3 0-.6-.1-1.2-.2-1.7.7.2 1.4.2 2.1.2 5.2 0 9.3-4.2 9.3-9.3 0-2.4-.9-4.6-2.4-6.2 3.8-1.2 6.5-4.7 6.5-8.9 0-3.4-1.8-6.3-4.5-8 .7-1.3 1.1-2.8 1.1-4.4 0-5.2-4.2-9.3-9.3-9.3h-.9c.2-.8.4-1.6.4-2.5 0-5.2-4.2-9.3-9.3-9.3-2.1 0-4 .7-5.6 1.8-1.1-4-4.7-6.9-9-6.9-3.9 0-7.2 2.3-8.6 5.7C30.6 4 28.3 3 25.7 3c-5.2 0-9.3 4.2-9.3 9.3 0 .4 0 .8.1 1.2-.8-.2-1.5-.3-2.4-.3-5.2 0-9.3 4.2-9.3 9.3 0 2.2.8 4.2 2 5.8C2.9 29.4 0 33 0 37.2c0 4 2.5 7.3 5.9 8.7-1.6 1.7-2.6 3.9-2.6 6.4 0 5.2 4.2 9.3 9.3 9.3.5 0 1 0 1.4-.1-.2.7-.3 1.5-.3 2.2 0 5.2 4.2 9.3 9.3 9.3 2.3 0 4.4-.8 6-2.2 1 3.3 3.7 5.8 7.1 6.4v26.2L21 84.2l-3.8 3.7 16.3 20.7H3.9c-2.5 0-2.6 2.8-2.6 2.8v9.5s.1 2.8 2.2 2.8h2.8l13.2 39.8s1.7 5.2 6.5 5.2h25.3c5.8 0 7.5-4.9 7.5-4.9l12.6-40.1h2.8c2 0 2.2-2.8 2.2-2.8V111c-.1 0-.1-2.4-2.7-2.4z"></path>
    </g>
</svg>
</div>
				
				
				
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

			<div class="header-right-widgets col-xs-12 col-sm-3 col-md-3">
				<div class="header-right-cart-search padding-right-0">
					<div class="header-cart-search">
						<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
						<?php $count = WC()->cart->cart_contents_count;?>
						<a class="cart-contentss" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e( 'View your shopping cart', 'nb_flower' ); ?>"><span><?php if ( $count >= 0 ) echo intval($count) ; ?></span></a>
						<?php } ?>
						<div class="widget_shopping_cart_content"></div>
					</div>
					<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<label>
							<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'nb_flower' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
						</label>
					</form>
					<div class="header-social">
					<?php if ( is_user_logged_in() ) { ?>
					<a href="<?php echo esc_url(home_url( '/index.php/my-account' )); ?>" title="Account" class="social-user"><i class="fa fa-user" aria-hidden="true"></i><?php esc_html_e('Account','nb_flower') ?></a>
					<?php } else { ?>
					<a href="<?php echo esc_url(home_url( '/index.php/my-account' )); ?>" title="Login" class="social-user"><i class="fa fa-sign-in"></i><?php esc_html_e('Login','nb_flower') ?></a>
					
					<?php } ?>
				</div>
					
				</div>
				
				<span id="netbase-responsive-toggle"><i class="fa fa-bars"></i></span>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div> <!-- /#topbar -->

<header id="masthead" class="site-header ">
	<div class="header-wrap">
		<div class="container">
			<div class="header-right-wrap-top col-sm-12 col-md-12">
				<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
			</div>
		</div>
	</div>
	<div class="clear-fix"></div>
</header><!-- #masthead -->