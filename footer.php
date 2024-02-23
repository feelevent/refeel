<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<?php if( have_rows('footer_icon',1969)): ?>
					<div class="col-12 icon-advantages">
						<div class="row">
							<?php while( have_rows('footer_icon',1969) ): the_row(); ?>
							<div class="col-12 col-md-4 icon">
								<img src="<?php the_sub_field('ikonka'); ?>" alt=" " />
								<span><?php the_sub_field('title'); ?></span>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
					<?php endif; ?>

					<div class="col-12">
						<div class="row copyright">
							<div class="large-6 medium-6 columns medium-text-left small-only-text-center">
								<p>Copyright © <?php echo date('Y'); ?> <a class="footer-blog-name" href="<?php echo esc_url( home_url( '/' ) ); ?>">Feel Event</a>.<br />
								Kopiowanie oraz rozpowszechnianie materiałów na stronie zabronione.<p>
								<?php if ( is_page('1969') || $post->post_parent == '1969' /*|| $grandparent == '1969'*/ ) { ?>
									<script type="text/javascript">
										jQuery(document).ready(function(){
											WHCreateCookie('kategoria', 'kawalerskie');
										});
									</script>
								<?php

									wp_nav_menu( array(
										'theme_location'  => '',
										'menu'            => 'Wieczory kawalerskie - Stopka',
										'container'       => '',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => '',
										'menu_id'         => '7',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul>%3$s</ul>',
										'depth'           => 1
								) ); ?>
								<?php } ?>

								<?php if ( is_page('2787') || $post->post_parent == '2787' /*|| $grandparent == '2787'*/ || is_category('18') || in_category( '18' ) ) { ?>
									<script type="text/javascript">
										jQuery(document).ready(function(){
											WHCreateCookie('kategoria', 'panienskie');
										});
									</script>
								<?php
									wp_nav_menu( array(
										'theme_location'  => '',
										'menu'            => 'Wieczory panienskie - Stopka',
										'container'       => '',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => '',
										'menu_id'         => '7',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul>%3$s</ul>',
										'depth'           => 1
								) ); ?>
								<?php } ?>

								<?php if ( is_page('2950') || $post->post_parent == '2950' /*|| $grandparent == '2950'*/ || is_category('19') || in_category( '19' ) ) { ?>
									<script type="text/javascript">
										jQuery(document).ready(function(){
											WHCreateCookie('kategoria', 'firmowe');
										});
									</script>
								<?php
									wp_nav_menu( array(
										'theme_location'  => '',
										'menu'            => 'Imprezy firmowe - Stopka',
										'container'       => '',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => '',
										'menu_id'         => '7',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul>%3$s</ul>',
										'depth'           => 1
								) ); ?>
								<?php } ?>
							</div>

							<div class="large-6 medium-6 columns-custom medium-text-right small-only-text-center">
								<p> ul. Niedźwiady 53 | 62-800 Kalisz | woj. wielkopolskie</p>
								<p>ul. Dolna Wilda 62/5 | 61-501 Poznań | woj. wielkopolskie</p>
								<p>ul. Inowrocławska 48/9 | 53-648 Wrocław | woj. dolnośląskie</p>
								<p>ul. Jana Kazimierza 12 | 01-248 Warszawa | woj. mazowieckie</p>
								<p>Serwis zrealizowany<br />przez agencje interaktywną <a class="show-for-medium-down" target="_blank" rel="nofollow" href="http://www.tebim.pro/">Tebim.pl</a></p>
								<br /><a rel="nofollow" target="_blank" href="http://www.tebim.pro/"><img loading="lazy" class="visible-for-large-up" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/tebim.png" alt="Tebim - Twój e-biznes i Marketing" /></a>
							</div>
						</div>
					</div>


				</footer><!-- #colophon -->

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

