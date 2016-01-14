<article class="small-12 medium-4 columns">
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('rss', array( 'class' => 'no-lazy')); ?>
		<h3><?php the_title(); ?></h3>
		<summary><p><?php the_excerpt(); ?></p></summary>
	</a>
</article>
<hr>