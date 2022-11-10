<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="title"><?php the_title(); ?></h1>
	<?php
	the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'topforum' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			wp_kses_post( get_the_title() )
		)
	);			
	?>	
</article><!-- #post-<?php the_ID(); ?> -->

