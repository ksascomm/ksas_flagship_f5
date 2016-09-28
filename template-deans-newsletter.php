<?php
/*
Template Name: Dean's Newsletter
*/
?>
<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php if ( false === ( $dean_letter_query = get_transient( 'dean_letter_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$dean_letter_query = new WP_Query(array(
						'post_type' => 'post',
						'category_name' => 'newsletter',
						'posts_per_page' => '1',						
						));
					set_transient( 'dean_letter_query', $dean_letter_query, 2592000 ); }
?>
<?php if ( $dean_letter_query->have_posts() ) : while ( $dean_letter_query->have_posts() ) : $dean_letter_query->the_post(); ?>
	<div class="small-12 medium-8 columns wrapper radius-left offset-topgutter" role="main">
		<h1 class="no-margin">
			Dean's Newsletter 
		</h1>
		<h2 class="newsletter subheader"><?php echo get_post_meta($post->ID, 'date_newsletter', true); ?></h2>
		<hr>
		<article role="article" itemscope itemtype="http://schema.org/BlogPosting">
			<header class="newsletter-header" itemprop="headline">	
				<h1><?php the_title();?></h1>
			</header> <!-- end article header -->
			<section class="entry-content" itemprop="articleBody">
				<?php the_content(); ?>
			</section> <!-- end article section -->
		</article> <!-- end article -->
	</div>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>
	<?php locate_template('/parts/deans-sidebar.php', true, false); ?>
	</div> 
<?php get_footer(); ?>