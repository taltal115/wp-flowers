<div id="topbar" class="site-topbar">
	<div class="container">
		<div class="topbar-inner row clearfix">
			
			<div class="header-left-widgets col-xs-12 col-sm-3 col-md-3 ">

			</div>
			
			<div class="header-center-logo col-xs-12 col-sm-6 col-md-6 text-center">
				<div class="site-branding padding-left-0">
					<?php if ( $header_logo = nb_flower_get_option('header_logo', false, 'url')) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php echo esc_url($header_logo);?>" alt="<?php get_bloginfo( 'name' ) ?>" />
						</a>
					<?php else: ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<!--						<h2 class="tal111  site-description">--><?php //bloginfo( 'description' ); ?><!--</h2>-->
					<?php endif; ?>
				</div><!-- /.site-branding -->
			</div>

			<div class="header-right-widgets col-xs-12 col-sm-3 col-md-3">
				<div class="header-right-cart-search padding-right-0">
					<div class="header-cart-search">
						<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
						<?php $count = WC()->cart->cart_contents_count;?>
						<a class="cart-contentss" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e( 'צפה בעגלת הקניות שלך', 'nb_flower' ); ?>"><span><?php if ( $count >= 0 ) echo intval($count) ; ?></span></a>
						<?php } ?>
						<div class="widget_shopping_cart_content"></div>
					</div>
					<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<label>
							<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'חפש', 'placeholder', 'nb_flower' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
						</label>
					</form>
                    <div class="header-social">
                        <?php if ( is_user_logged_in() ) { ?>
                            <a href="<?php echo esc_url(home_url( '/my-account' )); ?>" title="Account" class="social-user"><i class="fa fa-user" aria-hidden="true"></i><?php esc_html_e('החשבון שלי','nb_flower') ?></a>
                        <?php } else { ?>
                            <a href="<?php echo esc_url(home_url( '/my-account' )); ?>" title="Login" class="social-user"><i class="fa fa-sign-in"></i><?php esc_html_e('היתחבר','nb_flower') ?></a>

                        <?php } ?>
                    </div>
				</div>
				<span id="netbase-responsive-toggle"><i class="fa fa-bars"></i></span>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div> <!-- /#topbar -->

<header dir="rtl" id="masthead" class="site-header ">
	<div class="header-wrap">
		<div class="container" style="padding: 0;width: 100%;">
			<div class="header-right-wrap-top col-sm-12 col-md-12">
				<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
			</div>
		</div>
	</div>
	<div class="clear-fix"></div>
</header><!-- #masthead -->