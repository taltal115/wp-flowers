<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Nb_flower
 */

if ( ! function_exists( 'nb_flower_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function nb_flower_posted_on() {

	$time_string = get_the_date('F j, Y');

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'nb_flower' ),
		'<span class="icon-calendar-empty entry-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'nb_flower' ),
		'<span class="author vcard icon-user"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);	

	echo  $byline;
	echo  $posted_on;
	echo '<span class="comments-link icon-comment-empty">';
	comments_popup_link(
		esc_html__( 'Leave a Comment', 'nb_flower' ),
		esc_html__( '1', 'nb_flower' ),
		esc_html__( '%', 'nb_flower' )
	);
	echo '</span>';
}
endif;

if ( ! function_exists( 'nb_flower_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function nb_flower_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'nb_flower' ) );
		if ( $categories_list && nb_flower_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'nb_flower' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'nb_flower' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'nb_flower' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}


	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( esc_html__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'nb_flower' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'nb_flower' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function nb_flower_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'nb_flower_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'nb_flower_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so nb_flower_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so nb_flower_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in nb_flower_categorized_blog.
 */
function nb_flower_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'nb_flower_categories' );
}
add_action( 'edit_category', 'nb_flower_category_transient_flusher' );
add_action( 'save_post',     'nb_flower_category_transient_flusher' );

function nb_flower_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset ( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'nb_flower'     => $pagenum_link,
		'format'    => $format,
		'total'     => $GLOBALS['wp_query']->max_num_pages,
		'current'   => $paged,
		'mid_size'  => 1,
		'add_args'  => array_map( 'urlencode', $query_args ),
		'prev_text' =>  wp_kses(__('<i class=\'fa fa-chevron-left\'></i>', 'nb_flower' ), array('i' => array('class' => array()))),
		'next_text' => wp_kses(__( '<i class=\'fa fa-chevron-right\'></i>', 'nb_flower' ), array('i' => array('class' => array()))),
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="pagination loop-pagination">
			<?php echo wp_kses($links, array(
				'a' => array(
					'href' => array(),
					'class' => array()
				),
				'i' => array(
					'class' => array()
				),
				'span' => array(
					'class' => array()
				)
			)); ?>
		</div><!--/ .pagination -->
	</nav><!--/ .navigation -->
	<?php
	endif;
}

if ( ! function_exists('nb_flower_get_option') ) {
    function nb_flower_get_option($id, $fallback = false, $key = false ) {
        global $nb_flower_options;
        if ( $fallback == false ) $fallback = '';
        $output = ( isset($nb_flower_options[$id]) && $nb_flower_options[$id] !== '' ) ? $nb_flower_options[$id] : $fallback;
        if ( !empty($nb_flower_options[$id]) && $key ) {
            $output = $nb_flower_options[$id][$key];
        }
        return $output;
    }
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_product-advanced-infor',
		'title' => esc_html__('Product	Advanced Infor','nb_flower'),
		'fields' => array (
			array (
				'key' => 'field_57ac36761194c',
				'label' => esc_html__('info product 01','nb_flower'),
				'name' => 'info_product_01',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57ac37601194d',
				'label' => esc_html__('Info product 02','nb_flower'),
				'name' => 'info_product_02',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57ac37951194e',
				'label' => esc_html__('Info product 03','nb_flower'),
				'name' => 'info_product_03',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


function nb_flower_get_product_info(){
	if(function_exists('get_field')):
	    $info01 = get_field('info_product_01');
	    $info02 = get_field('info_product_02');
	    $info03 = get_field('info_product_03');
    endif;
?>
    <div class="product_advance_info">
        <?php if( $info01 != '' ): ?>
        <p class="product_info product_info1"><?php echo  esc_html($info01) ?></p>
        <?php endif; ?>
        <?php if( $info02 != '' ): ?>
        <p class="product_info product_info2"><?php echo  esc_html($info02) ?></p>
        <?php endif; ?>
        <?php if( $info03 != '' ): ?>
        <p class="product_info product_info3"><?php echo  esc_html($info03) ?></p>
        <?php endif; ?>
    </div>
<?php
}


