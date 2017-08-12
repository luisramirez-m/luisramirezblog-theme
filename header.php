<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LuisRamirez
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="icon" href="">
  <!-- Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Domine:400,700|Open+Sans:300,400,700" rel="stylesheet"> -->
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
	<meta name="author" content="Luis Ramirez">
	<?php wp_head(); ?>
	<script src="https://cdn.jsdelivr.net/ga-lite/latest/ga-lite.min.js" async></script>
	<script>
		var galite = galite || {}; galite.UA = 'UA-52527665-5'; // Insert your tracking code here
	</script>
</head>

  <body <?php body_class(); ?>>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="personal-image">
                        <div class="logo text-center">
                            <a href="#">
                                <img src="" alt="">
                            </a>
                        </div>
                        <div class="name-blog text-center">
                            <a href="<?php bloginfo('url'); ?>"><h1>Luis Ramirez</a></h1>
                        </div>
                        <p class="bio text-center">Diseñador web, Geek amante de la técnología y todo lo relacionado. A veces Tuiteo (AKA Twitteo) en <a href="https://twitter.com/LuisRamirezMe">@LuisRamirezMe</a>.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <nav class="menu navbar">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div id="navbar" class="collapse navbar-collapse">
                           <?php wp_nav_menu(
                              array(
                                  'theme_location' => 'menu-1',
                                  'menu_id' => 'primary-menu',
                                  'menu_class' => 'nav navbar-nav',
                                  ) ); ?>
                              </div>
                          </nav>
                      </div>
                  </div>
              </div>
          </header>
