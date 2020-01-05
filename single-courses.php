<?php
/**
 * The template for displaying all single posts.
 *
 * @package Sydney
 */

get_header(); ?>

	<div id="primary" class="container row">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/courses', 'single' ); ?>

		<?php endwhile; // end of the loop. ?>
		
		<div class="card card-hover pt-4 mt-2"><div class="col-md-12"><h3 class="text-center title is-3">Register Now</h3><?php echo do_shortcode( '[wpuf_profile type="registration" id="376"]' ); ?></div></div>
	</div><!-- #primary -->


<?php get_footer(); ?>
