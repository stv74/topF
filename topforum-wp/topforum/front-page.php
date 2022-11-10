<?php
	get_header(); 
?>

		<!-- Promo -->
		<section class="promo">
			<div class="container">
				<div class="promo__slider">
					<?php 
						$my_posts = get_posts( array(
							'numberposts' => -1,
							'orderby'     => 'date',
							'order'       => 'ASC',
							'post_type'   => 'slider-promo',
							'suppress_filters' => true, 
						) );

						foreach( $my_posts as $post ){
							setup_postdata( $post );
							?>
							<div>
								<div class="promo__slide">
									<div class="promo__slide-date">
										<div class="promo__slide-day"><?php the_field('promo_date') ?></div>
										<div class="promo__slide-month"><?php the_field('promo_month') ?></div>
										<div class="promo__slide-year"><?php the_field('promo_year') ?></div>
									</div>
									<div class="promo__slide-info">
										<div class="promo__slide-title"><?php the_field('promo_title') ?></div>
										<div class="promo__slide-text">
											<?php the_field('promo_text') ?>
										</div>
										<div class="promo__slide-addr"><?php the_field('promo_place') ?></div>
									</div>
								</div>
							</div>
							<?php							
						}
						wp_reset_postdata(); // сброс
					?>					
				</div>
			</div>
		</section>
		<!-- / Promo -->

		<!-- Advantages -->
		<section class="advantages">
			<div class="container">
				<h2 class="visually-hidden">
					<?php the_field('title_about') ?>
				</h2>
				<p class="advantages__text">
					<?php the_field('about_company') ?>
				</p>
				<div class="advantages__wrapper">
					<div class="advantages__item">
						<div class="advantages__icon">
							<img src="<?php echo bloginfo('template_url'); ?>/assets/icons/members_1.png" alt="" />
						</div>
						<h3 class="advantages__title"><?php the_field('advantages_title_1') ?></h3>
						<p class="advantages__descr">
							<?php the_field('advantages_description_1') ?>
						</p>
						<a href="<?php the_field('advantages_link_1'); ?>" class="btn advantages__btn">Learn more</a>
						<div class="advantages__sign"><?php the_field('conference_name') ?></div>
					</div>
					<div class="advantages__item">
						<div class="advantages__icon">
							<img src="<?php echo bloginfo('template_url'); ?>/assets/icons/members_2.png" alt="" />
						</div>
						<h3 class="advantages__title"><?php the_field('advantages_title_2') ?></h3>
						<p class="advantages__descr">
							<?php the_field('advantages_description_2') ?>
						</p>
						<a href="<?php the_field('advantages_link_2'); ?>" class="btn advantages__btn">Learn more</a>
						<div class="advantages__sign"><?php the_field('conference_name') ?></div>
					</div>
					<div class="advantages__item">
						<div class="advantages__icon">
							<img src="<?php echo bloginfo('template_url'); ?>/assets/icons/members_3.png" alt="" />
						</div>
						<h3 class="advantages__title"><?php the_field('advantages_title_3') ?></h3>
						<p class="advantages__descr">
							<?php the_field('advantages_description_3') ?>
						</p>
						<a href="<?php the_field('advantages_link_3'); ?>" class="btn advantages__btn">Learn more</a>
						<div class="advantages__sign"><?php the_field('conference_name') ?></div>
					</div>					
				</div>
				<div class="advantages__buttons">
					<a href="<?php echo home_url( '/registration' ); ?>" class="btn btn_reg">Register now</a>
					<button
						data-modal="subscribe"
						class="btn btn_reg btn_subscr advantages__subscr popmake-451"
					>
						Subscribe
					</button>
				</div>
			</div>
		</section>
		<!-- / Advantages -->

		<!-- Reviews -->
		<section class="reviews">
			<div class="container">
				<h2 class="title"><?php the_field('reviews_title') ?></h2>
				<div class="reviews__slider">
					<?php 
						$my_posts = get_posts( array(
							'numberposts' => -1,
							'orderby'     => 'date',
							'order'       => 'ASC',
							'post_type'   => 'slider_reviews',
							'suppress_filters' => true, 
						) );

						foreach( $my_posts as $post ){
							setup_postdata( $post );
							?>
							<div class="reviews__slide">
								<?php 
									if (get_field('review_img')) { 
										?>
										<img
											src="<?php the_field('review_img'); ?>"
											alt="Photo of customer"
											class="reviews__img"
										/>
									<?php
									} 
									else {
										?>
										<img src="<?php bloginfo('template_url'); ?>/assets/images/no_photo.png" alt="Nofoto" class="reviews__img">
										<?php
									}
								?> 
								<div class="reviews__wrap">
									<div class="reviews__name"><?php the_title(); ?></div>
									<div class="reviews__date"><?php the_time('d F Y') ?></div>
									<div class="reviews__text">
										<?php the_field('review_text') ?>
									</div>
								</div>
							</div>
							<?php							
						}
						wp_reset_postdata(); // сброс
					?>					
				</div>
			</div>
		</section>
		<!-- / Reviews -->

		<!-- Video -->
		<section class="video">
			<div class="container">
				<h2 class="title"><?php the_field('video_title') ?></h2>
				<div class="video__wrapper-out">
					<div class="video__wrapper-in">
						<?php the_field('video') ?>
					</div>
				</div>
			</div>
		</section>
		<!-- / Video -->

		<!-- Clients -->
		<section class="clients">
			<div class="container">
				<h2 class="title"><?php the_field('clients_title') ?></h2>
				<div class="clients__slider">
					<?php 
						$my_posts = get_posts( array(
							'numberposts' => -1,
							'orderby'     => 'date',
							'order'       => 'ASC',
							'post_type'   => 'slider_clients',
							'suppress_filters' => true, 
						) );
						
						foreach( $my_posts as $post ) {
							setup_postdata( $post );
							?>
							<img src="<?php the_field('clients_logo'); ?>" alt="" />
							<?php							
						}
						wp_reset_postdata(); // сброс
					?>					
				</div>
			</div>
		</section>
		<!-- / Clients -->

		<!-- Modal and overlay -->
		<div class="overlay">
			<div class="modal" id="subscribe">
				<div class="modal__close">&times;</div>
				<div class="modal__subtitle"><?php the_field('subscribe_title'); ?></div>
				<div class="modal__descr">
					<?php the_field('subscribe_descr'); ?>
				</div>
				<div class="subscribe-form" action="#">
					<?php echo do_shortcode('[contact-form-7 id="431" title="Subscribe form"]'); ?>
				</div>
			</div>
		</div>
		<!-- / Modal and overlay -->

<?php 
get_footer();
?>