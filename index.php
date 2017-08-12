<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LuisRamirez
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="posts">

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>

				<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'blog' );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="container">
	<div class="row">
		<div class="navigation-blog">
			<div class="col-md-6">
				<div class="alignleft"><?php next_posts_link('<i class="fa fa-chevron-left" aria-hidden="true"></i> Artículos viejos') ?></div>
			</div>
			<div class="col-md-6">
				<div class="alignright"><?php previous_posts_link('Nuevos artículos <i class="fa fa-chevron-right" aria-hidden="true"></i>') ?></div>
			</div>
		</div>
	</div>
	</div>

<?php
get_footer();
