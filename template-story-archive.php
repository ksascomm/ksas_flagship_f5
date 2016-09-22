<?php
/*
Template Name: Article Archive
*/
?>
<?php get_header(); ?>

<?php $paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
			if ( false === ( $flagship_article_archive_query = get_transient( 'flagship_article_archive_query_' . $paged ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_article_archive_query = new WP_Query(array(
					'category_name' => 'news',
					'tax_query' => array(
					    array(
					    'taxonomy' => 'post_format',
					    'field' => 'slug',
					    'terms' => array('post-format-video', 'post-format-image'),
					    'operator' => 'NOT IN')),
					'posts_per_page' => '12',
					'paged' => $paged
					)); 
					set_transient( 'flagship_article_archive_query_' . $paged, $flagship_article_archive_query, 2592000 );
			} 	?>

<main class="row wrapper radius10">
	<div class="small-12 columns">
		<div class="row">
			<div class="small-12 columns" id="archive">
			<h1>News Articles</h1>
			<?php locate_template('/parts/archive-navigation.php', true, false); ?>			
			<?php while ($flagship_article_archive_query->have_posts()) : $flagship_article_archive_query->the_post(); ?>
<article class="medium-6 columns" id="post-<?php the_ID(); ?>">
						<header class="entry-header">
							<time><?php echo get_the_date(); ?></time>
							<h1><span class="fa fa-newspaper-o" aria-hidden="true"></span>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h1>
						</header>	
						<div class="entry-content">
							<?php the_post_thumbnail('bullet', array('class' => 'floatleft')); ?>		
							<summary>
								<?php echo limit_words(get_the_excerpt(), '25'); ?>
								<a href="<?php the_permalink(); ?>">[Read More]</a>
							</summary>
						</div>
					</article>		
			<?php endwhile; ?>
			</div>
		</div>
		<div class="row">
			<?php flagship_pagination($flagship_article_archive_query->max_num_pages); ?>		
		</div>
	</div>
</main>

<?php get_footer(); ?>