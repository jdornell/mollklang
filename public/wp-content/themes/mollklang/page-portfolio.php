<?php
    /* Template Name: Portfolio */
    /* The template for displaying the portfolio of the website. */
?>

<?php get_header(); ?>

<?php
    // Get 'portfolio' posts
    $portfolio_items = get_posts( array(
	    'post_type' => 'portfolio',
	    'posts_per_page' => -1,
	    'orderby' => 'title',
    ) );

    if ( $portfolio_items ):
?>

        <div class="row main-content">
            <div class="column">
                <h3><?php the_title() ?></h3>
            </div>
        </div>

        <div class="row">

            <?php 
                foreach ($portfolio_items as $post): 
                setup_postdata($post);
            ?>

            <div class="column portfolio-item">
                <a href="<?php the_permalink(); ?>" style="background-image: url(<?php the_field('thumbnail'); ?>);"></a>
                <?php the_content(); ?>
                <p><?php the_title(); ?></p>
            </div>
                
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

<?php get_footer(); ?>