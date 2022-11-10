<!-- Footer -->
		<footer class="footer">
			<div class="container">
				<div class="footer__wrapper">
					<div class="footer__nav">
						<h3 class="footer__title">Top forum</h3>
						<?php
							wp_nav_menu( [
								'theme_location'  => 'footer_menu',
								'container'       => false,
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'items_wrap'      => '<ul>%3$s</ul>',
								'depth'           => 1,
							] ); 
						?>						
					</div>
					<div class="footer__contacts">
						<h3 class="footer__title">Contact</h3>
						<div class="footer__addr">
							<?php the_field('address', 2) ?>
							<br /><br />
							<?php the_field('phone', 2) ?> <br />
							<?php the_field('email', 2) ?>
						</div>
					</div>
					<h3 class="footer__title">Follow us</h3>
				</div>
				<hr />
				<div class="footer__sub">
					<div class="footer__copy">© <?php the_field('copyright', 2) ?></div>
					<div class="footer__dev">
						<div class="footer__dev-text">Website development:</div>
						<img src="<?php echo bloginfo('template_url'); ?>/assets/images/devLogo.png" alt="Developer's logo" />
					</div>
				</div>
			</div>
		</footer>

		<!-- / Footer -->		

		<!-- PageUp -->
		<a href="#up" class="pageup">
			<img src="<?php echo bloginfo('template_url'); ?>/assets/icons/buttonUp.png" alt="up" />
		</a>
		<?php 
			wp_footer(); 
		?>
	</body>
</html>