<?php
/**
 * LuisRamirez functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LuisRamirez
 */

if ( ! function_exists( 'luisramirezblog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function luisramirezblog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on LuisRamirez, use a find and replace
	 * to change 'luisramirezblog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'luisramirezblog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'luisramirezblog' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'luisramirezblog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'luisramirezblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function luisramirezblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'luisramirezblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'luisramirezblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function luisramirezblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'luisramirezblog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'luisramirezblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
}
add_action( 'widgets_init', 'luisramirezblog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function luisramirezblog_scripts() {

	wp_enqueue_style( 'luisramirezblog-bootsrap', get_template_directory_uri() . '/css/vendor/bootstrap.min.css', array(), true );

	wp_enqueue_style( 'luisramirezblog-fontawesome', get_template_directory_uri() . '/css/vendor/font-awesome.min.css', array(), true );

	wp_enqueue_style( 'luisramirezblog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'luisramirezblog-jquery', get_template_directory_uri() . '/js/vendor/jquery.min.js', array(), '20151215', true );

	wp_enqueue_script( 'luisramirezblog-bootsrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), '20151215', true );

	wp_enqueue_script( 'luisramirezblog-default', get_template_directory_uri() . '/js/default.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'luisramirezblog_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * Imagenes con clases img-responsive y img-radius
 */

 function bootstrap_responsive_images( $html ){
   $classes = 'img-responsive img-radius'; // separated by spaces, e.g. 'img image-link'
   // check if there are already classes assigned to the anchor
   if ( preg_match('/<img.*? class="/', $html) ) {
     $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
   } else {
     $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
   }
   // remove dimensions from images,, does not need it!
   $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
   return $html;
 }
 add_filter( 'the_content','bootstrap_responsive_images',10 );
 add_filter( 'post_thumbnail_html', 'bootstrap_responsive_images', 10 );



/**
 * Customize comment form default fields.
 * Move the comment_field below the author, email, and url fields.
 */

add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    $args['class_submit'] = 'btn btn-primary'; // since WP 4.1

    return $args;
}


add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
function bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

    $fields   =  array(
        'author' => '<div class="row"><div class="col-md-4"><div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',
        'email'  => '<div class="col-md-4"><div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>',
        'url'    => '<div class="col-md-4"><div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div></div>'
    );

    return $fields;
}

// awesome semantic comment

function luisramirez_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'article' == $args['style'] ) {
		$tag = 'article';
		$add_below = 'comment';
	} else {
		$tag = 'article';
		$add_below = 'comment';
	}

	?>
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
	<ul class="media-list">
		<li class="media">
			<div class="media-left">
				<figure class="gravatar img-circle"><?php echo get_avatar( $comment, 46); ?></figure>
			</div>
			<div class="media-body">
				<div class="comment-meta post-meta" role="complementary">
					<div class="comment-meta">
						<div class="username-comments">
							<?php comment_author(); ?>
						</div>
						<div class="date-comments">
							<time class="comment-meta-item" datetime="<?php comment_date('j \d\e\ F \d\e\ Y'); ?>" itemprop="datePublished"><?php comment_date('j \d\e\ F \d\e\ Y '); ?></time>
						</div>
					</div>
					<div class="comment-actions">
						<span class="reply-comments">
							<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</span>
					</div>
					<div class="comentario-comments">
						<div class="comment-content post-content" itemprop="text">
							<?php comment_text() ?>
						</div>
					</div>
						<!-- <?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?> -->
						<?php if ($comment->comment_approved == '0') : ?>
							<div class="alert alert-warning" role="alert">
								<p class="comment-meta-item">Tú comentario será publicamente cuando sea aprovado.</p>
							</div>
						<?php endif; ?>
				</div>
			</div>
		</li>
	</ul>

	<?php }

	// end of awesome semantic comment

	function luisramirez_comment_close() {
		echo '</article>';
	}


	/**
	 * Filter the "read more" excerpt string link to the post.
	 *
	 * @param string $more "Read more" excerpt string.
	 * @return string (Maybe) modified "read more" excerpt string.
	 */
	function wpdocs_excerpt_more( $more ) {
	    return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
	        get_permalink( get_the_ID() ),
	        __( 'Leer más..', 'textdomain' )
	    );
	}
	add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/*Function to defer or asynchronously load scripts not aggregated by Autoptimize*/
function js_async_attr($tag){

# Do not add defer or async attribute to these scripts
$scripts_to_exclude = array('script1.js', 'script2.js', 'script3.js');

foreach($scripts_to_exclude as $exclude_script){
	if(true == strpos($tag, $exclude_script ) )
	return $tag;
}

# Defer or async all remaining scripts not excluded above
return str_replace( ' src', ' defer="defer" src', $tag );
}
add_filter( 'script_loader_tag', 'js_async_attr', 10 );
