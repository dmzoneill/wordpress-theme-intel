<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<a href="%s" rel="bookmark"><h3>', esc_url( get_permalink() ) ), '</h3></a>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php intel_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div

	<footer class="entry-footer">
		<?php intel_entry_footer(); ?>
	</footer>
  <hr>
</article>

