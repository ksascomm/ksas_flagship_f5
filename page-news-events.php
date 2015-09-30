<?php get_header(); ?>
<div class="row wrapper radius10 no-padding">
<div class="small-12 columns">
	<div class="row">
		
		<!-- ************START NEWS & FEATURED VIDEO SECTION************* -->
		<div class="small-12 large-4 columns" id="news_section">
			<!-- ************START NEWS -->
			<div class="banner blue_bg offset-gutter radius-topleft" style="margin-top: -3px"><h3><a href="/news-events/articles" class="dark_blue_bg radius-topleft">Arts &amp; Sciences News</a></h3></div>
					<?php 
						if ( false === ( $flagship_news_query = get_transient( 'flagship_news_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_news_query = new WP_Query(array(
							'category_name' => 'news',
							'tax_query' => array(
								array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array('post-format-video', 'post-format-image'),
								'operator' => 'NOT IN')),
							'posts_per_page' => '4')); 
					set_transient( 'flagship_news_query', $flagship_news_query, 2592000 ); }
					 ?>
		
						<?php while ($flagship_news_query->have_posts()) : $flagship_news_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>">
								<article>
									<?php the_post_thumbnail('rss'); ?>
									<h4><?php the_title(); ?></h4>
									<summary><?php the_excerpt(); ?></summary>
								</article>
							</a>
						<?php endwhile; ?>
						
			<!-- ************END NEWS -- START FEATURED VIDEO -->
			<div class="banner blue_bg offset-gutter"><h3><a class="dark_blue_bg" href="/news-events/videos">Featured Video</a></h3></div>
					<?php 
						if ( false === ( $flagship_video_query = get_transient( 'flagship_video_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_video_query = new WP_Query(array(
							'category_name' => 'news',
							'tax_query' => array(
								array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => 'post-format-video',
								'operator' => 'IN' )),
							'posts_per_page' => '1')); 
					set_transient( 'flagship_video_query', $flagship_video_query, 2592000 ); }
					 ?>
		
						<?php while ($flagship_video_query->have_posts()) : $flagship_video_query->the_post(); ?>
							
							<article id="video_section">
								<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_video">
									<div class="video_thumb full">
									<span class="icon-play"></span><?php the_post_thumbnail('full'); ?>
									</div>
									<div class="row">
										<div class="small-12 medium-11 columns centered">
											<h4><?php the_title(); ?></h4>
											<summary><?php the_excerpt(); ?></summary>
										</div>
									</div>
								</a>
							</article>					
						<?php endwhile; ?>

			</div>
		<!-- ************END NEWS & FEATURED VIDEO SECTION************* -->
		
		<div class="small-12 large-8 columns">
			
			<!-- ************FEATURED PHOTO SECTION************* -->
			<div class="row">
				<div class="small-12 columns no-gutter radius-topright" id="photo_section">
				<?php 
					if ( false === ( $flagship_photo_query = get_transient( 'flagship_photo_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_photo_query = new WP_Query(array(
							'category_name' => 'news',
							'tax_query' => array(
								array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => 'post-format-image',
								'operator' => 'IN' )),
							'posts_per_page' => '1')); 
					set_transient( 'flagship_photo_query', $flagship_photo_query, 2592000 ); }
					 ?>
		
						<?php while ($flagship_photo_query->have_posts()) : $flagship_photo_query->the_post(); ?>
								<article>
									<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_image" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog"
><?php the_post_thumbnail('full',array( 'class'	=> "radius-topright")); ?></a>
									<div class="row">
										<div class="small-12 medium-11 columns centered">
											<h4>This Week Around Campus</h4>
											<a href="/news-events/photos"><div class="button radius10 grey_bg no-margin">View More</div></a>
											<?php the_content(); ?>
										</div>
									</div>
								</article>
						
						<?php endwhile; ?>
				</div>
			</div>
			<!-- ************END FEATURED PHOTO SECTION************* -->
			
			<div class="row">
			<!-- ************CALENDAR SECTION************* -->
				<div class="small-12 medium-6 columns" id="calendar_section">
					<div class="banner blue_bg offset-gutter">
						<h3>
							<a class="dark_blue_bg" href="/news-events/events">Today's Events</a>
						</h3>
					</div>
					<div class="button bright_blue_bg">
						<a href="/news-events/events">View Full Calendar</a>
					</div>
					<div id="calendar_container"></div>
						<!-- Uncomment when ready for filter calendars
							<h6>View full calendars</h6>
							<div class="button yellow_bg small"><a href="/news/events/cal_humanities">Humanities</a></div>
							<div class="button orange_bg"><a href="/news/events/cal_sciences">Sciences</a></div>
							<div class="button bright_blue_bg"><a href="/news/events/cal_interdisciplinary">Interdisciplinary</a></div>
						-->
					<div class="banner blue_bg offset-gutter">
						<h3>
							<a class="dark_blue_bg" href="/news-events/archive/student-voices/">Student Voices</a>
						</h3>
					</div>
						<?php // Get RSS Feed(s)
						include_once(ABSPATH . WPINC . '/feed.php'); 
						locate_template('parts-student-feeds.php', true, false); ?>	
				</div>
			<!-- ************END CALENDAR SECTION************* -->	
			
			<!-- ************DEPARTMENT & HUB SECTION************* -->
				<div class="small-12 medium-6 columns" id="aggregate_section">
					<div class="banner blue_bg offset-gutter"><h3><a class="dark_blue_bg" href="http://hub.jhu.edu/divisions/school-arts-and-sciences">From the Hub</a></h3></div>
						<?php
						$hub_url = 'http://api.hub.jhu.edu/articles?v=0&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&return_format=json&divisions=426&per_page=3';
						if ( false === ( $hub_call = get_transient( 'flagship_hub_query' ) ) ) {							
							$hub_call = wp_remote_get($hub_url);
						set_transient( 'flagship_hub_query', $hub_call, 86400 ); }
						$hub_results = json_decode($hub_call['body'], true);
						$hub_articles = $hub_results['_embedded'];						
						foreach($hub_articles['articles'] as $hub_article) { ?>
							<a href="<?php echo $hub_article['url']; ?>">
								<article>
									<img src="<?php echo $hub_article['_embedded']['image_thumbnail'][0]['sizes']['impact_small']; ?>" />
									<h4><?php echo $hub_article['headline']; ?></h4>
									<p><?php echo $hub_article['subheadline']; 
											 if (empty($hub_article['subheadline'])) { 
												 echo $hub_article['excerpt'];
											} ?>
									</p>
								</article>	
							</a>
						<?php } ?>					
				</div>
			<!-- ************END DEPARTMENT & HUB SECTION************* -->
			</div>
		</div>	
	
	</div>
</div>
</div> <!-- End wrapper -->

<!-- ************VIDEO MODAL************* -->
<?php if ( $flagship_video_query->have_posts() ) : while ( $flagship_video_query->have_posts() ) : $flagship_video_query->the_post(); ?>
<div id="modal_home_<?php the_id(); ?>_video" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" class="reveal-modal large black_bg">
	<div class="flex-video">
		<?php the_content(); ?>
	</div>
	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
<script>
	<?php //Load Video iframe only if the thumbnail is clicked
		$vid_url = get_the_content();
		$embed_vid = "[embed]" . $vid_url . "[/embed]"; 
		$wp_embed = new WP_Embed();
		$post_embed = $wp_embed->run_shortcode($embed_vid); ?>
		
	var $d = jQuery.noConflict();
        $d('a[data-reveal-id="modal_home_<?php the_id(); ?>_video" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog"]').click( function(){
            $d('<?php echo $post_embed; ?>').appendTo('#modal_home_<?php the_id();?>_video .flex-video');
        });
</script>
<?php endwhile; endif; ?>

<!-- ************IMAGE MODAL************* -->
<?php if ( $flagship_photo_query->have_posts() ) : while ( $flagship_photo_query->have_posts() ) : $flagship_photo_query->the_post(); ?>
<div id="modal_home_<?php the_id(); ?>_image" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" class="reveal-modal large black_bg">
		<?php the_post_thumbnail('full'); ?>
		<h4>This Week Around Campus</h4>
		<?php the_content(); ?>
	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>