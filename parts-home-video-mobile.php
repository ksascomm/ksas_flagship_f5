		<?php 
		$vid_url = get_the_content();
		$embed_vid = "[embed]" . $vid_url . "[/embed]"; 
		$wp_embed = new WP_Embed();
		$post_embed = $wp_embed->run_shortcode($embed_vid); ?>

<article class="small-12 medium-4 columns">
	<div class="video_thumb">
		<a href="<?php echo $vid_url ;?>">
			<span class="icon-play"></span><?php the_post_thumbnail('rss', array( 'class' => 'no-lazy')); ?>
		</a>
	</div>
	<h3><?php the_title(); ?></h3>
	<summary><?php the_excerpt(); ?></summary>

</article>
<hr>