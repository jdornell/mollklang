<?php
    /* Template Name: Portfolio */
    /* The template for displaying the portfolio of our website. */
?>

<?php get_header(); ?>

	<div class="row">
		<div class="col-sm-12">

			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
  	
					get_template_part( 'content', get_post_format() );
  
				endwhile; endif; 
			?>
            
            <?php $args = array( 'post_type' =>'portfolio', );
                $query = new WP_Query( $args ); ?>

            <?php 
                if ( $query->have_posts()) : while ( $query->have_posts() ) : $query->the_post(); 
            ?>

            <h4><?php the_field('title'); ?></h4>

            <a href="<?php the_field('url'); ?>">Link</a>

            <?php endwhile; ?><?else: ?> <?endif; ?>

		</div> <!-- /.col -->
	</div> <!-- /.row -->

<?php get_footer(); ?>