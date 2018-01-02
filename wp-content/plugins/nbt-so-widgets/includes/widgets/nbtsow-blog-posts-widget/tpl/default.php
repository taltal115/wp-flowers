<?php
$blog_args = array(
	'post_type' => 'post',
	'posts_per_page' => $quantity,
	'no_found_rows' => true,
);

$blog_loop = new WP_Query($blog_args);
if ( $blog_loop->have_posts() ) {
	?>
	<?php if(!empty($title)) {
		echo '<h3 class="nbtsow-title">' . $title . '</h3>';
	}?>

	<ul class="nbtsow-blog-posts clear <?php if($style !== 'custom') { echo $style;} ?>">
	<?php
	while ($blog_loop->have_posts()): $blog_loop->the_post();
	?>
		<?php if($layout == 'with_date'):?>
		<li class="nbtsow-blog-post">
			<div class="nbtsow-blog-thumb">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('home2-blog'); ?>
				</a>
			</div>

			<div class="nbtsow-blog-date">
				<span><?php the_time('d'); ?></span>
				<p><?php the_time('F'); ?></p>
			</div>

			<div class="nbtsow-blog-details">
				<h4 class="nbtsow-blog-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h4>
				<p class="nbtsow-blog-meta">
					<span class="nbtsow-blog-author">Post by <?php echo get_the_author(); ?></span>
					<span class="nbtsow-blog-comment"><?php comments_number(); ?> Comment(s)</span>
				</p>
				<p class="nbtsow-blog-excerpt"><?php echo wp_trim_words( get_the_content(), 55); ?></p>
			</div>
		</li>	
		<?php endif; ?>
		
		<?php if($layout == 'with_date_comment'):?>
		<li class="nbtsow-blog-post">
			<div class="nbtsow-blog-thumb">
				<a href="<?php the_permalink(); ?>">
					<?php if (has_post_thumbnail())  the_post_thumbnail('nb_home_blog'); ?>
				</a>
			</div>

			<div class="nbtsow-blog-details">
				<h4 class="nbtsow-blog-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h4>

				<?php if($layout == 'with_date_comment'): ?>
					<div class="nbt-blog-meta">
						<span class="nbtsow-post-date"><?php the_time('F j, Y'); ?></span> |
						<span class="nbtsow-post-comment"><?php comments_number(); ?></span>
					</div>
				<?php endif; ?>

				<p class="nbtsow-blog-excerpt">
				<?php 
					echo wp_trim_words( get_the_content(), 13);
				?>
				</p>

				<a href="<?php the_permalink(); ?>" class="nbtsow-read-more">Read More</a>

			</div>
		</li>
		<?php endif; ?>

		<?php if($layout == 'home2_flower'):?>
		<li class="nbtsow-blog-post">
			<?php $cates = get_the_category(); ?>
			<div class="nbtsow-blog-thumb">
				<a href="<?php the_permalink(); ?>">
					<?php if (has_post_thumbnail()) the_post_thumbnail('home2-blog'); ?>
				</a>
			</div>

			<div class="home2-blog-date">
				<span><?php the_time('d'); ?></span>
				<p><?php the_time('F'); ?></p>
			</div>

			<div class="nbtsow-blog-details">
				<h4 class="nbtsow-blog-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h4>

				<p class="nbtsow-blog-meta">
					<span class="nbtsow-blog-author"><i class="fa fa-user"></i><?php echo get_the_author() ?></span>
					<span class="nbtsow-blog-comment"><i class="fa fa-comment"></i><?php comments_number() ?></span>
					<span class="nbtsow-blog-category">
						<i class="fa fa-tags"></i>
						<?php 
							$ch = 0;
							foreach ($cates as $cate) {
								
								if($ch < count($cates)-1){
									echo $cate->name .' , ';
								}else{
									echo $cate->name;
								}

								$ch++;
							}
						?>
					</span>
				</p>
				
				<a href="<?php the_permalink(); ?>" class="nbtsow-read-more">Read More</a>
			</div>
		</li>
		<?php endif; ?>
	<?php
	endwhile;
	?>
	</ul>
	<?php
	wp_reset_postdata();
}
?>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#flower-home1-blog-post .nbtsow-blog-posts').each(function(){
		    jQuery(this).addClass('owl-carousel');
		    jQuery(this).owlCarousel({
		        items:1,
		        nav:true,
		        navText:[
		            "<i class='fa fa-angle-left fa-2x'></i>",
		            "<i class='fa fa-angle-right fa-2x'></i>"
		        ],
		        dots:false,
		        margin: 30,
		        responsive:{
		            0:{
		                items:1,
		            },
		            780:{
		                items:2,
		            },
		            1200:{
		                items:2,
		            }    
		        }
		    });
		});
	});
	jQuery(document).ready(function($) {
				$('.home2-blog .nbtsow-blog-posts').each(function(){
				    jQuery(this).addClass('owl-carousel');
				    jQuery(this).owlCarousel({
				        items:3,
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
				            641:{
				            	items:2,	
				            },
				            780:{
				                items:3,
				            },
				            1200:{
				                items:3,
				            }    
				        }
				    });
				});
			});
</script>
