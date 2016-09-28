<?php get_header(); ?>
<div class="row wrapper radius10" role="main">
	<div class="small-12 columns">
		<div class="row">
			<div class="small-12 columns" id="archive">
			<h1><?php single_cat_title(); ?> Archive</h1>
			<?php while (have_posts()) : the_post(); ?>
					<article class="small-12 large-6 columns">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('rss'); ?>								
							<time><?php if(get_post_meta($post->ID, 'date_newsletter', true)) { echo get_post_meta($post->ID, 'date_newsletter', true); } else { echo get_the_date(); } ?></time>
							<h5><?php the_title(); ?></h5>
							<summary><?php the_excerpt(); ?></summary>
						</a>
					</article>			
			<?php endwhile; ?>
			</div>
		</div>
		<div class="row">
			<?php flagship_pagination(max_num_pages); ?>		
		</div>
	</div>
</div>

<?php get_footer(); ?>