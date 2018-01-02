<?php
/*
* Template Name: Home
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
					<div class="row">					
					<?php 
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
			</div>			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
