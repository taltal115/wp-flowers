<?php
/*
  Widget Name: NetbaseTeam Woocommece Tabs Product
  Description: Woocommer Product Tabs.
  Author: NetBaseTeam
  Author URI: https://netbaseteam.com
 */

class NBTSOW_WC_Product_Tabs_Widget extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'nbtsow-wc-product-tabs-widget', esc_html__('NetbaseTeam Woocommece Product Tabs', 'nbtsow'), array(
            'description' => esc_html__('NetbaseTeam Woocommece Product Tabs', 'nbtsow'),
            'panels_groups' => array('netbaseteam')
                ), array(
                ), false, plugin_dir_path(__FILE__) . '../'
        );
    }

    function initialize_form() {

        return array(
            'layout_template' => array(
                'type' => 'select',
                'label' => esc_html__('Choose layout products template', 'nbtsow'),
                'default' => 'normal',
                'options' => array(
                    'best-sell' => esc_html__('Best seller products', 'nbtsow'),
                    'hot-deal' => esc_html__('Hot deals products', 'nbtsow'),
                    'feature-product' => esc_html__('Feature products', 'nbtsow'),
                    'new-product' => esc_html__('New products', 'nbtsow')
                ),
                'state_emitter' => array(
                    'callback' => 'select',
                    'args' => array( 'layout_template' )
                ),
            ),                  

            'categories' => array(
                'type' => 'repeater',
                'label' => esc_html__('Add Category', 'nbtsow'),
                'item_name' => esc_html__('Category', 'nbtsow'),
                'item_label' => array(
                    'selector' => "[id*='teams-name']",
                    'update_event' => 'change',
                    'value_method' => 'val'
                ),
                'fields' => array(
                    'category' => array(
                        'type' => 'select',
                        'label' => esc_html__('Select category'),
                        'options' => $this->getCategories()
                    ),
                    'font_class' => array(
                        'type' => 'text',
                        'label' => esc_html__('Font icon class', 'nbtsow'),
                    ),
                )
            ),
            'quantity' => array(
                'type' => 'slider',
                'label' => esc_html__('Number of products to display', 'nbtsow'),
                'default' => 8,
                'min' => 1,
                'max' => 8,
                'integer' => true
            )
        );
    }

    function getCategories() {
        $term_names = get_terms('product_cat', 'orderby=name&fields=id=>name&hide_empty=0');
        $term_slugs = get_terms('product_cat', 'orderby=name&fields=id=>slug&hide_empty=0');

        $categories = array();
        foreach ($term_slugs as $key => $term_slug) {
            $categories[$term_slug] = $term_names[$key];
        }

        return $categories;
    } 

    function getProductsList($instance){
        $product_list = array();
       
        if($instance['categories']){
            foreach ($instance['categories'] as $category){
                $args = array( 
                    'post_type' => 'product',
                    'stock' => 1,
                    'product_cat' => $category['category'],
                );
                $query_post = new WP_Query( $args );
                $product_list[$category['category']] = $query_post->posts;
            }
        }
       
        $cate_list = array();
        if($product_list){
            foreach ($product_list as $key => $posts){
                if($posts){
                    foreach ($posts as $post){
                        $product_list_cate[$key][] = wp_get_post_terms($post->ID, 'product_cate', array("fields" => "ids"));
                    }
                }else{
                    $product_list_cate[$key][] = '';
                }
            }
            
            if($product_list_cate){
                foreach ($product_list_cate as $key => $cates){
                    foreach ($cates as $cate){
                        
                        if($cate){
                            foreach($cate as $b){
                                $cate_list[$key][] = $b;
                            }
                        }  else {
                            $cate_list[$key] = '';
                        }
                    }
                }
            }
            
        }
         
        return $cate_list;
    }
    
    function getFontClass($instance){
        $class_list = array();
        if($instance['categories']){
            foreach ($instance['categories'] as $category){
                $class_list[$category['category']] = $category['font_class'];
            }
        }
        
        return $class_list;
    }
    
    function get_template_variables($instance, $args) {
        return array(
            'layout_template' => $instance['layout_template'],
            'quantity' => $instance['quantity']
        );
    }

    function get_template_name($instance) {
        $template = '';
        if( $instance['layout_template'] == 'best-sell' ) {
            $template = 'best-sell';
        } elseif ( $instance['layout_template'] == 'hot-deal' ) {
            $template = 'hot-deal';

        } elseif ( $instance['layout_template'] == 'feature-product' ) {
            $template = 'feature-product';

        } else {
            $template = 'new-product';
        }
        return $template;
    }
    
    function get_style_name($instance) {
        return '';
    }

}

siteorigin_widget_register('nbtsow-wc-product-tabs-widget', __FILE__, 'NBTSOW_WC_Product_Tabs_Widget');