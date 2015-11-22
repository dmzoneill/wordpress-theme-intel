<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h3>', '</h3>' ); ?>

		<div class="entry-meta">
			<?php intel_posted_on(); ?>
		</div>
	</header>
		
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'intel' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="entry-footer">
		<?php intel_entry_footer(); ?>
	</footer>
  <hr>
</article>

