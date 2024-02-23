<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";
	
	$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );
	wp_enqueue_script( 'jquery' );
	
	$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_scripts );
	
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );




/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

/**
 * Creates ACF options page
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
}

if ( ! function_exists( 'woocommerce_template_loop_open_desc_box' ) ) {
	/**
	 * Open product loop description box wrapper.
	 */
	function woocommerce_template_loop_open_desc_box() {
		echo "<div class='offer-list-box-description'>";
	}
}

if ( ! function_exists( 'woocommerce_template_loop_close_desc_box' ) ) {
	/**
	 * Closeproduct loop description box wrapper.
	 */
	function woocommerce_template_loop_close_desc_box() {
		echo "</div>";
	}
}

if ( ! function_exists( 'woocommerce_template_loop_max_people' ) ) {
	/**
	 * Get the product max people for the loop.
	 */
	function woocommerce_template_loop_max_people() {
		if( get_field('people', get_the_ID()) ):
			echo "<div class='offer-list-box-number'>".get_field('people', get_the_ID())."</div>";
		endif;
	}
}

if ( ! function_exists( 'woocommerce_template_loop_custom_price' ) ) {
	/**
	 * Get the product price for the loop.
	 */
	function woocommerce_template_loop_custom_price() {
		global $product;
		if ( $price_html = $product->get_price_html() ) :
			echo "<div class='offer-list-box-price'>" . $price_html;
				if ( get_field('event_category',get_the_ID()) ) :
					echo " / " . get_field('event_category',get_the_ID());
				endif;
			echo "</div>";
		endif;
	}
}

if ( ! function_exists( 'woocommerce_template_loop_title_custom_class' ) ) {
	/**
	 * Change product title class in loop
	 */
	function woocommerce_template_loop_title_custom_class() {
		return 'offer-list-box-title'; 
	}
}

if ( ! function_exists( 'woocommerce_template_loop_advantages' ) ) {
	/**
	 * Add product advantages in loop
	 */
	function woocommerce_template_loop_advantages() {
		echo "<div class='offer-list-box-description-more'>";
			if ( have_rows('more_usp', get_the_ID()) ) :
				while( have_rows('more_usp', get_the_ID()) ) : the_row();
					echo "<p><img src='" . get_stylesheet_directory_uri() . "/img/usp-star.webp' alt=''>" . get_sub_field('info_usp', get_the_ID()) . "</p>";
				endwhile;
			endif;
		echo "</div>";
	}
}

// Usuń title z wc-summary START
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
// Usuń title z wc-summary KONIEC


// Usuń price-range z strony produktu START
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
// Usuń price-range z strony produktu KONIEC

// Usuwa SKU z strony summary produktu
add_filter( 'wc_product_sku_enabled', '__return_false' );
// Usuwa kategorie z summary produktu
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );






function get_the_custom_category( $post_id = false, $category = 'category' ) {
    $categories = get_the_terms( $post_id, $category );
    if ( ! $categories || is_wp_error( $categories ) ) {
        $categories = array();
    }

    $categories = array_values( $categories );

    foreach ( array_keys( $categories ) as $key ) {
        _make_cat_compat( $categories[ $key ] );
    }

    /**
     * Filters the array of categories to return for a post.
     *
     * @since 3.1.0
     * @since 4.4.0 Added `$post_id` parameter.
     *
     * @param WP_Term[] $categories An array of categories to return for the post.
     * @param int|false $post_id    ID of the post.
     */
    return apply_filters( 'get_the_categories', $categories, $post_id );
}



/* =======POPRAWKI SEO AGENCJI  -  START =========*/
// Breadcrumb
function the_breadcrumb() {
    global $post;
    echo '<ul class="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Strona główna';
        echo '</a></li>';
        if (is_category() || is_single()) {
            echo '<li class="no-separate">';
            the_category('</li><li> ');
            if (is_single()) {
                echo '</li><li class="unavailable">';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
                }
                echo $output;
                echo '<span class="unavailable" title="'.$title.'"> '.$title.'</span>';
            } else {
                echo '<li class="unavailable">'.get_the_title().'</li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}


add_action('get_header', 'rmyoast_ob_start');
add_action('wp_head', 'rmyoast_ob_end_flush', 100);

function rmyoast_ob_start() {
    ob_start('remove_yoast');
}
function rmyoast_ob_end_flush() {
    ob_end_flush();
}
function remove_yoast($output) {
    if (defined('WPSEO_VERSION')) {
        $output = str_ireplace('<!-- This site is optimized with the Yoast WordPress SEO plugin v' . WPSEO_VERSION . ' - https://yoast.com/wordpress/plugins/seo/ -->', '', $output);
        $output = str_ireplace('<!-- / Yoast WordPress SEO plugin. -->', '', $output);
    }
    return $output;
}

define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

@include('optymalizacja_yoast.php');



//breadcrumb - sunrise systems

function change_breadcrumb_names($output) {
    if($_SERVER['REQUEST_URI'] == '/wieczory_kawalerskie/warszawa/') {
        $output = str_replace('<span class="breadcrumb_last" aria-current="page">Wieczór kawalerski – Warszawa – FeelEvent</span>', '<span class="breadcrumb_last" aria-current="page">Wieczór kawalerski Warszawa</span>', $output);
    }
    elseif($_SERVER['REQUEST_URI'] == '/wieczory_kawalerskie/krakow/') {
        $output = str_replace('<span class="breadcrumb_last" aria-current="page">Wieczór kawalerski w Krakowie &#8211; Królewska zabawa</span>', '<span class="breadcrumb_last" aria-current="page">Wieczór kawalerski Kraków</span>', $output);
    }
    elseif($_SERVER['REQUEST_URI'] == '/wieczory_kawalerskie/poznan/') {
        $output = str_replace('<span class="breadcrumb_last" aria-current="page">Wieczór kawalerski w Poznaniu – prawdziwie męskie party</span>', '<span class="breadcrumb_last" aria-current="page">Wieczór kawalerski Poznań</span>', $output);
    }
    elseif($_SERVER['REQUEST_URI'] == '/wieczory_kawalerskie/lodz/') {
        $output = str_replace('<span class="breadcrumb_last" aria-current="page">Wieczór kawalerski &#8211; Łódź &#8211; FeelEvent</span>', '<span class="breadcrumb_last" aria-current="page">Wieczór kawalerski Łódź</span>', $output);
    }
    elseif($_SERVER['REQUEST_URI'] == '/wieczory_kawalerskie/wroclaw/') {
        $output = str_replace('<span class="breadcrumb_last" aria-current="page">Wieczór kawalerski – Wrocław– FeelEvent</span>', '<span class="breadcrumb_last" aria-current="page">Wieczór kawalerski Wrocław</span>', $output);
    }
    elseif($_SERVER['REQUEST_URI'] == '/wieczory_panienskie/warszawa/') {
        $output = str_replace('<span class="breadcrumb_last" aria-current="page">Wieczór panieński &#8211; Warszawa &#8211; FeelEvent</span>', '<span class="breadcrumb_last" aria-current="page">Wieczór panieński Warszawa </span>', $output);
    }
    elseif($_SERVER['REQUEST_URI'] == '/wieczory_panienskie/krakow/') {
        $output = str_replace('<span class="breadcrumb_last" aria-current="page">Wieczór panieński w Krakowie – pomysły na szalone party</span>', '<span class="breadcrumb_last" aria-current="page">Wieczór panieński Kraków</span>', $output);
    }
    elseif($_SERVER['REQUEST_URI'] == '/wieczory_panienskie/lodz/') {
        $output = str_replace('<span class="breadcrumb_last" aria-current="page">Wieczór panieński &#8211; Łódź &#8211; FeelEvent</span>', '<span class="breadcrumb_last" aria-current="page">Wieczór panieński Łódź</span>', $output);
    }
    elseif($_SERVER['REQUEST_URI'] == '/wieczory_panienskie/poznan/') {
        $output = str_replace('<span class="breadcrumb_last" aria-current="page">Wieczór panieński &#8211; Poznań &#8211; FeelEvent</span>', '<span class="breadcrumb_last" aria-current="page">Wieczór panieński Poznań</span>', $output);
    }
    elseif($_SERVER['REQUEST_URI'] == '/wieczory_panienskie/wroclaw/') {
        $output = str_replace('<span class="breadcrumb_last" aria-current="page">Wieczór panieński &#8211; Wrocław &#8211; FeelEvent</span>', '<span class="breadcrumb_last" aria-current="page">Wieczór panieński Wrocław</span>', $output);
    }

     return $output;
}

add_filter('wpseo_breadcrumb_output', 'change_breadcrumb_names');

// zmiana statusu na completed po dokonanej płatności
add_action( 'woocommerce_payment_complete', 'my_change_status_function' );

function my_change_status_function( $order_id ) {

    $order = wc_get_order( $order_id );
    $order->update_status( 'completed' );

}
//

/* =======POPRAWKI SEO AGENCJI  -  END =========*/


// ======= KOD PROGRAMISTÓW PONIŻEJ
//
// Zmiana KUP TERAZ NA zapytaj o dostępność
//
add_filter( 'woocommerce_order_button_text', 'misha_custom_button_text' );

function misha_custom_button_text( $button_text ) {
   return 'ZAPYTAJ O DOSTĘPNOŚĆ'; // new text is here
}

function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );


// strona produktu
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'ZAPYTAJ O DOSTĘPNOŚĆ', 'woocommerce' ); }


//
// Zmiana KUP TERAZ NA ....
//
function woo_custom_cart_button_text() {
	return __('ZAPYTAJ O DOSTĘPNOŚĆ', 'woocommerce');
	}

// Usuwa kupony WC
//
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_coupon_form', 5 );
//

// Usuwa obrazek produktu z checkout
//
add_filter( 'woocommerce_cart_item_thumbnail', '__return_false' );
// 

// Usuwa pole kuponu z koszyka
//
function disable_coupon_field_on_cart( $enabled ) {
	if ( is_cart() ) {
		$enabled = true;
	}
	return $enabled;
}
add_filter( 'woocommerce_coupons_enabled', 'disable_coupon_field_on_cart' );

//Remove related products output
 //
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );


add_action('woocommerce_order_button_text', 'custom_checkout_button_text');
function custom_checkout_button_text() {
    $categories   = array('vouchery');
    $has_category = false;

    // Loop through cart items
    foreach ( WC()->cart->get_cart() as $cart_item ) {
        // Check for product categories
        if ( has_term( $categories, 'product_cat', $cart_item['product_id'] ) ) {
            $has_category = true;
            break;
        }
    }

    // Testing output (display a notice)
    if ( $has_category ) {
        // wc_print_notice( sprintf( 'Product category "%s" is in cart!', reset($categories)), 'notice' );
        return __( 'KUP VOUCHER', 'woocommerce' ); // custom text Here
    } else {
        return __( 'ZAPYTAJ O DOSTĘPNOŚĆ', 'woocommerce' ); // Here the normal text
    }
}

// ====================
/**
 * Remove all product structured data.
 */
function ace_remove_product_structured_data( $types ) {
	if ( ( $index = array_search( 'product', $types ) ) !== false ) {
		unset( $types[ $index ] );
	}

	return $types;
}
add_filter( 'woocommerce_structured_data_type_for_page', 'ace_remove_product_structured_data' );

function wc_remove_some_structured_data( $markup ) {
	unset( $markup['offers'] );
	return $markup;
}
add_filter( 'woocommerce_structured_data_product', 'wc_remove_some_structured_data' );

//
// Ukrywanie cen przed google og:: END
//

function allow_payment_without_login( $allcaps, $caps, $args ) {
    // Check we are looking at the WooCommerce Pay For Order Page
    if ( !isset( $caps[0] ) || $caps[0] != 'pay_for_order' )
        return $allcaps;
    // Check that a Key is provided
    if ( !isset( $_GET['key'] ) )
        return $allcaps;

    // Find the Related Order
    $order = wc_get_order( $args[2] );
    if( !$order )
        return $allcaps; # Invalid Order

    // Get the Order Key from the WooCommerce Order
    $order_key = $order->get_order_key();
    // Get the Order Key from the URL Query String
    $order_key_check = $_GET['key'];

    // Set the Permission to TRUE if the Order Keys Match
    $allcaps['pay_for_order'] = ( $order_key == $order_key_check );

    return $allcaps;
}
add_filter( 'user_has_cap', 'allow_payment_without_login', 10, 3 );

add_action( 'woocommerce_thankyou', 'adding_customers_details_to_thankyou', 10, 1 );
function adding_customers_details_to_thankyou( $order_id ) {
    // Only for non logged in users
    if ( ! $order_id || is_user_logged_in() ) return;

    $order = wc_get_order($order_id); // Get an instance of the WC_Order object

    wc_get_template( 'order/order-details-customer.php', array('order' => $order ));
}
/**
 * Usuwa informacje z Emaila o tym ze wybrano płatność gotówką przy odbiorze
 */
add_action( 'woocommerce_email_before_order_table', function(){
    if ( ! class_exists( 'WC_Payment_Gateways' ) ) return;

    $gateways = WC_Payment_Gateways::instance(); // gateway instance
    $available_gateways = $gateways->get_available_payment_gateways();

    if ( isset( $available_gateways['cod'] ) )
        remove_action( 'woocommerce_email_before_order_table', array( $available_gateways['cod'], 'email_instructions' ), 10, 3 );
}, 1 );

// Change header of checkout/thnakYou PHP page
// Mail do klienta o  otrzymanym ZAPYTANIU
function bk_title_order_received( $title, $id ) {
	if ( is_order_received_page() && get_the_ID() === $id ) {
		$title = "Dziękujemy. Zapytanie zostało wysłane.</br>
        <div>
            Konsultant w ciągu 24h sprawdzi dostępność i odpowie na Twoje zapytanie.</br>
            Kopię zapytania znajdziesz również w swojej skrzynce mailowej.
            </br>
            </br>
            Nasi Konsultanci są do Twojej dyspozycji od poniedziałku do soboty w godzinach 9:00 – 18:00
        </div>";

	}
	return $title;
}
add_filter( 'the_title', 'bk_title_order_received', 10, 2 );

add_filter( 'woocommerce_cart_item_name', 'bbloomer_cart_item_category', 99, 3);

function bbloomer_cart_item_category( $name, $cart_item, $cart_item_key ) {

$product_item = $cart_item['data'];

// make sure to get parent product if variation
if ( $product_item->is_type( 'variation' ) ) {
$product_item = wc_get_product( $product_item->get_parent_id() );
}

$cat_ids = $product_item->get_category_ids();

// if product has categories, concatenate cart item name with them
if ( $cat_ids ) $name .= '</br>' . wc_get_product_category_list( $product_item->get_id(), ', ', '<span class="posted_in katygoria_produktu">' . _n( 'Category:', 'Category:', count( $cat_ids ), 'woocommerce' ) . ' ', '</span>' );

return $name;

}


add_filter( 'wc_smart_cod_fee_title', 'change_cod_title' );

function example_serif_font_and_large_address() {
    ?>
        <style>
            #page {
            font-size: 1.5em;
            font-family: Georgia, serif;
        }

        .order-addresses address {
            font-size: 1.5em;
            line-height: 150%;
        }
    </style>
<?php
}
add_action( 'wcdn_head', 'example_serif_font_and_large_address', 20 );


function modfuel_woocommerce_before_order_add_cat($name, $item){

    $product_id = $item['product_id'];

    $_product = wc_get_product( $product_id );
    $htmlStr = "";
    $cats = "";
    $terms = get_the_terms( $product_id, 'product_cat' );

    $count = 0;
    foreach ( $terms as $term) {
     $count++;

     if($count > 1){
       $cats .= $term->name;
     }
     else{
       $cats .= $term->name . ',';
     }

    }

    $cats = rtrim($cats,',');

    $htmlStr .= $_product->get_title();

    $htmlStr .= "<span> <p>Kat.: " . $cats . "</p></span>";

    return $htmlStr;
 }

 add_filter('woocommerce_order_item_name','modfuel_woocommerce_before_order_add_cat', 10, 2);



/**
 * Generate Open Graph Image Overlay
 * @param integer post ID
 * @author Al-Mamun Talukder <https://itsmereal.com>
 */
function generate_og_image( $post_id ) {

    if ( $post_id ) {

	if ( get_post_thumbnail_id( $post_id ) ) {

	    $featured_image = get_post_thumbnail_id( $post_id );

	} else {

	    $featured_image = 10;

	}

        $overlay_image  = 12;
        $overlay_x      = 0;
        $overlay_y      = 480;

        $overlay_type   = get_post_mime_type( $overlay_image );

        $overlay_image_meta = wp_get_attachment_image_src( $overlay_image , 'full' );
        $overlay_width  = $overlay_image_meta['1'];
        $overlay_height = $overlay_image_meta['2'];

        $ogImage  = imagecreatefromjpeg( get_attached_file( $featured_image ) );

        if ( $overlay_type == 'image/jpeg' ) {

            $addition = imagecreatefromjpeg( get_attached_file( $overlay_image ) );

        } elseif ( $overlay_type == 'image/png' ) {

            $addition = imagecreatefrompng( get_attached_file( $overlay_image ) );

        }

        imagecopy( $ogImage, $addition, $overlay_x, $overlay_y, 0, 0, $overlay_width, $overlay_height );

        header('Content-Type: image/png');

        imagepng( $ogImage );

        imagedestroy($ogImage);
        imagedestroy($addition);

    } else {

	wp_die( 'Post ID is required' );

    }
}
// Dodaje async do script tag  =========== START
function add_async_forscript($url)
{
    if (strpos($url, '#asyncload')===false)
        return $url;
    else if (is_admin())
        return str_replace('#asyncload', '', $url);
    else
        return str_replace('#asyncload', '', $url)."' async='async";
}
add_filter('clean_url', 'add_async_forscript', 11, 1);
// Dodaje async do script tag   =========== END

////////////////////////////////////////////////
// Usuwa dasz icony z panelu adina
// >>>>>>>>>>>>>>>>>>>> remember to change MENU ICONS to FONTawsome !!!!!!!!!!!!!!!!
////////////////////////////////////////////////
function wpdocs_dequeue_dashicon() {
	if (current_user_can( 'update_core' )) {
			return;
	}
	wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );


function add_link_atts($atts) {
  $atts['class'] = "nav-link";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');
///////////////////   remove dashicons END

/**
* Control heartbeat in WordPress
*/
add_filter( 'heartbeat_settings', 'custom_heartbeat_frequency' );
function custom_heartbeat_frequency( $settings ) {
  $settings['interval'] = 15; // Change the value (in seconds) to your desired frequency.
  return $settings;
}


// Status ORER Dla OPINIE
/**
 * Nowy status - add an array for each status
**/
function register_new_wc_order_statuses() {
    register_post_status( 'wc-add-opinion', array(
        'label'                     => 'Opinie',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Opinie (%s)', 'Opinie (%s)' )
    ) );
    // repeat register_post_status() for each new status
}
add_action( 'init', 'register_new_wc_order_statuses' );


// Dodanie nowego statusu do listy WC ORDER status
function add_new_wc_statuses_to_order_statuses( $order_statuses ) {

    $new_order_statuses = array();

    // doda nowy status po odnotowania zmiany
    foreach ( $order_statuses as $key => $status ) {

        $new_order_statuses[ $key ] = $status;

        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-add-opinion'] = 'Opinie';
        }
    }

    return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_new_wc_statuses_to_order_statuses' );
// End

// ACF dodanie strony PRO START
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
}
// ACF dodanie strony PRO END
