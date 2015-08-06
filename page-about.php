<?php get_header(); ?>

<div class="row wrapper radius10" role="main">
			<div class="small-12 medium-6 columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2><?php the_title();?></h2>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
			</div>
			<div class="small-12 medium-6 columns">	
				<ul id="slider" data-orbit data-options="animation_speed:2000; timer:true; slide_number: false; timer_speed:3000; navigation_arrows:false; bullets:false;" class="no-gutter photo-page-right">
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
					<div class="number">
							<?php the_post_thumbnail('full',array( 'class'	=> "radius-topright")); ?>
							<summary class="<?php echo get_post_meta($post->ID, 'bg_color', true); ?>">
								<h3 class="no-margin white bold" align="center"><?php the_title(); ?></h3>
								<h5 class="white bold no-margin" align="center"><?php echo get_the_content(); ?></h5>
							</summary>
					</div> <!-- End number -->
			<?php endwhile; endif; ?>
				</div> <!-- End slider -->
		</div>		
</div> <!-- End Wrapper -->
<?php get_footer(); ?>