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

<div class="<?php echo $container; ?>" style="margin-top: 50px;">
    <div class="row">

        <div class="col-12 logo-container">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="row justify-content-center">
                        <div class="col-auto"><?php the_custom_logo(); ?></div>
                        <div class="col-12 logo-title">
                            <span>Feel Event</span>
                        </div>
                        <small class="col-12 logo-subtitle">Organizacja imprez</small>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-2 social-container">
                    <a class="fb d-flex align-items-center" target="_blank" href="https://www.facebook.com/Feel-Event-529025647197163/">
                        <span class="mask icon-facebook me-3"></span>
                        <span>Szukaj Nas<br/>na Facebooku</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 d-flex flex-wrap justify-content-center contact-info">
            <span class="map"><?php the_field('header_street', 'option'); ?>, <?php the_field('header_city', 'option'); ?>, <?php the_field('header_region', 'option'); ?></span>
            <a href="tel:<?php echo str_replace(['+','(',')',' '],['00',''],get_field('header_phone', 'option')); ?>" class="phone"><?php the_field('header_phone', 'option'); ?></a>
            <a href="mailto:<?php str_replace(' ','',get_field('header_email', 'option')); ?>" class="mail"><?php the_field('header_email', 'option'); ?></a>
        </div>

        <div class="col-12 col-lg-8 offset-lg-2 choose-type">
            <div class="row">
                <a href="<?php echo get_page_link(1969); ?>" class="col-12 col-md-6 for-man">
                    <div class="row d-flex flex-wrap h-100">
                        <div class="title">Wieczory<br/>kawalerskie</div>
                        <div class="button">
                            <span>Przejdź</span>
                        </div>
                    </div>
                </a>

                <div class="col-12 d-md-none cities-container">
                    <?php
                            wp_nav_menu( array(
                            'theme_location'  => '',
                            'menu'            => '14',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'men cities list-unstyled',
                            'menu_id'         => 'men_cities',
                            'echo'            => true,
                            'fallback_cb'     => false,
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            // 'items_wrap'      => '<ul>%3$s</ul>',
                            'depth'           => 1
                    ) ); ?>
                </div>

                <a href="<?php echo get_page_link(2787); ?>" class="col-12 col-md-6 for-woman">
                    <div class="row d-flex flex-wrap h-100">
                        <div class="title">Wieczory<br/>panieńskie</div>
                        <div class="button">
                            <span>Przejdź</span>
                        </div>
                    </div>
                </a>

                <div class="col-12 d-md-none cities-container">
                    <?php
                            wp_nav_menu( array(
                            'theme_location'  => '',
                            'menu'            => '15',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'women cities list-unstyled',
                            'menu_id'         => 'women_cities',
                            'echo'            => true,
                            'fallback_cb'     => false,
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            // 'items_wrap'      => '<ul>%3$s</ul>',
                            'depth'           => 1
                    ) ); ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8 offset-lg-2 d-none d-md-block cities-container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <?php
                            wp_nav_menu( array(
                            'theme_location'  => '',
                            'menu'            => '14',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'men cities list-unstyled',
                            'menu_id'         => 'men_cities',
                            'echo'            => true,
                            'fallback_cb'     => false,
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            // 'items_wrap'      => '<ul>%3$s</ul>',
                            'depth'           => 1
                    ) ); ?>
                </div>

                <div class="col-12 col-md-6">
                    <?php
                            wp_nav_menu( array(
                            'theme_location'  => '',
                            'menu'            => '15',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'women cities list-unstyled',
                            'menu_id'         => 'women_cities',
                            'echo'            => true,
                            'fallback_cb'     => false,
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            // 'items_wrap'      => '<ul>%3$s</ul>',
                            'depth'           => 1
                    ) ); ?>
                </div>
            </div>
        </div>

        <?php if ( get_field('content_paragraf') ) : ?>
        <div class="col-12 col-lg-8 offset-lg-2 looking-for">
            <div class="row">
                <?php echo get_field('content_paragraf'); ?>
            </div>
        </div>
        <?php endif; ?>

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

    </div>
</div>

<?php
get_footer();
