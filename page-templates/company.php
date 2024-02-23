<?php
/*
Template Name: Firma
*/
get_header(); ?>
<?php //include (TEMPLATEPATH . '/top.php'); ?>
<!--================= nagłówek  ================-->
<div class="">
	<div class="header-picture">
		<?php
			// Must be inside a loop.
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else {
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
			}
			?>
		<div class="subpage-title-header">
			<div class="container">
				<div class="row">
					<p class="title"><?php the_field('subtitle_page'); ?></p>
					<?php if ( function_exists( 'yoast_breadcrumb' ) && is_singular() ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); } ?>
					<p class="description"><?php the_field('short_description'); ?></p>
				</div>
			</div>
		</div>
		<div class="shadow-top"></div>
		<div class="shadow-bottom"></div>
	</div>
</div>
<!--================= nagłówek END  ================-->
<!--================= Zawartość  ================-->
<div class="container container-about-company pb-5">
	<div class="row">
		<?php while (have_posts()) : the_post(); ?>
		<div class="col-lg-12  ">
			<div class="row">
				<div class="col-lg-12 col-md-12  subpage company">
					<header>
						<h1><?php the_title(); ?></h1>
					</header>
					<div class="two-rows">
						<?php the_content(); ?>
					</div>
					<!-- ??? po co te pliki i reszta ? -->
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
				</div>
			</div>

			<script>
				jQuery(".advantages . :nth-child(2n)").after("<div class='row'></div><hr />");
			</script>
		</div>
		<?php endwhile;?>
	</div>
</div>

<?php if( get_field('advantages', 'option')): ?>
			<div class="container container-about-company-color p-5">
				<div class="row">
					<div class="col-lg-12 col-md-12   subpage advantages">
						<header>
							<h1 class="pb-4 ">Pakiet korzyści</h1>
						</header>
						<div  class="row">
							<?php while( has_sub_field('advantages', 'option')): ?>
							<div style="    border: solid #54426f; border-width: 1px 0 0;" class="pt-4 col-lg-6 col-12 border-bottom pb-3">
								<img class="left" src="<?php the_sub_field('icon'); ?>" alt="" />
								<div class="left">
									<p class="adv-title"><?php the_sub_field('title'); ?></p>
									<p class="adv-description"><?php the_sub_field('description'); ?></p>
								</div>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
<!--================= Zawartość END  ================-->
<?php include (TEMPLATEPATH . '/bottom.php'); ?>
<?php get_footer(); ?>
