<div class="tab-so-widgets-bundle widget_tabs">
    <ul class="nav nav-pills">
    <?php
    foreach ($repeater as $k => $repeat) {
        if($k == '0') {
            echo '<li class="active">';
        } else {
            echo '<li>';
        }
    ?>
        <a data-toggle="pill" href="#tab<?php echo $tab_name.$k ?>">
            <?php echo $repeat['tab_title']; ?>
        </a></li>
    <?php
        $k++;
        }
    ?>    
    </ul>

    <div class="tab-content alt-tab-products" data-limit="<?php echo $tab_product_limit; ?>" data-col="<?php echo $tab_product_col; ?>">
        <?php 
            foreach ($repeater as $key => $loop) {
                $args = array(
                    'post_type'=>'product',
                    'post_status'=>'publish',
                    'tax_query' => array(
                      array(
                          'taxonomy' => 'product_cat',
                          'field' => 'id',
                          'terms' => $loop['tab_cat']
                      )
                    ),
                    'orderby' => 'ID',
                    'order' => 'DESC',
                    'posts_per_page'=> $tab_product_limit,
                );

                if($key == '0') {
                    echo '<div id="tab'.$tab_name.$key.'" class="tab-pane fade in active" data-cat="'.$loop['tab_cat'].'">';
        ?>
                <?php
                    $products_loop = new WP_Query($args);
                    if ( $products_loop->have_posts() ) { 
                    ?>
                        <ul class="nbtsow-wcproducts-<?php echo $key ?>">
                            <?php
                            while ($products_loop->have_posts()): $products_loop->the_post();
                                include(locate_template('woocommerce/content-product-flower.php'));
                            endwhile;
                            ?>
                        </ul>
                    <?php
                        wp_reset_postdata();
                    } else {
                        echo esc_html__('No products found');
                    }
                    echo '</div>';
                ?>
        <?php            
                } else {
                    echo '<div id="tab'.$tab_name.$key.'" class="tab-pane fade" data-cat="'.$loop['tab_cat'].'">';
        ?>
                <?php          
                    $products_loop = new WP_Query($args);
                    if ( $products_loop->have_posts() ) {
                        ?>
                            <ul class="nbtsow-wcproducts-<?php echo $key ?>">
                            <?php
                            while ($products_loop->have_posts()): $products_loop->the_post();
                                include(locate_template('woocommerce/content-product-flower.php'));
                            endwhile;
                            ?>
                            </ul>
                    <?php
                        wp_reset_postdata();
                    } else {
                        echo esc_html__('No products found');
                    }
                    echo '</div>';
                ?>
        <?php
                }
                $key++;
            }
        ?>
    </div>
</div>

<?php foreach ($repeater as $key => $value) { ?>
<style type="text/css">
    .nbtsow-wcproducts-<?php echo $key ?>, .nbtsow-wcproducts-<?php echo $key ?>{
        width: 100%;
    }
    .nbtsow-wcproducts-<?php echo $key ?> .product, .nbtsow-wcproducts-<?php echo $key ?> .product{
        width: 23%;
        background: #F3F3F3;
        list-style: none;
        float: left;
        padding: 0 2%;
    }
</style>
<?php $key++; } ?>