<?php
$products_args = array(
	'taxonomy' => 'product_cat',
	'post_type' => 'product',
	'posts_per_page' => $quantity,
);
if($get_products == 'related') {
	$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
	$cat_id_args = array();

	foreach($product_cats as $product_cat) {
		array_push($cat_id_args, $product_cat->slug);
	}

	$products_args['tax_query'] = array(
		array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $cat_id_args,
			'operator' => 'IN'
		)
	);

	$products_args['post__not_in'] = array(get_the_ID());
}

$products_loop = new WP_Query($products_args);
if ( $products_loop->have_posts() ) {
	?>
	<?php if(!empty($title)) {
		echo '<h3 class="nbtsow-title">'. $title .'</h3>';
	}?>
	<ul class="nbtsow-wcproducts">
	<?php
	while ($products_loop->have_posts()): $products_loop->the_post();
	?>
		<?php include(locate_template('woocommerce/content-product-flower.php')); ?>
	<?php
	endwhile;
	?>
	</ul>
	<?php
	wp_reset_postdata();
} else {
	echo esc_html__('No products found');
}
?>
<script type="text/javascript">
	jQuery(document).ready(function() {
        jQuery('#flower_home1_new_product ul.nbtsow-wcproducts').each(function(){
            jQuery(this).addClass('owl-carousel');
            jQuery(this).owlCarousel({
                items:1,
                nav:true,
                navText:[
                    "<i class='fa fa-angle-left fa-2x'></i>",
                    "<i class='fa fa-angle-right fa-2x'></i>"
                ],
                dots:false,
                responsive:{
                    0:{
                        items:1,
                    },
                    480:{
                        items:2,
                    },
                    768:{
                        items:3,
                    },
                    1200:{
                        items:4,
                    }    
                }
            });
        });
    });
</script>
