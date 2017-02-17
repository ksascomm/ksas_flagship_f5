<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<main class="small-12 large-8 columns wrapper radius-left offset-topgutter" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog" id="page">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">	
				<h1 itemprop="headline"><?php the_title();?></h1>
				<div itemprop="text"><?php the_content(); ?></div>
			</article>
			<?php endwhile; endif; ?>
			<div class="small-12 medium-10 columns no-lazy">	
				<ul id="slider" data-orbit data-options="animation_speed:2000; timer:true; slide_number: false; timer_speed:3000; navigation_arrows:false; bullets:false;" class="no-gutter photo-page-right no-lazy">
					<?php if ( false === ( $by_the_numbers_query = get_transient( 'by_the_numbers_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$by_the_numbers_query = new WP_Query(array(
							'post_type' => 'post',
							'category_name' => 'numbers',
							'orderby' => 'rand',
							'posts_per_page' => '-1'
							)); 
					set_transient( 'by_the_numbers_query', $by_the_numbers_query, 2592000 ); }
						if ( $by_the_numbers_query->have_posts() ) : while ( $by_the_numbers_query->have_posts() ) : $by_the_numbers_query->the_post(); ?>
					<div class="number no-lazy">
							<?php the_post_thumbnail('full',array( 'class'	=> "radius-topright no-lazy")); ?>
							<summary class="<?php echo get_post_meta($post->ID, 'bg_color', true); ?> no-lazy">
								<h3 class="no-margin white bold"><?php the_title(); ?></h3>
								<h5 class="white bold no-margin"><?php echo get_the_content(); ?></h5>
							</summary>
					</div> <!-- End number -->
			<?php endwhile; endif; ?>
				</ul> <!-- End slider -->
			</div>				
	</main>
	<?php locate_template('parts/sidebar.php', true, false); ?>
</div> <!-- End Wrapper -->
<?php get_footer(); ?>