<?php

get_header(); 

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content', 'single' );

	the_post_navigation();
	
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
		
endwhile; 
	
get_footer(); 

?>
