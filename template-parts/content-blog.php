<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LuisRamirez
 */

?>
<div class="blog">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">

			<div class="col-md-3">
				<div class="post-info">
					<div class="post-info-line-blog"></div>
					<div class="fecha-articulo date updated published"><?php the_time(' j \d\e\ F \d\e\ Y \ '); ?> </div>
					<div class="categoria"><a href=""><?php the_category(', '); ?></a></div>
					<div class="autor autor-blog">
						 Autor: <a href="http:https://twitter.com/LuisRamirezMe"><span class="vcard author"><span class="fn"><?php the_author(); ?></span></span></a>
					</div>
					<?php
                    if (is_sticky()) {
                        echo '<div class="featured"><i class="fa fa-bookmark" aria-hidden="true"></i></div>';
                    }
                    ?>
				</div>
			</div>

			<div class="col-md-9">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"> <?php the_title(); ?></a></h1>
				<p><?php the_excerpt('Read on...'); ?></p>
			</div>
		</div>
	</article><!-- #post-## -->
</div>
