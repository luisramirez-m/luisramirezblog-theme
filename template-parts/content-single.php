<div class="blog-single">
<section class="single-post" id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<div class="entry-info">
						<!-- <div class="post-info-line-single"></div> -->
						<div class="post-info-single">
							<div class="fecha-articulo date updated published"><?php the_time('j \d\e\ F \d\e\ Y \ '); ?> </div>
							<div class="time-reading"><?php post_read_time(); ?></div>
							<div class="categoria"><a href=""><?php the_category( ', ' ); ?></a></div>
							<?php
							if ( is_sticky() )
								echo '<div class="featured"><i class="fa fa-bookmark" aria-hidden="true"></i></div>';
							?>
						</div>
					</div>
					<div class="entry-content">
						<?php the_content(); ?>

					</div>
					<footer class="footer-single">
						<hr class="foter-single-line">
						<div class="etiquetas-single">
							<div class="entry-tags">
								<div class="title-entry-tags">
									Etiquetas:
								</div>
								<?php the_tags('<ul><li class="tag-button solidgray">', '</li><li class="tag-button solidgray">', '</li></ul>'); ?>
							</div>
						</div>

						<div class="autor">
							 Autor: <a href="http:https://twitter.com/LuisRamirezMe"><span class="vcard author"><span class="fn"><?php the_author(); ?></span></span></a>
						</div>
					</footer>



					<!-- Form Comentarios-->
					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>


					<!-- Comentarios-->

				</article>
			</div>
		</div>
	</div>
</section>
</div>
