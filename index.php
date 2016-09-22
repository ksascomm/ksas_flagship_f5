<?php get_header(); ?>

<?php 

$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
$flagship_news_archive_query = new WP_Query(array(
    		'post_type' => array('deptextra', 'post'),
    		'category_name' => 'news',
    		'posts_per_page' => '12',
    		'paged' => $paged
       		)); 
?>

<main class="row wrapper radius10" role="main">
	<div class="small-12 columns">
		<div class="row">
			<div class="small-12 columns" id="archive">
			<h1>News &amp; Video Archive</h1>
			<?php locate_template('/parts/archive-navigation.php', true, false); ?>
			<?php while ($flagship_news_archive_query->have_posts()) : $flagship_news_archive_query->the_post(); ?>
				<?php $format = get_post_format();  //Determine post format
					if ( false === $format ) { $format = 'standard'; }
					if ( $format == 'standard' ) { ?>

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
					
				<?php } if ( $format == 'video' ) { ?>
					<article class="medium-6 columns" id="post-<?php the_ID(); ?>">
						<header class="entry-header">
							<time><?php echo get_the_date(); ?></time>
							<h1><span class="fa fa-video-camera" aria-hidden="true"></span>
								<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_video"><?php the_title(); ?></a>
							</h1>
						</header>	
						<div class="entry-content">
							<div class="video_thumb archive">
								<?php the_post_thumbnail('bullet', array('class' => 'floatleft')); ?>
							</div>
							<summary>
								<?php echo limit_words(get_the_excerpt(), '25'); ?>
								<a href="<?php the_permalink(); ?>">[Read More]</a>
							</summary>
						</div>
					</article>
					
				<?php } if ( $format == 'image' ) { ?>
					<article class="medium-6 columns" id="post-<?php the_ID(); ?>">
						<header class="entry-header">
							<time><?php echo get_the_date(); ?></time>
							<h1><span class="fa fa-camera" aria-hidden="true"></span>
								<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_image"><?php the_title(); ?></a>
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
				<?php } ?>
			<?php endwhile; ?>
			</div>
		</div>
		<div class="row" role="navigation">
			<?php flagship_pagination($flagship_news_archive_query->max_num_pages); ?>		
		</div>
	</div>
</main>

<?php while ($flagship_news_archive_query->have_posts()) : $flagship_news_archive_query->the_post(); 
	$format = get_post_format();  //Determine post format ?>
	
	<?php if ( $format == 'video' ) { ?>
		<div id="modal_home_<?php the_id(); ?>_video" class="reveal-modal large black_bg" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<div class="flex-video">
				<?php the_content(); ?>
			</div>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>	
	
	<?php } if ( $format == 'image' ) { ?>
		<div id="modal_home_<?php the_id(); ?>_image" class="reveal-modal large black_bg" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
				<?php the_post_thumbnail('full'); ?>
				<h4><?php echo get_the_date(); ?> - <?php the_title();?></h4>
				<?php the_content(); ?>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
	<?php } ?>
<?php endwhile; ?>
<?php get_footer(); ?>