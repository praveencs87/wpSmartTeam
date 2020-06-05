<?php
get_header();
?>



<!--team-details-section-->
<div class="team-details-section">
    <div class="container">
        <?php

        if (have_posts()) {

            while (have_posts()) {
                the_post();
                $custom = get_post_custom(get_the_ID());
                $border = (isset($custom["primary_color"][0])) ? $custom["primary_color"][0] : '#ffffff';
                if ($border == "")  $border = "#fff"
        ?>

                <section class="team-details-pic">
                    <article>
                        <div style="background-color:<?php echo $border; ?>;width: 90%;height: 90%;position: absolute;left: 0;top: 0;"></div>
                        <?php
                        the_post_thumbnail();
                        ?>
                        <div class="clear"></div>
                    </article>
                </section>

                <section class="team-details">
                    <h6><span>Get to know us<small></small></span></h6>
                    <h1><?php the_title(); ?>
                        <span></span></h1>
                    <?php
                    if (is_search() || !is_singular() && 'summary' === get_theme_mod('blog_content', 'full')) {
                        the_excerpt();
                    } else {
                        the_content(__('Continue reading', 'twentytwenty'));
                    }
                    ?>


                    <h6><span>Team Categories<small></small></span></h6>
                    <?php $wcatTerms = wp_get_post_terms(get_the_ID(), 'team-category', array('hide_empty' => 0, 'parent' => 0));
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



                    <h6><span>Team Location<small></small></span></h6>
                    <?php $wcatTerms = wp_get_post_terms(get_the_ID(), 'team-location', array('hide_empty' => 0, 'parent' => 0));
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





                    <h6><span>Team Designation<small></small></span></h6>
                    <?php $wcatTerms = wp_get_post_terms(get_the_ID(), 'team-designation', array('hide_empty' => 0, 'parent' => 0));
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








                </section>
        <?php
            }
        }

        ?>

        <section class="team-members">
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
                    <li> <a href="<?php the_permalink(); ?>">
                            <?php
                            the_title();
                            ?>
                        </a></li>

                <?php
                endwhile;

                wp_reset_postdata();
                ?>
            </ul>
        </section>


        <div class="clear"></div>

    </div>
</div>
<!--team-details-section_END-->


<?php get_footer(); ?>