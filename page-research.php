<?php get_header(); ?>

<div class="row wrapper radius10" id="page">	
	<main class="small-12 medium-6 columns" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">	
				<h1 itemprop="headline"><?php the_title();?></h1>
				<p itemprop="text"><?php the_content(); ?></p>
			</article>
		<?php endwhile; endif; ?>
	</main>
	
	<aside itemscope="itemscope" itemtype="http://schema.org/WPSideBar"> 
		<div class="small-12 medium-6 columns no-gutter" role="marquee">
			<ul id="slider" data-orbit data-options="animation: slide, animation_speed:1000; timer:true; slide_number: false, timer_speed:3000; pause_on_hover:true; navigation_arrows:false; bullets:false; slide_number:false;" class="no-gutter photo-page-right">
		    	<?php 
		    	 // Query most recent portfolio items
			$args = array(
				'post_type' => array('deptextra', 'post'),
				'category_name' => 'research',
				'orderby' => 'rand',
				'posts_per_page' => '5'
			);
			$portfolio_query = new WP_Query( $args );

			// Start the loop 
	            if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); 
	            $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
			    	<li data-orbit-slide="<?php the_ID(); ?>">
			    		<div class="slide">
							<a href="<?php the_permalink(); ?>">
							<img src="<?php echo $full_image_url[0]; ?>" class="radius-topright" / alt="<?php the_title(); ?>">
							<summary>
								<h3 class="no-margin white"><?php the_title(); ?></h3>
								<h5 class="white italic no-margin"><?php echo get_the_content(); ?><span class="icon-arrow-right14" aria-hidden="true"></span></h5>
							</summary>
						</a>
			    		</div>
			    	</li>
			    <?php endwhile;
			    	wp_reset_postdata();
			    endif; ?>
			</ul>
		</div><!-- .small-12 .medium-6 .columns -->
		<div class="small-12 medium-6 columns no-gutter" role="complementary">
			<div class="orbit-thumbnails">
				<ul class="inline-list">
					<?php

					// Start the loop again
					if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
				$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'bullet'); ?>
						
						<li class="thumb">
							<a data-orbit-link="<?php the_ID(); ?>">
								<img src="<?php echo $full_image_url[0]; ?>" alt="<?php the_title(); ?>" />
							</a>
						</li><!-- .img-home .small-12 .columns -->
					<?php endwhile;
						wp_reset_postdata();
					endif; ?>
					</ul>
			</div><!-- .orbit thumbs -->
		</div>
	</aside>

</div> <!-- End Wrapper -->


<?php get_footer(); ?>