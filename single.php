<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>




<div class="">
		<div class="header-picture">
			<div class="subpage-title-header">
				<div class="row-custom">
					<p class="title">Blog</p>  
                    <?php if ( function_exists( 'yoast_breadcrumb' ) && is_singular() ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); } ?> 
					<p class="description"><?php the_field('short_description'); ?></p>
				</div>
			</div>
			<div class="shadow-top"></div>
			<div class="shadow-bottom"></div>
		</div>
	</div>

	<div class="row-custom">
		<div class="large-4 medium-4 columns side d-none d-md-block">

			<div class="row-custom">
				<div class="left-navigation">
					<header>
						<h3>Archiwum </h3>
					</header>

					<ul class="contact-adress">
						<?php wp_get_archives() ?>
					<ul>
				</div>
			</div>
		</div>


		<?php while (have_posts()) : the_post(); ?>
		<div class="large-8 medium-8 columns">
			<div class="row-custom">

				<div class="large-12 medium-12 columns subpage news">

					<header>
						<h1>
							<?php the_title(); ?>
						</h1>
						<div class="date left">
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><i class="fi-clock"></i> <?php echo esc_html( get_the_date() ); ?></time>
						</div>
						<div class="categories left"><i class="fi-align-left"></i>
								Archiwum: <?php
								$seperator  = ', ';
								$parents    = '';
								$post_id    = $post->ID;

								the_category( $seperator , $parents, $post_id );
								?>
						</div>
					</header>
					<?php the_content(); ?>

														<?php if( get_field('attachment')): ?>
														<div class="file">
															<div class="small-title">Pliki do pobrania:</div>

															<ul class="">
																<?php while( has_sub_field('attachment')): ?>
																	<li>
																		<a target="_blank" href="<?php the_sub_field('file'); ?>"><?php the_sub_field('title'); ?></a>
																	</li>
																<?php endwhile; ?>
															</ul>
														</div>
														<?php endif; ?>

														<?php $images = get_field('gallery'); if( $images ): ?>
														<div class="gallery">
															<div class="small-title">Załączone zdjęcia:</div>

															<ul class="clearing-thumbs small-block-grid-4" data-clearing>
																<?php foreach( $images as $image ): ?>
																	<li>
																		<a href="<?php echo $image['url']; ?>">
																			 <img src="<?php echo $image['sizes']['thumbnail']; ?>"data-caption="<?php echo $image['alt']; ?>" alt="<?php echo $image['alt']; ?>" />
																		</a>
																	</li>
																<?php endforeach; ?>
															</ul>
														</div>
														<?php endif; ?>


										<div class="row-custom">
											<div class="twelve large-12 columns article-nav">
												<div class="row-custom">
													<div class="twelve large-12 medium-12 columns social">
														<p>Podziel się na Facebooku:</p>

														<script>
															(function(d, s, id) {
																var js, fjs = d.getElementsByTagName(s)[0];
																if (d.getElementById(id)) return;
																js = d.createElement(s); js.id = id;
																js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&appId=1562144830674259&version=v2.0";
																fjs.parentNode.insertBefore(js, fjs);
															}(document, 'script', 'facebook-jssdk'));
														</script>
														<div class="fb-like" data-href="<?php the_permalink() ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
													</div>
												</div>
												<div class="row-custom article-nav-bg">
													<div class="six large-6 medium-12 columns article-nav-prev small-text-center large-text-left">
														<?php
															$prev_post = get_adjacent_post(false, '', true);
															if(!empty($prev_post)) {
															echo '
																<a class="left" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">
																<i class="fi-arrow-left size-18 visible-for-large-up"></i></a>
																<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">
																<strong>Poprzednia aktualność</strong><br /> ' . $prev_post->post_title . '</a>
															'; }
														?>
													</div>

													<div class="six large-6 medium-12 columns article-nav-next small-text-center large-text-right">
														<?php
															$next_post = get_adjacent_post(false, '', false);
															if(!empty($next_post)) {
															echo '
																<a class="right" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">
																<i class="fi-arrow-right size-18 visible-for-large-up"></i></a>

																<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">
																<strong>Następna aktualność</strong><br />
																' . $next_post->post_title . '</a>
															'; }
														?>
													</div>
												</div>
											</div>
										</div>
				</div>
			</div>
		</div>
		<?php endwhile;?>
	</div>



<?php
get_footer();
