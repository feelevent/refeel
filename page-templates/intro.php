 <?php
/*
Template Name: Intro
*/
get_header(); ?>

    <div class="row navigation-margin">
        <div class="navigation intro_nav">
            <div class="large-2 left">
				<!-- <a class="info show-for-large-up" href="#" data-reveal-id="more-information">
					<span class="icon"></span>
					<span class="f13">Dowiedz się<br/>więcej o Nas</span>
				</a> -->
            </div>
            <div class="large-8 medium-12 intro left">
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/logo.png" alt="Feel Event" /><br/>
                    Feel Event<br/><span class="btitle">Organizacja imprez</span>
                </a>
                <div class="intro_info">
                    <span class="map"><?php the_field('header_street', 'option'); ?>, <?php the_field('header_city', 'option'); ?>, <?php the_field('header_region', 'option'); ?></span>
                    <span class="phone"><?php the_field('header_phone', 'option'); ?></span>
                    <span class="mail"><a href="mailto:<?php the_field('header_email', 'option'); ?>"><?php the_field('header_email', 'option'); ?></a></span>
                </div>
            </div>

            <div class="large-2 left">
                <div class="right">
                    <a class="fb show-for-large-up" target="_blank" href="https://www.facebook.com/Feel-Event-529025647197163/">
						<span class="icon"></span>
						<span class="f13">Szukaj Nas<br/>na Facebooku</span>
					</a>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt50">
        <div class="large-12 columns full" role="main">
            <div class="box large-4 medium-6 large-push-2 columns left box2">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie" title="">
                    <img src="http://feelevent.pl/wp-content/themes/foundationpress-master/images/box_2.jpg" alt="" />
                    <a class="sun" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie"><span class="box-title">Wieczory<br /> kawalerskie</span></a>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie" class="button">Przejdź</a>
                <div class=" small-12 columns intro-cities" >
                    <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/warszawa">Warszawa</a>
                    <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/poznan">Poznań</a>
                    <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/wroclaw">Wrocław</a>
                    <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/lodz">Łódź</a>
                    <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_kawalerskie/krakow">Kraków</a>
                </div>
            </div>
            <div class="box large-4 medium-6 large-push-2 columns left box3">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie" title="">
                    <img src="http://feelevent.pl/wp-content/themes/foundationpress-master/images/box_3.jpg" alt="" />
                    <a class="sun" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie""><span class=" box-title">Wieczory<br /> panieńskie</span></a>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie" class="button">Przejdź</a>

                    <div class="small-12 columns intro-cities" >
                        <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/warszawa">Warszawa</a>
                        <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/poznan">Poznań</a>
                        <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/wroclaw">Wrocław</a>
                        <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/lodz">Łódź</a>
                        <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>wieczory_panienskie/krakow">Kraków</a>

                    </div>

            </div>
        </div>
    </div>
<div class="row ">
    <div class="small-12 medium-8 medium-offset-2 columns intro-paragraf ">
        <?php if ( get_field('content_paragraf') ) : ?>
            <?php echo get_field('content_paragraf'); ?>
        <?php endif; ?>

    </div>
</div>

<?php if( get_field('footer_icon', 1969)): ?>
<div class="row icon-bottom" style="padding-top: 1rem;">
	<?php while( has_sub_field('footer_icon', 1969)): ?>
	<div class="large-4 medium-4 small-12 columns">
		<img src="<?php the_sub_field('ikonka', 1969); ?>" alt="" />
		<span><?php the_sub_field('title', 1969); ?></span>
	</div>
	<?php endwhile; ?>
</div>
<?php endif; ?>

<div class="row copyright">
    <div class="large-12 medium-16 columns medium-text-center">
        <p>Copyright © <?php echo date('Y'); ?> <a class="footer-blog-name" href="<?php echo esc_url( home_url( '/' ) ); ?>">Feel Event</a>.<br />
        Kopiowanie oraz rozpowszechnianie materiałów na stronie zabronione.<p>
    </div>

    <div class="large-12 medium-16 columns medium-text-center">
        <p>Projekt zrealizowany przez: <a class="show-for-medium-down" target="_blank" href="http://www.tebim.pro/">Tebim.pl</a></p>
        <br /><a rel="nofollow" target="_blank" href="http://www.tebim.pro/"><img class="visible-for-large-up" src="<?php echo get_stylesheet_directory_uri() ; ?>/images/tebim.png" alt="Tebim - Twój e-biznes i Marketing" /></a>
    </div>
</div>

<div id="more-information" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<?php do_action('foundationPress_layout_end'); ?>


<?php get_footer(); ?>

