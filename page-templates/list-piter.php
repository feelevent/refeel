<?php
/*
Template Name: Lista
*/
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="<?php echo $container; ?>">
    <div class="row">
		<div class="col-12">
			<div class="row">
				<p class="title"><?php the_field('subtitle_page'); ?></p>
				<p class="description"><?php the_field('short_description'); ?></p>
			</div>
		</div>

		<header>
			<h1 class="header-lista"><?php the_title(); ?></h1>
		</header>

		<?php if ( function_exists( 'yoast_breadcrumb' ) && is_singular() ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		} ?>

		<?php
			// wp_reset_postdata();
			// $posts = get_field('release');

			// if( $posts ):
		?>

<?php /*
-------------------------------------------------------- STARE --------------------------------------------------------
		<div class="col-12 offer-list">
			<div id="items" class="row m-0 p-0">
				<?php foreach( $posts as $post): setup_postdata($post); ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
						class="col-12 col-sm-6 col-md-4 py-3 offer-list-box produkt post-<?php echo get_the_id(); ?>  <?php echo implode(' ',get_field('categories')); ?> "
						<?php if( get_field('miniature_list', $post) ): ?>style="background: linear-gradient(to bottom,#26262655,#262626f4), url(<?php the_field('miniature_list', $post); ?>);"<?php endif; ?>
						>

						<?php if( have_rows('promotion', $post) ): ?>
							<?php while( have_rows('promotion', $post) ): the_row(); ?>
								<?php
								$end_promotion = get_sub_field('end_promotion', $post);
								$promotion_active = get_sub_field('promotion_active', $post);
								$timer_ui = get_sub_field('timer_ui', $post);
								?>
								<?php if( $promotion_active == true ): ?>
									<div class="promo_timer" id="promo_timer-<?php echo $i++; ?>"></div>
									<script type="text/javascript">
										$(document).ready(function() {
											$("#promo_timer-<?php echo $i -  1; ?>").countdown('<?php echo $end_promotion; ?>', function(event) {
												$(this).html(event.strftime('<div class="wobd-990865213 wobd-timer-inner-wrap <?php echo $timer_ui; ?> wobd-timer-position-right"><div id="wobd_count_down"><span class="wobd-time"><span class="wobd-count-wrapper"><span class="wobd-count">%D</span><span class="wobd-date-text">Dni</span></span><span class="wobd-count-wrapper"><span class="wobd-count">%H</span><span class="wobd-date-text">Godz.</span></span><span class="wobd-count-wrapper"><span class="wobd-count">%M</span><span class="wobd-date-text">Min</span></span><span class="wobd-count-wrapper"><span class="wobd-count wobd-count-seconds">%S</span><span class="wobd-date-text">Sek</span></span></span></div></div>'));
											});

											if ($('#promo_timer-<?php echo $i -  1; ?> .wobd-count-wrapper .wobd-count-seconds').text() == "00") {
												$("#promo_timer-<?php echo $i -  1; ?>").hide();
												$(".badge_box-<?php echo $i -  1; ?>").hide();
											}
										});
									</script>
								<?php endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>

						<?php if( have_rows('badge_parent', $post) ): ?>
							<?php while( have_rows('badge_parent', $post) ): the_row(); ?>
								<?php
								$b_style = get_sub_field('badge_style');
								$b_text = get_sub_field('badge_text');
								?>
								<?php if( $b_style ): ?>
								<div class="badge_box badge_box-<?php echo $i -  1; ?> <?php echo $b_style; ?>">
									<?php if( $b_style ): ?>
										<div class="wobd-text" style=""><?php echo $b_text; ?></div>
									<?php endif; ?>
								</div>
								<?php endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>

						<div class="offer-list-box-description">

							<div class="offer-list-box-title"><?php the_title(); ?></div>
							<?php if( get_field('people', $post) ): ?>
								<div class="offer-list-box-number">
									<?php the_field('people', $post); ?>
								</div>
								<div class="offer-list-box-price">
									<?php
									global $woocommerce;
									$currency = get_woocommerce_currency_symbol();
									$price = get_post_meta( get_the_ID(), '_regular_price', true);
									$sale = get_post_meta( get_the_ID(), '_sale_price', true);
									?>
									<?php if($price) : ?>
										<p style="display: inline-block;" class="product-price-tickr"><?php  echo $price;echo $currency; ?>
											<?php if ( get_field('event_category') ) : ?>
												/ <?php echo get_field('event_category'); ?>
											<?php endif; ?>
										</p>
									<?php else : ?>

										<p style="display: inline-block;" class="product-price-tickr">
											<?php
												$test = new WC_Product_Variable($post);
												print_r($test->get_variation_price('min'));
											?>
											<?php echo $currency; ?>
											<?php if ( get_field('event_category') ) : ?>
												/ <?php echo get_field('event_category'); ?>
											<?php endif; ?>
										</p>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>

						<div class="offer-list-box-description-more">
							<?php if ( have_rows('more_usp', $post) ) : ?>
								<?php while( have_rows('more_usp', $post) ) : the_row(); ?>
									<p><img src="<?php echo get_stylesheet_directory_uri() ; ?>/img/usp-star.webp" alt=""><?php the_sub_field('info_usp', $post); ?></p>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>
-------------------------------------------------------- NOWE --------------------------------------------------------
*/ ?>

		<?php
			wp_reset_postdata();
			$posts = get_field('release');

			if( $posts ):
				$posts = implode(',',$posts);
		?>

			<div class="col-12 offer-list">
				<div id="items" class="row m-0 p-0">
					<?php
						remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
						remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
						remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
						add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_open_desc_box', 999 );
						add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_max_people', 15 );
						add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_custom_price', 15 );
						add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_close_desc_box', 999 );
						add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_advantages', 999 );
						add_filter( 'woocommerce_product_loop_title_classes', 'woocommerce_template_loop_title_custom_class' );

						echo do_shortcode("[products columns='3' ids=$posts class='px-0']");
					?>
				</div>
			</div>

		<?php endif; ?>
	</div>
</div>

<?php /*
<div class="col-12">
    <div class="row">
		<p class="title"><?php the_field('subtitle_page'); ?></p>
		<p class="description"><?php the_field('short_description'); ?></p>
    </div>
</div>

	<div class="">
		<div class="header-picture">
			<?php if (is_page('1969') || $post->post_parent == '1969' || $grandparent == '1969' || is_category('1') || in_category( '1' ) || $kategoria == 'kawalerskie') { ?>
			<?php
			// Must be inside a loop.

			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else {
				echo '<img loading="lazy" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
			}
			?>
			<?php } ?>
			<?php if (is_page('2787') || $post->post_parent == '2787' || $grandparent == '2787' || is_category('18') || in_category( '18' ) || $kategoria == 'panienskie') { ?>
			<?php
			// Must be inside a loop.

			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else {
				echo '<img loading="lazy" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default-v3.jpg" />';
			}
			?>
			<?php } ?>
			<?php if (is_page('2950') || $post->post_parent == '2950' || $grandparent == '2950' || is_category('19') || in_category( '19' ) || $kategoria == 'firmowe') { ?>
			<?php
			// Must be inside a loop.

			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else {
				echo '<img loading="lazy" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default-v2.jpg" />';
			}
			?>
			<?php } ?>
			<div class="subpage-title-header">
				<div class="row">
					<p class="title"><?php the_field('subtitle_page'); ?></p>
					<p class="description"><?php the_field('short_description'); ?></p>
				</div>
			</div>
			<div class="shadow-top"></div>
			<div class="shadow-bottom"></div>
		</div>
	</div>


	<div class="row">

    <header>
	   <h1 class="header-lista"><?php the_title(); ?></h1>
	</header>

    <?php if ( function_exists( 'yoast_breadcrumb' ) && is_singular() ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    } ?>

			<?php if ( (is_page('1969') || $post->post_parent == '1969' || $grandparent == '1969' || is_category('1') || in_category( '1' )) || ($post->ID == 2097 && $kategoria == 'kawalerskie') ) { $kategoria = 'kawalerskie'; ?>
			<ul id="filter">
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".wszystkie:not(.transition)"><img  loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-9.png" alt="" /><br />Wszystkie</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".imprezowe:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-1.png" alt="" /><br />Imprezowe</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".adrenalina:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-2.png" alt="" /><br />Adrenalina</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".militaria:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-3.png" alt="" /><br />Militaria</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".sexy:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-4.png" alt="" /><br />Sexy</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".polecane:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-5.png" alt="" /><br />Polecane</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".pakiety:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-7.png" alt="" /><br />Pakiety</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".dodatki:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-8.png" alt="" /><br />Dodatki</a></li>
           </ul>
	<?php } ?>
			<?php if ( (is_page('2787') || $post->post_parent == '2787' || $grandparent == '2787' || is_category('18') || in_category( '18' )) || ($post->ID == 2097 && $kategoria == 'panienskie')) { $kategoria = 'panienskie'; ?>
			<ul id="filter" >
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".wszystkie:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-9.png" alt="" /><br />Wszystkie</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".imprezowe:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-1.png" alt="" /><br />Imprezowe</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".adrenalina:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-2.png" alt="" /><br />Adrenalina</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".militaria:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-3.png" alt="" /><br />Militaria</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".sexy:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-4.png" alt="" /><br />Sexy</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".polecane:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-5.png" alt="" /><br />Polecane</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".pakiety:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-7.png" alt="" /><br />Pakiety</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".dodatki:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-8.png" alt="" /><br />Dodatki</a></li>
           </ul>
	<?php } ?>
<?php if ( (is_page('2950') || $post->post_parent == '2950' || $grandparent == '2950' || is_category('19') || in_category( '19' )) || ($post->ID == 2097 && $kategoria == 'firmowe') ) { $kategoria = 'firmowe'; ?>
			<ul id="filter">
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".wszystkie:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-9.png" alt="" /><br />Wszystkie</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".przyjecia:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-1.png" alt="" /><br />Przyjęcia</a></li>
							<li class="large-2 medium-3 small-6 columns"><a style="font-size: .85rem" class="filtry" href="#" data-filter=".dobrazabawa:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-10.png" alt="" /><br />Dobra zabawa</a></li>
							<li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".nightlife:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-11.png" alt="" /><br />Nightlife</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".adrenalina:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-2.png" alt="" /><br />Adrenalina</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".polecane:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-5.png" alt="" /><br />Polecane</a></li>
                            <li class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".pakiety:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-7.png" alt="" /><br />Pakiety</a></li>
                            <li style="float: left;" class="large-2 medium-3 small-6 columns"><a class="filtry" href="#" data-filter=".dodatki:not(.transition)"><img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-8.png" alt="" /><br />Dodatki</a></li>
           </ul>
	<?php } ?>

	</div>
	<?php $i = 1; ?>


	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php

	$posts = get_field('release');

	if( $posts ): ?>

<div class="row offer-list">
<div id="items">
	<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
	<?php setup_postdata($post); ?>
	<div  class="large-4 medium-4 columns offer-list-box produkt post-<?php echo get_the_id(); ?>  <?php echo implode(' ',get_field('categories')); ?> ">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
		<?php if( get_field('city_offer', $post) ): ?>
		<div class="city_offer"></div>
		<?php endif; ?>
		<?php if( get_field('miniature_list', $post) ): ?>
		<img  loading="lazy" src="<?php the_field('miniature_list', $post); ?>" alt="<?php the_title(); ?>" />
		<?php else : ?>
			<!-- test image -->
		<img loading="lazy" src="http://feelevent.pl/wp-content/uploads/2016/01/test.jpg" alt="<?php the_title(); ?>" />
		<?php endif; ?>
		<div class="shadow-bottom">
		<?php if( have_rows('promotion', $post) ): ?>
							<?php while( have_rows('promotion', $post) ): the_row(); ?>
								<?php
								$end_promotion = get_sub_field('end_promotion', $post);
								$promotion_active = get_sub_field('promotion_active', $post);
								$timer_ui = get_sub_field('timer_ui', $post);
								?>
								<?php if( $promotion_active == true ): ?>
									<div style=" color:#fff;" class="promo_timer" id="promo_timer-<?php echo $i++; ?>"></div>
										<script type="text/javascript">
										$(document).ready(function() {
												$("#promo_timer-<?php echo $i -  1; ?>").countdown('<?php echo $end_promotion; ?>', function(event) {
													$(this).html(event.strftime('<div class="wobd-990865213 wobd-timer-inner-wrap <?php echo $timer_ui; ?> wobd-timer-position-right"><div id="wobd_count_down"><span class="wobd-time"><span class="wobd-count-wrapper"><span class="wobd-count">%D</span><span class="wobd-date-text">Dni</span></span><span class="wobd-count-wrapper"><span class="wobd-count">%H</span><span class="wobd-date-text">Godz.</span></span><span class="wobd-count-wrapper"><span class="wobd-count">%M</span><span class="wobd-date-text">Min</span></span><span class="wobd-count-wrapper"><span class="wobd-count wobd-count-seconds">%S</span><span class="wobd-date-text">Sek</span></span></span></div></div>'));
												});

												if ($('#promo_timer-<?php echo $i -  1; ?> .wobd-count-wrapper .wobd-count-seconds').text() == "00") {
												$("#promo_timer-<?php echo $i -  1; ?>").hide();
												$(".badge_box-<?php echo $i -  1; ?>").hide();
											}
											else {}
											});
											</script>

								<?php endif; ?>
							<?php endwhile; ?>
					<?php endif; ?>
		<?php if( have_rows('badge_parent', $post) ): ?>
		<?php while( have_rows('badge_parent', $post) ): the_row(); ?>
			<?php
			$b_style = get_sub_field('badge_style');
			$b_text = get_sub_field('badge_text');
			?>
			<?php if( $b_style ): ?>
			<div class="badge_box badge_box-<?php echo $i -  1; ?> <?php echo $b_style; ?>">

				<?php if( $b_style ): ?>
					<div class="wobd-text" style=""><?php echo $b_text; ?></div>
					<?php endif; ?>

			</div>
			<?php endif; ?>
		<?php endwhile; ?>
<?php endif; ?>
			<div class="offer-list-box-description">

				<div class="offer-list-box-title"><?php the_title(); ?></div>
				<?php if( get_field('people', $post) ): ?>
				<div class="offer-list-box-number">
					<?php the_field('people', $post); ?>
				</div>
				<div class="offer-list-box-price">
				<?php
				global $woocommerce;
				$currency = get_woocommerce_currency_symbol();
				$price = get_post_meta( get_the_ID(), '_regular_price', true);
				$sale = get_post_meta( get_the_ID(), '_sale_price', true);
				?>
				<?php if($price) : ?>
					<p style="display: inline-block;" class="product-price-tickr"><?php  echo $price;echo $currency; ?>
					<?php if ( get_field('event_category') ) : ?>
						/ <?php echo get_field('event_category'); ?>
					<?php endif; ?>
					</p>
				<?php else : ?>

					<p style="display: inline-block;" class="product-price-tickr">
					<?php
						$test = new WC_Product_Variable($post);
						print_r($test->get_variation_price('min'));
					?>
					<?php echo $currency; ?>
					<?php if ( get_field('event_category') ) : ?>
						/ <?php echo get_field('event_category'); ?>
					<?php endif; ?>
					</p>
				<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="offer-list-box-description-more">
				<?php if ( have_rows('more_usp', $post) ) : ?>
					<?php while( have_rows('more_usp', $post) ) : the_row(); ?>
						<p><img loading="lazy" style="display:inline-block; height:16px; width:16px;margin-right:10px;" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/usp-star.png" alt=""><?php the_sub_field('info_usp', $post); ?></p>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>

		</div>
	</div>
	<?php endforeach; ?>

</div>

</div>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
<br>
<img onload="clickEvent()" style="visibility: hidden;" loading="lazy" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon/party-ico-8.png" alt="" />



	<div class="row listtemplate" style="height: 100%;">
		<div class="large-8 columns subpage full" role="main">
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">


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
										 <img loading="lazy" src="<?php echo $image['sizes']['thumbnail']; ?>"data-caption="<?php echo $image['alt']; ?>" alt="<?php echo $image['alt']; ?>" />
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
			</article>
		</div>




		<div class="large-4 columns offer-box-homepage colour-3 opinion" style="padding:1.5rem 2.5rem; ">
						<div class="title">
							<h3 style="color:#fff;">
								Opinie klientów
							</h3>
						</div>

						<?php if( get_field('opinion')): ?>
						<div class="tabs-content z_wow">
							<?php while( has_sub_field('opinion')): ?>
							<section role="tabpanel" aria-hidden="false" class="content <?php the_sub_field('active'); ?>" id="<?php the_sub_field('id'); ?>">
								<?php the_sub_field('description'); ?>
							</section>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>

						<?php if( get_field('opinion')): ?>
						<ul class="tabs" data-tab role="tablist">
							<?php while( has_sub_field('opinion')): ?>
							<li class="tab-title <?php the_sub_field('active'); ?>" role="presentation"><a href="#<?php the_sub_field('id'); ?>" role="tab" tabindex="0" aria-selected="true" aria-controls="<?php the_sub_field('id'); ?>"></a></li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>
	</div>
    <br>

<div class="row">
		<div class="large-12 columns subpage full">
			<h3 style="color:#fff;"><?php if ( get_field('team_header') ) : ?>
				<?php echo get_field('team_header'); ?>
			<?php endif; ?>
			</h3>
			<div class="large-12 columns city_person_blocks">

					<?php if ( have_rows('city_teams_peoples') ) : ?>

						<?php while( have_rows('city_teams_peoples') ) : the_row(); ?>
						<div class="small-6 medium-4 large-3 columns">
						<div class="service-block">
							<img loading="lazy" class="img-responsive" src="<?php the_sub_field('team_person_foto'); ?>">
							<br>
							<p class="header4"><?php the_sub_field('team_person_name'); ?></p>
							<p class="desc"><?php the_sub_field('team_person_desc'); ?></p>
						</div>
						</div>
						<?php endwhile; ?>

					<?php endif; ?>

			</div>
		</div>
	</div>
	<script type="text/javascript">
$(document).ready(function() {

    var $container = $('#items');
        $container.isotope({
            itemSelector: '.produkt',
            layoutMode: 'cellsByRow',
            cellsByRow: {
                columnWidth: '.large-4'
            }
        });

    $(document).on('click', '.filtry', function() {
        var filterValue = $(this).attr('data-filter');
        $container.isotope({ filter: filterValue });

        return false;
    });


});
jQuery(window).load(function(){
	jQuery("a[data-filter^='.wszystkie']").click();
});
</script>

<script>
function clickEvent() {
			jQuery('#filter > li:nth-child(1) > a').click();
			jQuery('#filter > li:nth-child(1) > a').click();
	}
setTimeout(function(){
	jQuery('#filter > li:nth-child(1) > a').click();
}, 1000); //3 seconds
setTimeout(function(){
	jQuery('#filter > li:nth-child(1) > a').click();
}, 3000); //3 seconds
setTimeout(function(){
	jQuery('#filter > li:nth-child(1) > a').click();
}, 5000); //3 seconds
</script>




<?php
	wp_reset_postdata();
	$posts = get_field('release');
	$posts = implode(',',$posts);
?>
	<?php //echo do_shortcode("[products columns='3' ids=$posts]"); ?>
*/ ?>
<?php //include (TEMPLATEPATH . '/bottom.php'); ?>










<?php get_footer(); ?>

