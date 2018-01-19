<?php

if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists( 'NBTSOW_Setup' )) {
	class NBTSOW_Setup {
		public function __construct() {
			add_filter( 'siteorigin_widgets_widget_folders', array($this, 'add_widgets') );
			add_filter( 'siteorigin_panels_widget_dialog_tabs', array($this, 'add_widget_tabs'), 40 );
			add_filter( 'siteorigin_panels_widgets', array($this, 'add_bundle_groups'), 11 );
			add_filter( 'siteorigin_panels_row_style_fields', array($this, 'row_effect_option') );
			add_filter( 'siteorigin_panels_row_style_attributes', array($this, 'row_effect_attribute'), 10, 3 );
			add_filter( 'siteorigin_widgets_default_active', array($this, 'filter_default_widgets') );

			add_shortcode('best_seller_product',array($this,'create_best_seller_product'));
			add_shortcode('home_service',array($this,'home_service_shortcode'));

			add_action( 'init', array($this, 'add_thumb_size') );

			add_action('init', array($this, 'nb_register_service_postype'));
		}
        
		// Get all widget
		function add_widgets($folders) {
			$folders[] = NBTSOW_PLUGIN_DIR . 'includes/widgets/';
			return $folders;
		}

		//Create 'NetBaseTeam SiteOrigin Widget' tab
		function add_widget_tabs($tabs) {
			$tabs[] = array(
				'title' => esc_html__('NetBaseTeam SiteOrigin Widgets', 'nbtsow'),
				'filter' => array(
					'groups' => array('nbtsow-widgets')
				)
			);
			return $tabs;
		}
      
		// Get all NetBaseTeam Widget to put to tab
		function add_bundle_groups($widgets) {
			foreach ($widgets as $class => &$widget) {
				if (preg_match('/NBTSOW_(.*)_Widget/', $class, $matches)) {
					$widget['groups'] = array('nbtsow-widgets');
				}
			}
			// echo "<pre>";
			// print_r($widgets);
			// echo "</pre>";die;
			return $widgets;
		}

		// Default active on all widget
		function filter_default_widgets($widgets) {
			$widgets = array(
				'nbtsow-services-box-widget',
				'nbtsow-post-carousel-widget',
				'nbtsow-woocommerce-featured-widget',
				'nbtsow-headline-widget',
				'nbtsow-cta-widget',
				'nbtsow-products-widget',
				'nbtsow-blog-posts-widget',
				'nbtsow-image-widget',
				'nbtsow-members-widget',
				'nbtsow-collection-widget',
				'nbtsow-icon-widget',
				'nbtsow-wc-category-widget',
				'nbtsow-social-share-widget',
				'nbtsow-faq-widget',
				'nbtsow-countdown-widget',
				'nbtsow-our-working-widget',
				'nbtsow-testimonial-widget',
				'nbtsow-tabs-widget',
				'nbtsow-our-team-widget',
				'nbtsow-services-widget',
				'nbtsow-breadcrumb-widget',
				'nbtsow-image-banner',
				'nbtsow-wc-product-tabs-widget',
				'nbtsow-tabs-images-widget',
				'nbtsow-products-tabs-widget',
			);
			// echo "<pre>";
			// print_r($widgets);
			// echo "</pre>";die;
			return $widgets;
		}

		// Add parallax option to row
		function row_effect_option($fields) {

			$fields['img-hover'] = array(
				'name' => esc_html__('Image Hover Effect', 'nbtsow'),
				'type' => 'checkbox',
				'group' => 'design',
				'description' => esc_html__('Hover effect for images in this row', 'nbtsow'),
				'priority' => 8,
			);

			$fields['parallax'] = array(
				'name' => esc_html__('Parallax Effect', 'nbtsow'),
				'type' => 'checkbox',
				'group' => 'design',
				'description' => esc_html__('Parallax effect for background image', 'nbtsow'),
				'priority' => 9,
			);

			return $fields;

		}		

		// Parallax attribute
		function row_effect_attribute($attributes, $args) {

			if( !empty($args['img-hover']) ) {
				array_push($attributes['class'], 'nbtsow-img-hover');
			}

			if( !empty($args['parallax']) ) {
				array_push($attributes['class'], 'nbtsow-parallax');
			}
			
			return $attributes;

		}

		// Add image size for widgets
		function add_thumb_size() {
			add_image_size( 'nbtsow-blog-thumb', 737, 400, array('center', 'center') );
			add_image_size( 'nbtsow-product-thumb-1', 340, 340, array('center', 'center') );
			add_image_size( 'nbtsow-product-thumb-2', 60, 60, array('center', 'center') );
		}

		/*Best Seller Shortcode*/
		function create_best_seller_product($ts){
		    extract( shortcode_atts( array (
		        'category' => ''
		    ), $ts ) );
			$query = array(
		        'post_type' => 'product',
		        'posts_per_page' => 6,
		        'post_status' => 'publish',
		        'meta_key' => 'total_sales',
		        'orderby' => 'meta_value_num',
		    );
			if($category !== ''){
		        $query['tax_query'] = array(
		            array(
		                'taxonomy' => 'product_cat',
		                'field' => 'slug',
		                'terms' => $category,
		                'include_children' => true,
		                'operator' => 'IN'
		            )
		        );
			}
			$my_query = new WP_Query($query);
			ob_start();
			if($my_query->have_posts()):
				echo '<ul class="poduct-best-seller">';
				$i = 1;
				$j = 0; //check li.sub-seller
				$k = 0; //check ul.two-li
				while ($my_query->have_posts()): $my_query->the_post(); ?>
					<?php
					if($j%3 == 0){
						echo '<li class="sub-seller">';
					}
					?>
					<?php if($i%3 !== 0): ?>
						<?php
						if($k%2==0){
							echo '<ul class="two-li">';
						}
						?>
						<li class="product">

							<?php $current_product = new WC_Product(get_the_ID()); ?>
							<?php if(has_post_thumbnail()):?>
								<div class="seller-thumbnail">
									<?php the_post_thumbnail('nb_home_bestseller_short'); ?>
								</div>
							<?php endif; ?>
							<div class="seller-detail">
								<a href="<?php the_permalink(); ?>">
									<div class="position"><img src="<?php echo get_template_directory_uri().'/images/plus.png' ?>" alt="<?php esc_html_e('flower','nb_flower') ?>"></div>
									<div class="delta">
										<h2><?php the_title(); ?></h2>
										<div class="seller-price">
											<?php echo $current_product->get_price_html(); ?>
										</div>
										<div class="seller-star">
											<?php echo $current_product->get_rating_html(); ?>
										</div>
									</div>
								</a>
							</div>
						</li>
						<?php
						$k++;
						if($k%2 == 0){
							echo '</ul>'; //end div two-li
						}
						?>
					<?php else: ?>
						<ul class="one-li">
							<li class="product product-dif">

								<?php $current_product = new WC_Product(get_the_ID()); ?>
								<?php if(has_post_thumbnail()):?>
									<div class="seller-thumbnail">
										<?php the_post_thumbnail('nb_home_bestseller_long'); ?>
									</div>
								<?php endif; ?>
								<div class="seller-detail">
									<a href="<?php echo get_the_permalink(); ?>">
										<div class="position"><img src="<?php echo get_template_directory_uri().'/images/plus.png' ?>" alt="<?php esc_html_e('flower','nb_flower') ?>"></div>
										<div class="delta">
											<h2><?php the_title(); ?></h2>
											<div class="seller-price">
												<?php echo $current_product->get_price_html(); ?>
											</div>
											<div class="seller-star">
												<?php echo $current_product->get_rating_html(); ?>
											</div>
										</div>
									</a>
								</div> <!-- end seller detail -->
							</li>
						</ul>
						<?php
					endif;
					$i++;
					$j++;
					if($j%3 == 0){
						echo '</li>'; //end sub-seller
					}
				endwhile;
				wp_reset_postdata();
				echo '</ul>'; //end poduct-best-seller
			endif;
			$list_seller = ob_get_contents();
			ob_end_clean();
			return $list_seller;
		}
		function home_service_shortcode($category){

		    $query = array(
		        'post_type' => 'home-service',
		        'posts_per_page' => 6,
		        'post_status' => 'publish',
		        'category_name' => $category['category']
		    );

		    $service = new WP_Query($query);
		    ob_start();
		    $i = 1;
		    if($service->have_posts()):
		    	while ($service->have_posts()):
		    		$service->the_post();
		    		if($i == 1): ?><div class="service-left"><?php  endif; ?>
						<?php if($i == 1): ?>
							<div class="serv-box">
								<p>
									<a href="<?php the_permalink()?>"><?php the_post_thumbnail('home2_service_horizol'); ?></a>
								</p>
								<div>
									<h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
									<p><?php the_content(); ?></p>
									<a href="<?php the_permalink() ?>"><?php esc_html_e('Read More','nb_flower') ?></a>
								</div>
							</div>
						<?php endif; ?>
						<?php if($i == 2): ?>
							<div class="get-padding-right">
								<div class="serv-box">
									<p>
										<a href="<?php the_permalink()?>"><?php the_post_thumbnail('home2_service_vertical_short'); ?></a>
									</p>
									<div>
										<h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
										<p><?php the_content(); ?></p>
										<a href="<?php the_permalink() ?>"><?php esc_html_e('Read More','nb_flower') ?></a>
									</div>
								</div>
							</div>
						<?php endif; ?>
		    			<?php if($i == 3): ?>
							<div class="get-padding-left">
								<div class="serv-box">
									<p>
										<a href="<?php the_permalink()?>"><?php the_post_thumbnail('home2_service_vertical_short'); ?></a>
									</p>
									<div>
										<h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
										<p><?php the_content(); ?></p>
										<a href="<?php the_permalink() ?>"><?php esc_html_e('Read More','nb_flower') ?></a>
									</div>
								</div>
							</div>
		    			<?php endif; ?>
		    		<?php if($i == 3): ?> </div> <?php endif; ?>

		    		<?php if($i == 4): ?> 
		    			<div class="service-middle"> 
							<div class="serv-box">
								<p>
									<a href="<?php the_permalink()?>"><?php the_post_thumbnail('home2_service_vertical_long'); ?></a>
								</p>
								<div>
									<h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
									<p><?php the_content(); ?></p>
									<a href="<?php the_permalink() ?>"><?php esc_html_e('Read More','nb_flower') ?></a>
								</div>
							</div>
		    			</div>
					<?php endif; ?>

		    		<?php if($i == 5): ?> <div class="service-right"> <?php endif; ?>
						<?php if($i == 5 || $i == 6 ): ?>
							<div class="serv-box">
								<p>
									<a href="<?php the_permalink()?>"><?php the_post_thumbnail('home2_service_vertical_short'); ?></a>
								</p>
								<div>
									<h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
									<p><?php the_content(); ?></p>
									<a href="<?php the_permalink() ?>"><?php esc_html_e('Read More','nb_flower') ?></a>
								</div>
							</div>
						<?php endif; ?>
		    		<?php if($i == 6): ?> </div> <?php endif; ?>		
		    		
		    <?php	$i++;
		    	endwhile;
		    wp_reset_postdata();
		    	
		    else:
		    	echo '<h2>'.esc_html__('No service found !','nb_flower').'</h2>';
		    endif;
		    $list_services = ob_get_contents();
		    ob_end_clean();
		   	return $list_services;
		}
		function nb_register_service_postype(){
			$args = array(
				'labels' => array(
					'name' => esc_html__('Home Services','nb_flower'),
				),
		        'description' => esc_html__('Post type display home service','nb_flower'), 
		        'supports' => array(
		            'title',
		            'editor',
		            'excerpt',
		            'author',
		            'thumbnail',
		            'comments',
		            'trackbacks',
		            'revisions',
		            'custom-fields'
		        ), 
		        'taxonomies' => array( 'category', 'post_tag' ),
		        'hierarchical' => false,
		        'public' => true,
		        'show_ui' => true, 
		        'show_in_menu' => true, 
		        'show_in_nav_menus' => true, 
		        'show_in_admin_bar' => true,
		        'menu_position' => 5, 
		        'menu_icon' => 'dashicons-feedback',
		        'can_export' => true, 
		        'has_archive' => true, 
		        'exclude_from_search' => false, 
		        'publicly_queryable' => true, 
		        'capability_type' => 'post' 
			);
			register_post_type('home-service',$args);
		}
	}
}

new NBTSOW_Setup();
