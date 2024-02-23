<?php
/*
Template Name: Zamówienie
*/
get_header(); ?>

<?php include (TEMPLATEPATH . '/top.php'); ?>
	
	<div class="row">
		<?php while (have_posts()) : the_post(); ?>
		<div class="large-12 columns subpage full" role="main">
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				
				<?php the_content(); ?>		
			</article>
		</div>
		<?php endwhile;?>
	</div>
	



<?php include (TEMPLATEPATH . '/bottom.php'); ?>

<script type="text/javascript">
$(document).ready(function() {

    $('#filter a').click(function (e) {
        e.preventDefault();
             
        // set active class
        $('#filter a').removeClass('active');
        $(this).addClass('active');
             
        // get group name from clicked item
        var groupName = $(this).attr('data-group');
        $('.produkt').hide();
        $('.produkt').each(function(e,ob){
            if($(ob).hasClass(groupName))
                $(ob).fadeIn("slow");
        });
        
    });
   
});
</script>

<?php get_footer(); ?>

