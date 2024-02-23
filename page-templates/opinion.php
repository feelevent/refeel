<?php
/*
Template Name: Opinie
*/
get_header(); ?>
<div class="slider">
		<?php if( get_field('slider')): ?>
		<ul class="example-orbit" data-orbit data-options="pause_on_hover:false; timer_speed:5000;">
			<?php while( has_sub_field('slider')): ?>
			<li>
				<div class="orbit-caption small-only-text-center medium-only-text-center <?php the_sub_field('active'); ?>">
					<div class="row-custom">
						<h1 class="h1 title"><?php the_sub_field('title'); ?></h1>
                        <?php if ( function_exists( 'yoast_breadcrumb' ) && is_singular() ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); } ?>
						<p class="description"><?php the_sub_field('description'); ?></p>
					</div>
				</div>
				<img src="<?php the_sub_field('picture'); ?>" alt="slide 1" />
				<div class="shadow-bottom"></div>
			</li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>
	</div>




	<div class="row-custom homepage">
		<div class="homepage-margin">
			<?php if( get_field('description_homepage')): ?>
			<?php while( has_sub_field('description_homepage')): ?>
			<div class="large-4 medium-4 columns">
				<div class="row-custom">
					<div class="large-12 columns offer-box-homepage colour-1 scroll">
						<div class="title">
							<h1>
								<?php the_sub_field('title'); ?>
							</h1>
						</div>
						<div class="inside-scroll">
							<?php the_sub_field('description'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php if( get_field('promo_homepage')): ?>
			<?php while( has_sub_field('promo_homepage')): ?>
			<div class="large-4 medium-4 columns">
				<div class="row-custom">
					<div class="large-12 columns offer-box-homepage colour-2" style="background: url('<?php the_sub_field('background'); ?>') no-repeat 0 0; background-size: 100% 100%;">
						<div class="title">
							<h3>
								<?php the_sub_field('title'); ?>
							</h3>
						</div>
						<div class="promo">
							<a href="<?php the_sub_field('url'); ?>">
								<p><strong><?php the_sub_field('title_promo'); ?></strong></p>
								<p><?php the_sub_field('description_promo'); ?></p>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
  </div>
  <div id="row_testimonials" class="row-custom" style="margin-bottom:50px;">

<?php if ( have_rows('testimonial') ) : ?>

  <?php while( have_rows('testimonial') ) : the_row(); ?>

  <div class="large-6 medium-6 columns testimonial-columns equalHeight">
      <div class="testimonial testimonial-primary " >
				<p class="testimonial-content">    <?php the_sub_field('opinion_description'); ?></p>
				<?php the_sub_field('opinion_rating'); ?>

				<a href="				<?php if( get_sub_field('link_ofert') ) : ?>
					<?php echo get_sub_field('link_ofert'); ?>
				<?php endif; ?>"><?php if( get_sub_field('link_ofert_title') ) : ?>
					<?php echo get_sub_field('link_ofert_title'); ?>
				<?php endif; ?></a>


        <div class="testimonial-author"><img src="    <?php the_sub_field('opinion_avatar'); ?>" alt="" class="testimonial-author-image">
          <div class="testimonial-author-content">
            <h6 class="name">    <?php the_sub_field('opinion_name'); ?></h6><span class="caption">    <?php the_sub_field('opinion_date'); ?></span>
          </div>
        </div>
			</div>
    </div>

  <?php endwhile; ?>

<?php endif; ?>


<script>
(function () {
  equalHeight(false);
})();

window.onresize = function(){
  equalHeight(true);
}

function equalHeight(resize) {
  var elements = document.getElementsByClassName("equalHeight"),
      allHeights = [],
      i = 0;
  if(resize === true){
    for(i = 0; i < elements.length; i++){
      elements[i].style.height = 'auto';
    }
  }
  for(i = 0; i < elements.length; i++){
    var elementHeight = elements[i].clientHeight;
    allHeights.push(elementHeight);
  }
  for(i = 0; i < elements.length; i++){
    elements[i].style.height = Math.max.apply( Math, allHeights) + 'px';
    if(resize === false){
      elements[i].className = elements[i].className + " show";
    }
  }
}

</script>

  </div>
<?php get_footer(); ?>
