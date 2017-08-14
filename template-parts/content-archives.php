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
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="years">
                <?php
                $all_posts = get_posts(array(
                'posts_per_page' => -1 // to show all posts
                ));

                // this variable will contain all the posts in a associative array
                // with three levels, for every year, month and posts.

                $ordered_posts = array();

                foreach ($all_posts as $single) {
                    $year  = mysql2date('Y', $single->post_date);
                    $month = mysql2date('F', $single->post_date);

                    // specifies the position of the current post
                    $ordered_posts[$year][$month][] = $single;
                }

                // iterates the years
                foreach ($ordered_posts as $year => $months) {
                    ?>


                <h3 class="title-years-archives"><?php echo $year ?></h3>

                <div class="months">
                <?php foreach ($months as $month => $posts) { // iterates the moths?>

                <!-- <h3><?php printf("%s (%d)", $month, count($months[$month])) ?></h3> -->

                <div class="posts">
                  <?php foreach ($posts as $single) { // iterates the posts?>
                      <div class="row post-single-archive">
                          <div class="col-md-3 text-right">
                              <span class="date-archives text-muted fecha-articulo date updated published"><?php echo mysql2date(' j \d\e\ F ', $single->post_date) ?></span>
                              <div class="autor autor-blog">
          						 Autor: <a href="http:https://twitter.com/LuisRamirezMe"><span class="vcard author"><span class="fn"><?php the_author(); ?></span></span></a>
          					</div>
                          </div>
                          <div class="col-md-9 entry-title">
                              <a href="<?php echo get_permalink($single->ID); ?>"><?php echo get_the_title($single->ID); ?></a>
                          </div>
                    </div>

                  <?php
                    } // ends foreach $posts?>
                </div> <!-- ul.posts -->


                <?php
                    } // ends foreach for $months?>
                </div> <!-- ul.months -->

                <?php
                } // ends foreach for $ordered_posts
                ?>
            </div><!-- ul.years -->
            </div>
        </div>
    </div>
</div>
