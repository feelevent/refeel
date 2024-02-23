<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $for_who;
$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<header id="wrapper-navbar">

		<a class="skip-link <?php echo understrap_get_screen_reader_class( true ); ?>" href="#content">
			<?php esc_html_e( 'Skip to content', 'understrap' ); ?>
		</a>

		<?php if(!is_front_page()):
			if( !$for_who = get_field( "for_who" ) ) {
				if( !$for_who = get_field( "for_who", $post->post_parent ) ) {
					if( !$for_who = get_field( "for_who", get_post($post->post_parent)->post_parent ) ) {
						if( !$for_who = ( is_category(1) ? "men" : ( is_category(18) ? "women" : ( is_category(19) ? "company" : "" ) ) ) ) {
							if( !$for_who = ( in_category(1) ? "men" : ( in_category(18) ? "women" : ( in_category(19) ? "company" : "" ) ) ) ) {
								if( $for_who = get_the_custom_category( $post->ID, "product_cat" ) ) {
									$for_who = get_the_custom_category( $post->ID, "product_cat" )[0]->term_id;
								}
							}
						}
					}
				}
			}

			if( isset( $for_who ) ) {
				if( $for_who == '38' ) $for_who = 'women';
				if( $for_who == '37' ) $for_who = 'men';
			}

			get_template_part( 'global-templates/navbar', $navbar_type . '-' . $bootstrap_version );
		endif; ?>
	</header><!-- #wrapper-navbar -->
