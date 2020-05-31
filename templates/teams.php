<?php
get_header();
?>
<h1 style="text-align: center;">Teams</h1>
<main id="site-content" class="teamlisting" role="main">

    <?php

    if (have_posts()) {

        while (have_posts()) {
            the_post();
    
          $custom = get_post_custom(get_the_ID());
          $border = (isset($custom["primary_color"][0])) ? $custom["primary_color"][0] : '#ffffff';
          if( $border=="")  $border="#fff"
    ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="border: 5px solid <?php echo $border;?>">
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                <?php
        
                the_post_thumbnail();
                the_title();
                ?>



                <?php

                if ((is_single())) {
                ?>



                <?php
                }
                ?>

            </article><!-- .post -->
    </a>
    <?php
        }
    }

    ?>

</main><!-- #site-content -->


<?php get_footer(); ?>