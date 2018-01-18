<?php
$products_list_tab = $this->getProductsList($instance);
$font_lists = $this->getFontClass($instance);
?>

<?php if ($products_list_tab): ?>

    <div class="nbt-product-tabs-<?php echo $instance['_sow_form_id']; ?>">
        <div class="wctab-list" role="tabpanel">
            <!-- Nav tabs -->

            <div class="nav nav-tabs owl-carousel tabcat" role="tablist">
                <?php $i = 0;
                $active = 'active'; ?>
                <?php foreach ($products_list_tab as $key => $products): ?>
                    <div class="pst-item <?php if ($i == 0) {
                        echo $active;
                    } ?>">
                        <a class="pst-item-text" data-toggle="tab"
                           href="#nbt-product-tab-<?php echo $key; ?>-<?php echo $instance['_sow_form_id']; ?>">
                            <i class="<?php echo $font_lists[$key]; ?>"></i>
                            <?php echo get_term_by('slug', $key, 'product_cat')->name; ?>
                        </a>
                    </div>
                    <?php $i++; endforeach; ?>
            </div>

            <!-- Tab panes -->
            <div class="tab-content tab-content-bestseller">
                <?php $i = 0;
                $active = "active"; ?>
                <?php
                foreach ($products_list_tab as $key => $products):
                    $meta_query = WC()->query->get_meta_query();
                    $args2 = array(
                        'post_type' => 'product',
                        'posts_per_page' => 6,
                        'product_cat' => $key,
                        'status' => 'publish',
                        'meta_query' => $meta_query,
                        'meta_key' => 'total_sales',
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );

                    $loop = new WP_Query($args2);
                    ?>

                    <div class="tab-pane fade in <?php if ($i == 0) {
                        echo $active;
                    } ?>" id="nbt-product-tab-<?php echo $key; ?>-<?php echo $instance['_sow_form_id']; ?>">
                        <ul class="owl-carousel item-posts"
                            id="nbt-product-tab-content-<?php echo $key; ?>-<?php echo $instance['_sow_form_id']; ?>">
                            <?php
                            if ($loop->have_posts()) {
                                while ($loop->have_posts()) : $loop->the_post();
                                    global $product;

                                    // Ensure visibility
                                    if (empty($product) || !$product->is_visible()) {
                                        return;
                                    }
                                    ?>
                                    <li <?php post_class("product-items"); ?>>
                                        <?php
                                        /**
                                         * woocommerce_before_shop_loop_item hook.
                                         *
                                         * @hooked woocommerce_template_loop_product_link_open - 10
                                         */
                                        do_action('woocommerce_before_shop_loop_item');
                                        echo '<div class="thumbnail-pro">';
                                        /**
                                         * woocommerce_before_shop_loop_item_title hook.
                                         *
                                         * @hooked woocommerce_show_product_loop_sale_flash - 10
                                         * @hooked woocommerce_template_loop_product_thumbnail - 10
                                         */
                                        do_action('woocommerce_before_shop_loop_item_title');
                                        echo '</div>';

                                        echo '<div class="product-meta-wrap">';

                                        /**
                                         * woocommerce_after_shop_loop_item_title hook.
                                         *
                                         * @hooked woocommerce_template_loop_rating - 5
                                         * @hooked woocommerce_template_loop_price - 10
                                         */

                                        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
                                        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

                                        add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);
                                        add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5);

                                        do_action('woocommerce_after_shop_loop_item_title');

                                        echo '<a class="title-pro" href="' . esc_html(get_the_permalink()) . '">';
                                        /**
                                         * woocommerce_shop_loop_item_title hook.
                                         *
                                         * @hooked woocommerce_template_loop_product_title - 10
                                         */
                                        do_action('woocommerce_shop_loop_item_title');
                                        echo '</a>';
                                        woocommerce_template_loop_add_to_cart();
                                        echo '</div>'; //product-meta-wrap

                                        echo '<div class="product-info">';
                                        echo '<div class="ms-fix-width">';
                                        /**
                                         * woocommerce_after_shop_loop_item hook.
                                         *
                                         * @hooked woocommerce_template_loop_product_link_close - 5
                                         * @hooked woocommerce_template_loop_add_to_cart - 10
                                         */
                                        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
                                        do_action('woocommerce_after_shop_loop_item');
                                        echo '</div>'; //End fix width
                                        echo '<a class="view-detail" href="' . esc_html(get_the_permalink()) . '">VIEW DETAIL</a>';

                                        echo '</div>'; //product info
                                        ?>

                                    </li>
                                    <?php
                                endwhile;
                            } else {
                                echo __('No products found');
                            }
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                    <?php $i++; endforeach; ?>
            </div>
        </div>
        <script type="text/javascript">
            (function ($) {
                "use strict";
                $('.nbt-product-tabs-<?php echo $instance['_sow_form_id'];?> .pst-item').click(function () {
                    $(".nbt-product-tabs-<?php echo $instance['_sow_form_id'];?> .pst-item").removeClass("active");
                });
                jQuery('.nbt-product-tabs-<?php echo $instance['_sow_form_id'];?> .nav-tabs').owlCarousel({
                    loop: false,
                    nav: false,
                    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                    slideSpeed: 800,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        400: {
                            items: 2,
                            nav: true
                        },
                        600: {
                            items: 3,
                            nav: true
                        },
                        992: {
                            items: 4,
                            nav: true
                        },
                        1200: {
                            items:<?php echo $number_cat;?>,
                            nav: false,
                            loop: false
                        }
                    }
                });

                <?php $i = 0; foreach($products_list_tab as $key => $value):?>
                <?php if($i == 0): ?> initialize_owl(jQuery('#nbt-product-tab-content-<?php echo $key;?>-<?php echo $instance['_sow_form_id'];?>')); <?php endif;?>
                jQuery('a[href="#nbt-product-tab-<?php echo $key;?>-<?php echo $instance['_sow_form_id'];?>"]').on('shown.bs.tab', function () {
                    initialize_owl(jQuery('#nbt-product-tab-content-<?php echo $key;?>-<?php echo $instance['_sow_form_id'];?>'));
                }).on('hide.bs.tab', function () {
                    destroy_owl(jQuery('#nbt-product-tab-content-<?php echo $key;?>-<?php echo $instance['_sow_form_id'];?>'));
                });
                <?php $i++; endforeach;?>

                function initialize_owl(el) {
                    el.owlCarousel({
                        //loop: true,
                        margin: <?php echo $margin;?>,
                        padding: <?php echo $padding;?>,
                        responsiveClass: true,
                        dots: <?php echo $showdot;?>,
                        autoplay: <?php echo $autoplay;?>,
                        autoplayTimeout: <?php echo $timeplay;?>,
                        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                        slideSpeed: 800,
                        responsive: {
                            0: {
                                items: 1 <?php //echo $number_phone;?>,
                                nav: true,
                            },
                            570: {
                                items: 2,
                                nav: true,
                            },
                            992: {
                                items: 3 <?php //echo $number_tablets;?>,
                                nav: true,
                            },
                            1200: {
                                items: 4 <?php //echo $number_desktops;?>,
                                nav: true,
                                loop: true
                            }
                        }
                    });
                }

                function destroy_owl(el) {
                    if (typeof el.data('owlCarousel') != 'undefined') {
                        el.data('owlCarousel').destroy();
                        el.removeClass('owl-carousel');
                    }
                }
            })(jQuery);
        </script>
    </div>

<?php endif; ?>