<article class="small-12 medium-4 columns" aria-label="<?php the_title();?> article" id="post-<?php the_ID(); ?>">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php the_post_thumbnail('rss'); ?>
		<h3><?php the_title(); ?></h3>
		<summary><?php the_excerpt(); ?></summary>
	</a>
</article>
