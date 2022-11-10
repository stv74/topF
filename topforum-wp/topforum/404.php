<?php
get_header();
?>

	<main class="page-404">

		<section class="error-404">			
			<h1 class="title error-404__title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'topforum' ); ?></h1>			
			<img src="<?php bloginfo('template_url'); ?>/assets/images/404.svg" class="error-404__img" alt="Page not found">
			<p class="error-404__text"><?php esc_html_e( 'Try going back to homepage and starting over.', 'topforum' ); ?></p>
			<a href="<?php echo home_url(); ?>" class="btn btn_reg btn_404 error-404__btn">Return Home</a>			
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
