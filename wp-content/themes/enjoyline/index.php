<?php get_header(); ?>	

	<div id="primary" class="content-area clear">	

		<main id="main" class="site-main clear">		

			<?php if(is_paged()): ?>
				<div class="breadcrumbs clear">		
					<h3>
						<?php esc_html_e('Page', 'enjoyline'); ?> <?php echo get_query_var('paged'); ?>
					</h3>	
				</div><!-- .breadcrumbs -->				
			<?php endif; ?>
			<div id="recent-content" class="content-loop">

				<?php

				// Define custom query args
				$args = array( 
	  				'paged' => get_query_var('paged')
				);  

				$wp_query = new WP_Query($args);	

				if ( $wp_query->have_posts() ) :	
				
				/* Start the Loop */
				while ( $wp_query->have_posts() ) : $wp_query->the_post();

					get_template_part('template-parts/content', 'loop');

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				?>

			</div><!-- #recent-content -->		

			<?php get_template_part( 'template-parts/pagination', '' ); ?>

		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
