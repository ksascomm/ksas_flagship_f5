<article class="small-12 medium-4 columns">
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('rss'); ?>
		<h3><?php the_title(); ?></h3>
		<summary><?php the_excerpt(); ?></summary>
	</a>
</article>
