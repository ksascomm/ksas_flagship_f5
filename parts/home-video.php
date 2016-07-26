<article class="small-12 medium-4 columns">
	<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_video" onclick="ga('send', 'event', 'Video', 'Play', '<?php the_title(); ?>');">
		<div class="video_thumb">
			<span class="icon-play4" aria-hidden="true"></span><?php the_post_thumbnail('rss'); ?>
		</div>
		<h3><?php the_title(); ?></h3>
		<summary><?php the_excerpt(); ?></summary>
	</a>
</article>
<div id="modal_home_<?php the_id(); ?>_video" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" class="reveal-modal large black_bg">
	<div class="flex-video">
		<?php the_content(); ?>
	</div>
	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
