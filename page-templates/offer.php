<?php
/*
Template Name: Oferta
*/
get_header(); ?>

<?php include (TEMPLATEPATH . '/top.php'); ?>

<div class="show-for-medium-up">
	<div class="header-picture">

		<?php if (is_page('1969') || $post->post_parent == '1969' || $grandparent == '1969' || is_category('1') || in_category( '1' ) || $kategoria == 'kawalerskie') { ?>
		<?php
			// Must be inside a loop.

			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else {
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
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
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default-v3.jpg" />';
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
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default-v2.jpg" />';
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
	<?php while (have_posts()) : the_post(); ?>
	<div class="large-8 medium-8 columns subpage offer-description" role="main">
		<div class="row offer-slider orbit-container">
			<?php if( get_field('offer_picture')): ?>
			<ul class="example-orbit" data-orbit data-options="pause_on_hover:false; timer_speed:5000;">
				<?php while( has_sub_field('offer_picture')): ?>
				<li>
					<div class="orbit-caption small-only-text-center medium-only-text-center <?php the_sub_field('active'); ?>">
						<div class="row">
							<p class="title"><?php the_sub_field('title'); ?></p>
							<p class="description"><?php the_sub_field('description'); ?></p>
							<a target="_blank" href="<?php the_sub_field('url'); ?><?php the_sub_field('url_zew'); ?>"><?php the_sub_field('button'); ?></a>
						</div>
					</div>

					<img src="<?php the_sub_field('picture'); ?>" alt="slide 1" />
					<div class="shadow-bottom"></div>
				</li>
				<?php endwhile; ?>
			</ul>
			<script type="text/javascript">
				$('document').ready(function () {
					var prev = $('.orbit-prev').clone();
					var next = $('.orbit-next').clone();
					$('.orbit-prev').remove();
					$('.orbit-next').remove();
					prev.prependTo('.orbit-bullets-container');
					next.appendTo('.orbit-bullets-container');
				});
			</script>
			<?php endif; ?>
		</div>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<header>

            <?php if ( function_exists( 'yoast_breadcrumb' ) && is_singular() ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            } ?>
				<h1><?php the_title(); ?>.</h1>
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
							<img src="<?php echo $image['sizes']['thumbnail']; ?>" data-caption="<?php echo $image['alt']; ?>" alt="<?php echo $image['alt']; ?>" />
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php if( get_field('advantages', 'option')): ?>
			<div class="offer-advantages show-for-large-up">
				<div class="large-12 medium-12">

					<h5>Pakiet korzyści</h5>

					<div class="">
						<?php while( has_sub_field('advantages', 'option')): ?>


						<div class="large-6 medium-6 columns">
							<img class="left" src="<?php the_sub_field('icon'); ?>" alt="" />
							<div class="left">
								<p class="adv-title"><?php the_sub_field('title'); ?></p>
								<p class="adv-title"><?php the_sub_field('description'); ?></p>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<script>
				jQuery(".offer-advantages .columns:nth-child(2n)").after("<div class='row'></div><hr />");
			</script>
		</article>
	</div>
	<?php endwhile;?>
	<div class="large-4 medium-4 small-12 columns side offer-right">

		<div class="row">
			<div class="large-12 columns add-to-cart">
				<?php w9ss_addtocart() ?>
				<!-- wywala problem na stronie " fatal error" -->

			</div>
		</div>
		<?php if( get_field('addons_info')): ?>
		<div class="row">
			<div class="large-12 columns addons_info">
				<header>
					<h5>Dodatkowe informacje</h5>
				</header>

				<ul>
					<?php while( has_sub_field('addons_info')): ?>
					<li>
						<img class="left" src="<?php the_sub_field('icon'); ?>" alt="" />
						<div class="left">
							<?php the_sub_field('title'); ?>: <span><?php the_sub_field('value'); ?></span>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>

		<div class="row">
			<div class="large-12 columns offer-box-homepage colour-3 opinion">
				<header>
					<h5>Opinie klientów</h5>
				</header>

				<?php if( get_field('opinion')): ?>
				<div class="tabs-content">
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
	</div>

</div>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php

	$posts = get_field('release');

	if( $posts ): ?>

<div class="row offer-list">
	<div class="title">
		<span>Podobne oferty</span>
		<hr />
	</div>

	<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
	<?php setup_postdata($post); ?>
	<div class="large-4 medium-4 columns offer-list-box produkt">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
		<?php if( get_field('promo_offer', $post) ): ?>
		<div class="promo_offer"></div>
		<?php endif; ?>
		<?php if( get_field('miniature_list', $post) ): ?>
		<img src="<?php the_field('miniature_list', $post); ?>" alt="<?php the_title(); ?>" />
		<?php else : ?>
		<img src="http://feelevent.pl/wp-content/uploads/2016/01/test.jpg" alt="<?php the_title(); ?>" />
		<?php endif; ?>
		<div class="shadow-bottom">
			<div class="offer-list-box-description">
				<div class="offer-list-box-title"><?php the_title(); ?></div>
				<?php if( get_field('people', $post) ): ?>
				<div class="offer-list-box-number">
					<?php the_field('people', $post); ?>
				</div>
				<?php endif; ?>
				<div class="offer-list-box-price">jaki price ?</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>

</div>

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
<?php include (TEMPLATEPATH . '/bottom.php'); ?>


<?php get_footer(); ?>
