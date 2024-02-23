<?php
/*
Template Name: Kontakt
*/
get_header(); ?>
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
<div class="container container-top p-0">
<div class="row ">
		<div class="col-lg-4 col-md-4 side">
			<div class="row">
				<div class="left-navigation">
					<header>
						<h1>Dane teleadresowe</h1>
					</header>
					<ul class="contact-adress">
					<address>
						<li>
							<p><strong>Ogólne pytania / Zamówienia telefoniczne</strong></p>
							<p>
								<span><a href="tel:<?php the_field('header_phone', 'option'); ?>"><?php the_field('header_phone', 'option'); ?></a>
							</span><br />
								<a href="mailto:<?php the_field('header_email', 'option'); ?>"><?php the_field('header_email', 'option'); ?></a>
							</p>
						</li>
						<li>
							<p><strong>Godziny</strong></p>
							<p>
								<p>Jesteśmy do Twojej dyspozycji od Poniedziałku do Soboty w godzinach:</p>
								<p itemprop="openingHours" value="Mon-Sat 10:00-18:00" itemprop="openingHours"><?php if ( get_field('work_hours', 'option') ) : ?><?php echo get_field('work_hours', 'option'); ?><?php endif; ?></p>
							</p>
						</li>
						<li>
							<p><strong>Feel Event</strong></p>
							<p><?php the_field('header_company', 'option'); ?><br /><br />
							<?php the_field('header_bank', 'option'); ?></p>
						</li>
						</address>
					<ul>
				</div>
			</div>
		</div>
		<?php while (have_posts()) : the_post(); ?>
		<div class="col-12 col-md-8 cf-div">
			<div class="row">
				<div class="large-12 medium-12 columns subpage contact-page">
					<header>
						<h2 class="h1"><?php the_title(); ?></h2>
					</header>
					<?php
					$image = get_field('product_miniature');
					if( !empty($image) ):
						// vars
						$url = $image['url'];
						$title = $image['title'];
						$alt = $image['alt'];
						$caption = $image['caption'];
						// thumbnail
						$size = 'thumbnail';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
						if( $caption ): ?>
						<?php endif; ?>
						<a class="product-miniature" href="<?php echo $url; ?>" title="<?php echo $title; ?>">
							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
						</a>
					<?php endif; ?>
					<?php the_content(); ?>
					<?php the_field('contact_form'); ?>
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
				</div>
			</div>
		</div>
		<?php endwhile;?>
	</div>
</div>
<div class="container pt-5 text-center container-bottom">
	<div class="row left-contact custom-contact ">
		<h3 class="flex-custom">Zapraszamy do kontaktu</h3>
		<div class="row">
			<div class="col-12 col-md-6 pb-3">
				ul. Niedźwiady 53<br>62-800 Kalisz<br>woj. wielkopolskie<br><br><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2467.337589623742!2d18.089331316058725!3d51.79999187968428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac55926bc48c9%3A0x1b1a90b1d2cab917!2sNied%C5%BAwiady%2053%2C%2062-800%20Nied%C5%BAwiady!5e0!3m2!1spl!2spl!4v1592564561081!5m2!1spl!2spl" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" frameborder="0" height="300" width="100%"></iframe>
			</div>
			<div class="col-12 col-md-6">ul. Dolna Wilda 62/5<br>61-501 Poznań<br>woj. wielkopolskie<br><br><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2434.877499926636!2d16.922159215802697!3d52.390770979789906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47045b21213a98d7%3A0x46ea1b0c151f741d!2sDolna%20Wilda%2062%2C%2061-501%20Pozna%C5%84!5e0!3m2!1spl!2spl!4v1592569752733!5m2!1spl!2spl" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" frameborder="0" height="300" width="100%"></iframe>
			</div>
			</div>
			<div class="row">
			<div class="col-12 col-md-6">ul. Inowrocławska 48/9<br>53-648 Wrocław<br> woj. dolnośląskie<br><br> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2504.5444882782867!2d17.012814315755666!3d51.11686397957288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470fe9fd2eb34ddb%3A0x63e3ef269af1b760!2sInowroc%C5%82awska%2048%2C%2053-648%20Wroc%C5%82aw!5e0!3m2!1spl!2spl!4v1592564663040!5m2!1spl!2spl" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" frameborder="0" height="300" width="100%"></iframe>
			</div>
			<div class="col-12 col-md-6">ul. Jana Kazimierza 12<br>01-248 Warszawa<br> woj. mazowieckie<br><br><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2443.9240432415077!2d20.945915915796583!3d52.22659777975969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecb42629bb695%3A0xe1729421f35546eb!2sJana%20Kazimierza%2012%2C%2001-248%20Warszawa!5e0!3m2!1spl!2spl!4v1592564699281!5m2!1spl!2spl" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" frameborder="0" height="300" width="100%"></iframe>
			</div>
			</div>
	</div>
</div>
<?php get_footer(); ?>
