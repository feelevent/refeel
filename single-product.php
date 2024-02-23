<?php get_header(); ?>

<div class="header-picture">
  <!-- get image thumbnail and set as BG image in header -->
  <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
  <img src="<?php echo $url ?>" />
  <div class="subpage-title-header">
    <div class="row">
      <p class="title"><?php the_field('subtitle_page'); ?></p>
      <p class="description"><?php the_field('short_description'); ?></p>
    </div>
  </div>
  <div class="shadow-top"></div>
  <div class="shadow-bottom"></div>
</div>

<div class="container">
  <div class="row">
    <?php
    defined( 'ABSPATH' ) || exit;
    global $product;
    /**
     * Hook: woocommerce_before_single_product.
     *
     * @hooked woocommerce_output_all_notices - 10
     */
    do_action( 'woocommerce_before_single_product' );
    if ( post_password_required() ) {
      echo get_the_password_form(); // WPCS: XSS ok.
      return;
    }
    ?>
    <div id="product-<?php the_ID(); ?>"
      <?php wc_product_class( 'wc-product-top d-flex flex-column flex-lg-row justify-content-lg-center align-content-lg-center align-items-lg-center', $product ); ?>>
      <?php
      /**
       * Hook: woocommerce_before_single_product_summary.
       *
       * @hooked woocommerce_show_product_sale_flash - 10
       * @hooked woocommerce_show_product_images - 20
       */
      do_action( 'woocommerce_before_single_product_summary' );
      ?>
      <div class="summary entry-summary">
        <?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
        <!-- moje -->
        <?php if( get_field('addons_info')): ?>
        <div class="d-block">
          <div class="addons_info">
            <!-- Viewers -->
            <div id="person_popup">
              <p><span id="demo"></span> </p>
            </div>
            <script>
              var clients = Math.floor(Math.random() * 5) + 1;
              document.getElementById("demo").innerHTML = clients;
              var demo = jQuery("#demo").text();
              if (demo == "1") {
                jQuery('#person_popup > p').append(' osoba aktualnie ogląda ofertę!');
              } else if (demo == "2") {
                jQuery('#person_popup > p').append(' osoby aktualnie oglądają ofertę!');
              } else if (demo == "3") {
                jQuery('#person_popup > p').append(' osoby aktualnie oglądają ofertę!');
              } else if (demo == "4") {
                jQuery('#person_popup > p').append(' osoby aktualnie oglądają ofertę!');
              } else if (demo == "5") {
                jQuery('#person_popup > p').append(' osób aktualnie ogląda ofertę!');
              }
            </script>
            <!-- Viewers -->
            <?php
              global $post;
              $terms = get_the_terms( $post->ID, 'product_cat' );
              foreach ( $terms as $term ) {
                  $product_cat_id = $term->name;
              break;
              }
              if($product_cat_id == 'Wieczory panieńskie'){
              echo '<div class="offer-contact-p"><p><a href="/wieczory_panienskie/formularz-kontaktowy/">Masz pytania? Skontaktuj się z nami</a></p></div>';
              }
              elseif($product_cat_id == 'Wieczory kawalerskie'){
              echo '<div class="offer-contact-k"><p><a href="/wieczory_kawalerskie/kontakt/">Masz pytania? Skontaktuj się z nami</a></p></div>';
              }
              ?>
            <?php endif; ?>
            <!-- moje end -->
          </div>
        </div>
        <?php do_action( 'woocommerce_after_single_product' ); ?>
      </div>
    </div>
    <!-- ========== Start Zakładki produktu ========== -->
    <div class="container container-title-breadcrumbs">
      <div class="row">
        <header>
          <style>
            #breadcrumbs {
              margin-top: 20px;
            }
            #breadcrumbs a {
              color: #b2b2b2;
            }
            #breadcrumbs a:hover {
              color: #fff;
            }
          </style>
          <?php if ( function_exists( 'yoast_breadcrumb' ) && is_singular() ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                } ?>
          <h1>
            <?php 
						switch ($_SERVER['REQUEST_URI']) {
							case '/oferta/wynajem-limuzyny-hummer-warszawa/':
								echo 'Wynajem limuzyny Hummer Mega';
								break;
							case '/oferta/wynajem-limuzyny-poznan/':
								echo 'Wynajem limuzyny Lincoln';
								break;
							case '/oferta/wynajem-limuzyny-krakow/':
								echo ' Wynajem Limuzyny Chrysler - wieczór kawalerski w Krakowie';
								break;
							case '/oferta/ekskluzywny-statek-w-krakowie/':
								echo 'Rejs Statkiem w Krakowie';
								break;
							case '/oferta/paintball-warszawa/':
								echo 'Paintball Warszawa - Poczuj się jak prawdziwy żołnierz';
								break;
							case '/oferta/paintball-wroclaw/':
								echo 'Paintball Wrocław — stań do walki na polu bitwy';
								break;
							case '/oferta/jazda-quadem-warszawa/':
								echo 'Jazda Quadami - wieczór kawalerski w Warszawie';
								break;
							default:
								the_title(); 
								break;
						}?>
          </h1>
        </header>
      </div>
    </div>
    <div class="container container-pills-tabs">
      <div class="row">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
              type="button" role="tab" aria-controls="pills-home" aria-selected="true">Informacje</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
              type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Pakiet korzyści</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
              type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Galeria</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-extra-tab" data-bs-toggle="pill" data-bs-target="#pills-extra"
              type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Extra</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <!-- ========== Start PIERWSZA ZAKŁADKA ========== -->
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <?php
            if(strstr($_SERVER['REQUEST_URI'],'/oferta/')){
              ob_start();
                the_content();
                $bufferContent = ob_get_contents();
                ob_end_clean();
                $bufferContent = str_replace('class="arconix-faq-wrap">','class="arconix-faq-wrap" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">',$bufferContent);
                $bufferContent = str_replace('class="arconix-faq-title faq-closed">','class="arconix-faq-title faq-closed" itemprop="name">',$bufferContent);
                $bufferContent = str_replace('<div class="arconix-faq-content faq-closed"><p>','<div class="arconix-faq-content faq-closed" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><p itemprop="text">',$bufferContent);
                echo $bufferContent;
            }
            else
            the_content(); ?>
          </div>
          <!-- ========== End PIERWSZA ZAKŁADKA ========== -->
          <!-- ========== Start DRUGA ZAKŁADKA ========== -->
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <?php if( get_field('advantages', 'option')): ?>
            <div class="offer-advantages">
              <div class="container">
                <h5>Pakiet korzyści</h5>
                <div class="row">
                  <?php while( has_sub_field('advantages', 'option')): ?>
                  <div
                    class="col-12 col-md-6 pb-4 d-flex justify-content-center align-content-center align-items-center justify-content-md-start align-content-md-start align-items-md-start">
                    <img loading="lazy" class="left" src="<?php the_sub_field('icon'); ?>" alt="" />
                    <div class="left">
                      <p class="adv-title "><strong><?php the_sub_field('title'); ?></strong></p>
                      <p class="adv-title"><?php the_sub_field('description'); ?></p>
                    </div>
                  </div>
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <!-- ========== End DRUGA ZAKŁADKA ========== -->
          <!-- ========== Start TRZECIA ZAKŁADKA ========== -->
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php if( get_field('offer_picture')): ?>
                <?php while( has_sub_field('offer_picture')): ?>
                <div class="carousel-item active">
                  <img loading="lazy" class="d-block w-100" src="<?php the_sub_field('picture'); ?>" alt="slide 1" />
                </div>
                <?php endwhile; ?>
              </div>
              <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button> -->
            </div>
            <?php endif; ?>
          </div>
          <!-- ========== End TRZECIA ZAKŁADKA ========== -->
          <!-- ========== Start CZWARTA ZAKŁADKA ========== -->
          <div class="tab-pane fade" id="pills-extra" role="tabpanel" aria-labelledby="pills-extra-tab">
            <div class="container">
              <div class="row">
                <header>
                  <h5>Dodatkowe informacje</h5>
                </header>
                <ul class="d-flex flex-column">
                  <?php while( has_sub_field('addons_info')): ?>
                  <li>
                    <img loading="lazy" class="left" src="<?php the_sub_field('icon'); ?>" alt="" />
                    <div class="left">
                      <?php the_sub_field('title'); ?>: <span><?php the_sub_field('value'); ?></span>
                    </div>
                  </li>
                  <?php endwhile; ?>
                </ul>
                <header>
                  <?php $posts = get_field('addons_info_voucher'); ?>
                  <?php if ( $posts ): ?>
                  <h5>Sposoby dostawy</h5>
                  <?php endif; ?>
                </header>
                <ul>
                  <?php while( has_sub_field('addons_info_voucher')): ?>
                  <li>
                    <img loading="lazy" class="left" src="<?php the_sub_field('icon_voucher'); ?>" alt="" />
                    <div class="left">
                      <?php the_sub_field('title_voucher'); ?>: <span><?php the_sub_field('value_voucher'); ?></span>
                    </div>
                  </li>
                  <?php endwhile; ?>
                </ul>
                <header>
                  <?php $posts = get_field('pay_info_voucher'); ?>
                  <?php if ( $posts ): ?>
                  <h5>Rodzaje płatności</h5>
                  <?php endif; ?>
                </header>
                <ul>
                  <?php while( has_sub_field('pay_info_voucher')): ?>
                  <li>
                    <img loading="lazy" class="left" src="<?php the_sub_field('pay_icon_voucher'); ?>" alt="" />
                    <div class="left">
                      <?php the_sub_field('pay_title_voucher'); ?>:
                      <span><?php the_sub_field('pay_value_voucher'); ?></span>
                    </div>
                  </li>
                  <?php endwhile; ?>
                </ul>
              </div>
            </div>
            <div class="container opinie-klientow">
              <div class="row">
                <div class=" offer-box-homepage colour-3 opinion">
                  <div class="title">
                    <h3 style="color:#fff;">
                      Opinie klientów
                    </h3>
                  </div>
                  <?php if( get_field('opinion')): ?>
                  <div class="tabs-content z_wow">
                    <?php while( has_sub_field('opinion')): ?>
                    <section role="tabpanel" aria-hidden="false" class="content <?php the_sub_field('active'); ?>"
                      id="<?php the_sub_field('id'); ?>">
                      <?php the_sub_field('description'); ?>
                    </section>
                    <?php endwhile; ?>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('opinion')): ?>
                  <ul class="tabs" data-tab role="tablist">
                    <?php while( has_sub_field('opinion')): ?>
                    <li class="tab-title <?php the_sub_field('active'); ?>" role="presentation"><a
                        href="#<?php the_sub_field('id'); ?>" role="tab" tabindex="0" aria-selected="true"
                        aria-controls="<?php the_sub_field('id'); ?>"></a></li>
                    <?php endwhile; ?>
                  </ul>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ========== End CZWARTA ZAKŁADKA ========== -->
      </div>
    </div>
  </div>
  <!-- ========== End Zakładki produktu ========== -->
  <script>
    jQuery(function () {
      jQuery('#person_popup').hide();
      setTimeout(function () {
        jQuery('#person_popup').css("display", "block !important").fadeIn(1000);
      }, 3000);
    });
  </script>
  <script>
    var animateButton = function (e) {
      e.preventDefault;
      //reset animation
      e.target.classList.remove('animate');
      e.target.classList.add('animate');
      setTimeout(function () {
        e.target.classList.remove('animate');
      }, 700);
    };
    var bubblyButtons = document.getElementsByClassName("single_add_to_cart_button");
    for (var i = 0; i < bubblyButtons.length; i++) {
      bubblyButtons[i].addEventListener('click', animateButton, false);
    }
  </script>
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
  <?php get_footer(); ?>