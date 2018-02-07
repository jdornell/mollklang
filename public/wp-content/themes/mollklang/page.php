<?php get_header(); ?>

	<div class="row">
		<div class="column">

			<!--?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
  	
					get_template_part( 'content', get_post_format() );
  
				endwhile; endif; 
			?-->

			<h3><?php the_title() ?></h3>

		</div> <!-- /.column -->
	</div> <!-- /.row -->

<?php get_footer(); ?>