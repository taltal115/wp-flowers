<?php
$products_list_tab = $this->getProductsList($instance);
$font_lists = $this->getFontClass($instance);
?>

<?php if($products_list_tab):?>
    
<div class="nbt-product-tabs-<?php echo $instance['_sow_form_id'];?>">        
    <div class="wctab-list" role="tabpanel">
        <!-- Nav tabs -->

        <div class="nav nav-tabs tabcat" role="tablist">
            <?php $i = 0; $active = 'active'; ?>
            <?php foreach ($products_list_tab as $key => $products): ?>
                <div class="pst-item <?php if ($i == 0) { echo $active;} ?>">
                    <a class="pst-item-text" data-toggle="tab" href="#nbt-product-tab-<?php echo $key; ?>-<?php echo $instance['_sow_form_id'];?>">
                        <i class="<?php echo $font_lists[$key]; ?>"></i>
                        <?php echo get_term_by('slug', $key, 'product_cat')->name; ?>
                    </a>
                </div>
            <?php $i++; endforeach; ?>
        </div>

        <!-- Tab panes -->
        <div class="tab-content tab-content-bestseller">
            <?php $i = 0; $active = "active"; ?>
            <?php 
            foreach ($products_list_tab as $key => $products): 
                $args3 = array(
			        'post_type'   => 'product',
			        'posts_per_page'   => $quantity,
			        'product_cat'=> $key,
			        'orderby'     => 'date',
			        'order'       => 'DESC' ,
				    'meta_key' => '_featured',  
				    'meta_value' => 'yes',  
 
			    );

                $loop = new WP_Query( $args3 );
                ?>
                
                <div class="tab-pane fade in <?php if($i==0){echo $active ;} ?>" id="nbt-product-tab-<?php echo $key; ?>-<?php echo $instance['_sow_form_id'];?>">
                    <ul class="item-posts" id="nbt-product-tab-content-<?php echo $key; ?>-<?php echo $instance['_sow_form_id'];?>">
                     <?php
                        if ( $loop->have_posts() ) {
                            while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;

                                // Ensure visibility
                                if ( empty( $product ) || ! $product->is_visible() ) {
                                    return;
                                }
                                include(locate_template('woocommerce/content-product-flower.php'));
                            endwhile;

                        } else {
                            echo __( 'לא נמצאו מוצרים' );
                        }
                            wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            <?php $i++; endforeach; ?>
        </div>
    </div>   
</div>

<?php endif;?>
<script type="text/javascript">
    "use strict";
    (function ($) {
        $('.home2-feature-products .pst-item').on('click',function(){
            $(this).addClass('active').siblings().removeClass('active');
        });
    })(jQuery);
</script>