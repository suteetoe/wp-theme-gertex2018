<?php

get_header(); ?>

	<div class="container" >
		<div class="row" >
		<section id="primary" class="content-area col-sm-12 <?php echo is_active_sidebar( 'sidebar' ) ? "col-lg-8" : "col-lg-12"; ?>">
			<main id="main" class="site-main" role="main">
						
				<?php while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					//comments_template();

				endwhile; ?>
			
			</main><!-- #main -->
		</section><!-- #primary -->
			
		<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>
