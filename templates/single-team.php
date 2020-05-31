<?php
get_header();
?>

<main id="site-content" class="teamsinglemain" role="main">

    <?php

    if (have_posts()) {

        while (have_posts()) {
            the_post();
    ?>
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <div class="imagewrap">
                    <?php
                    the_post_thumbnail();
                    ?>
                </div>
                <div class="contentwrap">

                  
                    <div class="post-inner <?php echo is_page_template('templates/template-full-width.php') ? '' : 'thin'; ?> ">

                        <div class="entry-content">
                        <h3> 
                        <?php
                        the_title();
                        ?>
                    </h3>
                            <?php
                            if (is_search() || !is_singular() && 'summary' === get_theme_mod('blog_content', 'full')) {
                                the_excerpt();
                            } else {
                                the_content(__('Continue reading', 'twentytwenty'));
                            }
                            ?>
                            <h4>Team Categories</h4>
                            <?php $wcatTerms = get_terms('team-category', array('hide_empty' => 0, 'parent' => 0));
                            $catg = false;
                            foreach ($wcatTerms as $wcatTerm) :
                                $catg = true;
                            ?>
                                <ul>
                                    <li>
                                        <a href="<?php echo get_term_link($wcatTerm->slug, $wcatTerm->taxonomy); ?>"><?php echo $wcatTerm->name; ?></a>
                                        <ul class="megaSubCat">
                                            <?php
                                            $wsubargs = array(
                                                'hierarchical' => 1,
                                                'show_option_none' => '',
                                                'hide_empty' => 0,
                                                'parent' => $wcatTerm->term_id,
                                                'taxonomy' => 'team-location'
                                            );
                                            $wsubcats = get_categories($wsubargs);
                                            foreach ($wsubcats as $wsc) :
                                            ?>
                                                <li><a href="<?php echo get_term_link($wsc->slug, $wsc->taxonomy); ?>"><?php echo $wsc->name; ?></a></li>
                                            <?php
                                            endforeach;
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php
                            endforeach;

                            if (!$catg) {
                            ?>
                                <p>No Category Selected</p>
                            <?php
                            }

                            ?>



                            <h4>Team Location</h4>
                            <?php $wcatTerms = get_terms('team-location', array('hide_empty' => 0, 'parent' => 0));
                            $loc = false;
                            foreach ($wcatTerms as $wcatTerm) :
                                $loc = true;
                            ?>
                                <ul>
                                    <li>
                                        <a href="<?php echo get_term_link($wcatTerm->slug, $wcatTerm->taxonomy); ?>"><?php echo $wcatTerm->name; ?></a>
                                        <ul class="megaSubCat">
                                            <?php
                                            $wsubargs = array(
                                                'hierarchical' => 1,
                                                'show_option_none' => '',
                                                'hide_empty' => 0,
                                                'parent' => $wcatTerm->term_id,
                                                'taxonomy' => 'team-location'
                                            );
                                            $wsubcats = get_categories($wsubargs);
                                            foreach ($wsubcats as $wsc) :
                                            ?>
                                                <li><a href="<?php echo get_term_link($wsc->slug, $wsc->taxonomy); ?>"><?php echo $wsc->name; ?></a></li>
                                            <?php
                                            endforeach;
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php
                            endforeach;

                            if (!$loc) {
                            ?>
                                <p>No Location</p>
                            <?php
                            }

                            ?>





                            <h4>Team Designation</h4>
                            <?php $wcatTerms = get_terms('team-designation', array('hide_empty' => 0, 'parent' => 0));
                            $des = false;
                            foreach ($wcatTerms as $wcatTerm) :
                                $des = true;
                            ?>
                                <ul>
                                    <li>
                                        <a href="<?php echo get_term_link($wcatTerm->slug, $wcatTerm->taxonomy); ?>"><?php echo $wcatTerm->name; ?></a>
                                        <ul class="megaSubCat">
                                            <?php
                                            $wsubargs = array(
                                                'hierarchical' => 1,
                                                'show_option_none' => '',
                                                'hide_empty' => 0,
                                                'parent' => $wcatTerm->term_id,
                                                'taxonomy' => 'team-designation'
                                            );
                                            $wsubcats = get_categories($wsubargs);
                                            foreach ($wsubcats as $wsc) :
                                            ?>
                                                <li><a href="<?php echo get_term_link($wsc->slug, $wsc->taxonomy); ?>"><?php echo $wsc->name; ?></a></li>
                                            <?php
                                            endforeach;
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php
                            endforeach;

                            if (!$des) {
                            ?>
                                <p>No Designation Selected</p>
                            <?php
                            }

                            ?>
                        </div><!-- .entry-content -->

                    </div><!-- .post-inner -->





            </article><!-- .post -->

    <?php
        }
    }

    ?>
    </div>
</main><!-- #site-content -->

<aside class="teamaside">
    <ul>
        <?php
        $args = array(
            'post_type' => 'teams',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        );

        $loop = new WP_Query($args);

        while ($loop->have_posts()) : $loop->the_post();
        ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <?php
                    the_title();
                    ?>
                </a>
            </li>
        <?php
        endwhile;

        wp_reset_postdata();
        ?>
    </ul>
</aside>

<?php get_footer(); ?>