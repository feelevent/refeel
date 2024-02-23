<?php
/*
Template Name: Główna kategoria
*/
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="<?php echo $container; ?>">
    <div class="row">

		<div class="col-12 slider">
			<?php if( get_field('slider')): ?>
			<ul class="row list-unstyled">
				<?php while( has_sub_field('slider')): ?>			
				<li class="col-12 <?php the_sub_field('active'); ?>">
					<p class="title"><?php the_sub_field('title'); ?></p>
					<p class="description"><?php the_sub_field('description'); ?></p>
					<a target="_blank" href="<?php the_sub_field('url'); ?><?php the_sub_field('url_zew'); ?>"><?php the_sub_field('button'); ?></a>
					
					<img src="<?php the_sub_field('picture'); ?>" alt="Zdjęcie slajdera" />
					<div class="shadow-bottom"></div>
				</li>
				<?php endwhile; ?>	
			</ul>
			<?php endif; ?>	
		</div>

		<?php if( get_field('description_homepage')): ?>
		<div class="col-12 category-description">
			<div class="row">
				<?php while( has_sub_field('description_homepage')): ?>			
					<div class="col-12 title">
						<h1>
							<?php the_sub_field('title');?>
						</h1>

						<?php if ( function_exists( 'yoast_breadcrumb' ) && is_singular() ) {
									yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						} ?>
					</div>
					<div class="col-12 description">
						<?php the_sub_field('description'); ?>
					</div>				
				<?php endwhile; ?>		
			</div>
		</div>
		<?php endif; ?>	

		<?php if( get_field('promo_homepage')): ?>
		<div class="col-12 col-md-4 promotion">
			<div class="row">
				<?php while( has_sub_field('promo_homepage')): ?>	
				<div class="col-12" style="background: url('<?php the_sub_field('background'); ?>') no-repeat 0 0; background-size: 100% 100%;">	
					<div class="row">			
						<div class="col-12 title">
							<h3>
								<?php the_sub_field('title'); ?>
							</h3> 	
						</div>	
						<div class="col-12 promo">
							<a href="<?php the_sub_field('url'); ?>">
								<p><strong><?php the_sub_field('title_promo'); ?></strong></p>
								<p><?php the_sub_field('description_promo'); ?></p>
							</a>
						</div>					
					</div>			
				</div>	
				<?php endwhile; ?>		
			</div>
		</div>
		<?php endif; ?>	

		<div class="col-12 col-md-8">
			<div class="title">
				<h3>
					Działamy na terenie <span>całego kraju</span>
				</h3> 	
			</div>	

			<p><?php the_field('maps_homepage'); ?></p>
			
			<p><strong>Wybierz miasto:</strong></p>
			
			<div class="clear"></div>
			<?php if (is_page('1969') || $post->post_parent == '1969' /*|| $grandparent == '1969'*/) { ?>
			<?php
					wp_nav_menu( array(
					'theme_location'  => '',
					'menu'            => 'Wieczory kawalerskie - Miasta',
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
			
			<div class="map">
				<a class="link1" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/kalisz"></a>	
				<a class="link2" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/lodz"></a>								
				<a class="link3" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/warszawa"></a>								
				<a class="link4" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/wroclaw"></a>								
				<a class="link5" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/krakow"></a>								
				<a class="link6" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/poznan"></a>								
			</div>
			<?php } ?>
			
			<?php if (is_page('2787') || $post->post_parent == '2787' /*|| $grandparent == '2787'*/) { ?>
			<?php
					wp_nav_menu( array(
					'theme_location'  => '',
					'menu'            => 'Wieczory panienskie - Miasta',
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
			
			<div class="map">
				<a class="link1" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/kalisz"></a>	
				<a class="link2" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/lodz"></a>								
				<a class="link3" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/warszawa"></a>								
				<a class="link4" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/wroclaw"></a>								
				<a class="link5" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/krakow"></a>								
				<a class="link6" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/poznan"></a>								
			</div>
			<?php } ?>		

			<?php if (is_page('2950') || $post->post_parent == '2950' /*|| $grandparent == '2950'*/) { ?>
			<?php
					wp_nav_menu( array(
					'theme_location'  => '',
					'menu'            => 'Imprezy firmowe - Miasta',
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
			
			<div class="map">
				<a class="link1" href="<?php echo esc_url( home_url( '/' ) ); ?>imprezy_dla_firm/kalisz"></a>	
				<a class="link2" href="<?php echo esc_url( home_url( '/' ) ); ?>imprezy_dla_firm/lodz"></a>								
				<a class="link3" href="<?php echo esc_url( home_url( '/' ) ); ?>imprezy_dla_firm/warszawa"></a>															
				<a class="link5" href="<?php echo esc_url( home_url( '/' ) ); ?>imprezy_dla_firm/krakow"></a>								
				<a class="link6" href="<?php echo esc_url( home_url( '/' ) ); ?>imprezy_dla_firm/poznan"></a>								
			</div>
			<?php } ?>
		</div>

		<div class="col-12 col-md-4">	
			<div class="row">			
				<div class="large-12 columns offer-box-homepage colour-3 opinion">	
					<div class="title">
						<h3>
							Opinie klientów
						</h3> 	
					</div>	
						
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

		<div class="col-12 col-md-4">	
			<div class="row">			
				<div class="large-12 columns offer-box-homepage colour-1 adress-home">	
					<div class="title">
						<h3>
							Masz pytania
						</h3> 	
					</div>	
						
					<p><?php the_field('header_street', 'option'); ?><br />
					<?php the_field('header_city', 'option'); ?><br />
					<?php the_field('header_region', 'option'); ?></p>
					
					<p>
						<span><?php the_field('header_phone', 'option'); ?></span><br />
						<a href="mailto:<?php the_field('header_email', 'option'); ?>"><?php the_field('header_email', 'option'); ?></a>
					</p>
				</div>					
			</div>			
		</div>

		<div class="col-12 col-md-4">	
			<div class="row">			
				<div class="large-12 columns offer-box-homepage colour-2">	
					<?php if (is_page('1969') || $post->post_parent == '1969' /*|| $grandparent == '1969'*/) { ?>
					<div class="blog-box">
						<p>Nie masz pomysłu<br />
						Na wieczór kawalerski?</p>
						
						<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>blog/wieczory_kawalerskie">Zobacz Nasz blog</a></p>
					</div>	
					<?php } ?>							
					
					<?php if (is_page('2787') || $post->post_parent == '2787' /*|| $grandparent == '2787'*/) { ?>
					<div class="blog-box">
						<p>Nie masz pomysłu<br />
						Na wieczór panieński?</p>
						
						<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>blog/wieczory_panienskie">Zobacz Nasz blog</a></p>
					</div>	
					<?php } ?>		
					
					<?php if (is_page('2950') || $post->post_parent == '2950' /*|| $grandparent == '2950'*/) { ?>
					<div class="blog-box">
						<p>Nie masz pomysłu<br />
						Na imprezę firmową?</p>
						
						<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>blog/wieczory_panienskie">Zobacz Nasz blog</a></p>
					</div>	
					<?php } ?>								
				</div>					
			</div>			
		</div>

		<?php if( get_field('video_homepage')): ?>
			<?php while( has_sub_field('video_homepage')): ?>				
			<div class="col-12 col-md-4">	
				<div class="row">			
					<div class="large-12 columns offer-box-homepage colour-2 watch-video" style="background: url('<?php the_sub_field('background'); ?>') no-repeat 0 0; background-size: 100% 100%">	
						<a href="#" data-reveal-id="watch-video">
							<img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/play.png" alt="" /><br />
							Oglądaj
						</a>				
					</div>					
				</div>			
			</div>	
			<?php endwhile; ?>	
		<?php endif; ?>		

		<?php if( get_field('video_homepage')): ?>
		<?php while( has_sub_field('video_homepage')): ?>	
		<div id="watch-video" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<?php the_sub_field('code'); ?>
		<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>	
		<?php endwhile; ?>	
		<?php endif; ?>
	</div>
</div>

	
	
	<?php /*if( get_field('home_banner')): ?>
	<div class="row small-banners">
		<?php while( has_sub_field('home_banner')): ?>	
		<div class="large-4 medium-6 columns">
			<a href="<?php the_sub_field('url'); ?>">
				<span class="title"><?php the_sub_field('title'); ?></span>
				<?php the_sub_field('graphic'); ?>
				<img src="<?php the_sub_field('picture'); ?>" alt="" />
				<a class="button tiny" href="<?php the_sub_field('url'); ?>"></a>		
			</a>
		</div>
		<?php endwhile; ?>	
	</div>
	<?php endif;*/ ?>
		
<?php /*include (TEMPLATEPATH . '/bottom.php');*/ ?>

<?php get_footer(); ?>
