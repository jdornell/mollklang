<?php get_header(); ?>

	<div class="row">

		<div class="column">

			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
  	
					get_template_part( 'content', get_post_format() );
  
				endwhile; endif; 
			?>

		</div> <!-- /.column -->

		<?php /*get_sidebar();*/ ?>

	</div> <!-- /.row -->

<?php get_footer(); ?>