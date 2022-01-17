<?php 
get_header();
if ( have_posts() ) : 
	while ( have_posts() ) : the_post();
		?>
		<article <?php post_class() ?>>
			<?php get_template_part( 'parts/post-title' ) ?>
			<?php the_content() ?>
		</article>
		<?php
	endwhile; 
endif; 
get_footer();
?>