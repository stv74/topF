<?php
get_header();
?>

	<main id="primary" class="partners">
		<div class="container">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );				

			endwhile; // End of the loop.
			?>
		</div>

	</main><!-- #main -->

<?php
get_footer();
