<?php
    /* Template Name: Single Portfolio Item */
    /* The template for displaying a single portfolio item. */
?>

<?php get_header(); ?>

<div class="row">
    <h2>Single portfolio item</h2>
</div>

<div class="row">
    <?php  while ( have_posts() ) : the_post(); ?>
        <div class="column">
            <h4><?php the_field('title'); ?></h4>

            <p>
                <?php the_field('description'); ?>
            </p>
        </div>
        <div class="column videoWrapper">
            <?php the_field('url'); ?>
        </div>
       
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>