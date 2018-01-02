<?php
if ( !class_exists('NBTSOW_Tabs_Post_By_Category_Widget') ) {
	class NBTSOW_Tabs_Post_By_Category_Widget extends WP_Widget {
		function __construct() {	        
	        
			// ajax functions
			add_action('wp_ajax_nbtsow_content', array(&$this, 'ajax_nbtsow_content'));
			add_action('wp_ajax_nopriv_nbtsow_content', array(&$this, 'ajax_nbtsow_content'));
	        add_action('wp_enqueue_scripts', array(&$this, 'wpt_register_scripts'));    

			$widget_ops = array('classname' => 'nbtsow', 'description' => __('Display posts by category in tabbed format.', 'nbtsow'),
				'panels_groups' => array('netbaseteam')
				);
			
			parent::__construct(
				'nbtsow-tabs-post-by-category-widget', 
				__('NBT Tab Post by Category', 'nbtsow'), $widget_ops);
	    }
	    
	    function wpt_register_scripts() { 
			// JS    
			wp_register_script('nbtsow', plugins_url('/assets/js/wp-tab-widget.js', __FILE__), array('jquery'));
			wp_localize_script( 'nbtsow', 'wpt',         
				array( 'ajax_url' => admin_url( 'admin-ajax.php' ))
			);
			wp_enqueue_style('nbtsow_style', plugins_url() . '/nbt-so-widgets/includes/widgets/nbtsow-tabs-post-by-category-widget/assets/css/nbt-tabs-blog.css');
	    }

		function form( $instance ) {
			extract($instance);
			?>
	        <div class="wpt_options_form">  
	        	<div class="wpt_select_tabs">
					<label for="<?php echo $this->get_field_id('txtcat'); ?>">
							<?php _e('Text', 'nbtsow'); ?>			
							<br />
					<input type="text" id="<?php echo $this->get_field_id('txtcat'); ?>" name="<?php echo $this->get_field_name('txtcat'); ?>" value="<?php echo $txtcat; ?>" />
				</div>     
	        
	        	<div class="wpt_select_tabs">
					<label for="<?php echo $this->get_field_id('slugcat'); ?>">
							<?php _e('Slug Category:', 'nbtsow'); ?>		
							<?php _e('Enter the slugs separated by commas (ex: slug1,slug2,slug3) ', 'nbtsow'); ?>		
							
							<br />
					<input type="text" id="<?php echo $this->get_field_id('slugcat'); ?>" name="<?php echo $this->get_field_name('slugcat'); ?>" value="<?php echo $slugcat; ?>" />
				</div>
			</div>
			<?php 
		}	

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;    
			$instance['tabs'] = $new_instance['tabs'];		
			$instance['slugcat'] = $new_instance['slugcat'];
			$instance['txtcat'] = $new_instance['txtcat'];	
					
			return $instance;	
		}	
		function widget( $args, $instance ) {

			extract($args);     
			extract($instance); 
			$slugcat= $instance['slugcat'];

			//echo nl2br(htmlentities  ($instance['tab1content'])); 
			wp_enqueue_script('nbtsow'); 
			wp_enqueue_style('nbtsow');  
			if (empty($tabs)) $tabs = array('recent' => 1, 'popular' => 1);    
			$tabs_count = count($tabs);     
			if ($tabs_count <= 1) {   
				$tabs_count = 1;       
			} elseif($tabs_count > 3) {   
				$tabs_count = 4;      
			}			
	        
			$available_tabs = explode(",",$slugcat);

			/*foreach($available_tabs as $key => $value){
			    echo "Key: $key. Value: $value<br>";
			}*/

	        /*$available_tabs = array('popular' => $instance['tab1title'], 
	            'recent' => __('Recent', 'nbtsow'), 
	            'comments' => __('Comments', 'nbtsow'), 
	            'product' => __('Product', 'nbtsow'), 
	            'tags' => __('Tags', 'nbtsow'));*/
	        
			?>	
			<?php echo $before_widget; ?>	
			<div class="nbtsow_content" id="<?php echo $widget_id; ?>_content" data-widget-number="<?php echo esc_attr( $this->number ); ?>">
				<?php if($txtcat && $txtcat !=''): ?>	
				<div class="txtcat"><?php echo $txtcat; ?></div>
				<?php endif; ?>
				<ul class="wpt-tabs <?php echo "has-$tabs_count-"; ?>tabs">
	                <?php foreach ($available_tabs as $key => $value) { ?>
	                        <li class="tab_title">
		                        <a href="#" id="<?php echo $key; ?>-tab">
		                        <?php 
		                        	$idObj = get_category_by_slug($value ); 
									if ( $idObj instanceof WP_Term ) {
									    echo $idObj->name;
									}else{
										echo 'Slug not found';
									}							
		                        ?></a>
	                        </li>		                    
	                <?php } ?> 
				</ul>
				<div class="clear"></div>  
				<div class="inside nbt-tabcontent">  
				      <?php foreach ($available_tabs as $key => $value) { ?>
				      	<div id="<?php echo $key; ?>-tab-content" class="tab-content">				
						</div>
				      <?php } ?>					
					<div class="clear"></div>
				</div> <!--end .inside -->				
				<div class="clear"></div>
			</div><!--end #tabber -->
			
			<script type="text/javascript">  
				jQuery(function($) {
					$('#<?php echo $widget_id; ?>_content').data('args', <?php echo json_encode($instance); ?>);
				});  
			</script>  
			<?php echo $after_widget; ?>
			<?php 
		}  		

		function ajax_nbtsow_content() {
			$tab = $_POST['tab'];
			$args = $_POST['args'];  

			$arrslugcat = explode(",",$args['slugcat']);			
			
			if(isset($_POST['widget_number'])) {
				$number = intval( $_POST['widget_number'] );				
			}
			$page = intval($_POST['page']);    
			if ($page < 1)        
				$page = 1;

			if ( !is_array( $args ) || empty( $args ) ) { // json_encode() failed
				$nbtsows = new NBTSOW_Tabs_Post_By_Category_Widget();
				$settings = $nbtsows->get_settings();

				if ( isset( $settings[ $number ] ) ) {
					$args = $settings[ $number ];
				} else {
					die( __('Unable to load tab content', 'nbtsow') );
				}
			}
			foreach ($arrslugcat as $key => $value) {
			    switch($tab){
			        case $key:
			        //print 'Variable $x tripped switch: '.$value.'<br>';
			        if($value){
			        	$catname = trim($value);
			        }else{
			        	$catname = '';
			        }
			        $args = array( 'posts_per_page' => 6, 'category_name'=>$catname, 'status' => 'publish', 'orderby' => 'desc' );
					$loop = new WP_Query( $args );
					$showcount = $loop->post_count;	
						
					if ( $loop->have_posts() ) {
											
						$citem=1;			
						while ( $loop->have_posts() ) : $loop->the_post();
						?>
						<div class="col-md-4 col-sm-6 col-xs-12 block-recent <?php if($citem==1 || $citem==4){echo 'r1';} ?>">
							<div class="w-block-recent">
								<div class="image-recent">
									<?php
									if( has_post_thumbnail( ) ) {
										the_post_thumbnail('home2-blog');
									}
									?>
								</div>
								<div class="info-recent">
									<h3 class="title"><?php the_title(); ?></h3>
									<?php
										//if ( has_excerpt() ){
											echo '<div class="text-recent"><p>';
											echo wp_trim_words( get_the_excerpt(), 30, '...' ); 
											echo '</p></div>';
										//}
									?>
									
									<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e('read more', 'wpnetbase'); ?></a>
								</div>
							</div>
						</div>
						
						<?php
						$citem ++;
						endwhile;
									
					}else{ 
						echo '<p>No post found</p>';
									
					}
			        break;
			    }
			}            
			die(); // required to return a proper result  
		}
	    
	}
}
add_action( 'widgets_init', create_function( '', 'register_widget( "NBTSOW_Tabs_Post_By_Category_Widget" );' ) );
?>