<?php
get_header();
?>

<div class="team-section">
<div class="container">

<h6><span>Get to know us<small></small></span></h6>
<h1>Teams</h1>

<?php

if (have_posts()) {

    while (have_posts()) {
        the_post();

      $custom = get_post_custom(get_the_ID());
      $border = (isset($custom["primary_color"][0])) ? $custom["primary_color"][0] : '#ffffff';
      if( $border=="")  $border="#fff"
?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
<section class="team-card">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


<div style="background-color: <?php echo $border;?>;width: 90%;height: 90%;position: absolute;right: 0;top: 0;"></div>
<?php the_post_thumbnail(); ?>
<h4><?php
the_title();
?>
</h4>
</article>
</section>
</a>
<?php
        }
    }

    ?>
<div class="clear"></div>

</div>
</div>
<!--team-section_END-->



<?php get_footer(); ?>