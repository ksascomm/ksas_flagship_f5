<?php
/*
Template Name: Front Page Normal
*/
?>
<?php get_header(); 
	//Set Evergreen Query Parameters
	$flagship_evergreen_query = new WP_Query(array(
		'post_type' => 'evergreen',
		'orderby' => 'rand',
		'post_status' => 'publish',
		'posts_per_page' => '1'));
?>		

<div class="row">
	<section class="small-12 large-7 columns end offset-top hide-for-small" id="evergreen" role="main">
		<?php while ($flagship_evergreen_query->have_posts()) : $flagship_evergreen_query->the_post(); ?>
			<!-- Set background image. Resolution varies based on size -- Desktop, Tablet, Mobile -->
				<style>
					body { background: #000 url('<?php echo get_post_meta($post->ID, 'ecpt_fullimage', true); ?>') no-repeat top center;
							background-attachment: scroll; }
					@media only screen and (max-width: 420px) { body { background: #000; } }
				</style>
				<a href="#" data-reveal-id="modal_<?php the_id(); ?>_caption">
					<h1 class="text-shadow"><?php the_title(); ?></h1>
					<span class="text-shadow"><?php the_content();?></span>
				</a>
				<div id="modal_<?php the_id(); ?>_caption" class="reveal-modal radius10" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
						<h4>About the Photo</h4>
						<p class="white"><?php $caption = get_post_meta($post->ID, 'ecpt_caption_credit', true); 
												echo apply_filters('the_content', $caption); ?></p>
					<a class="close-reveal-modal" aria-label="Close">&#215;</a>
				</div>
		<?php endwhile; ?>		
	</section>
</div>

<?php if (!is_handheld()) { ?>	
	<section class="row" id="field_search" role="form">
		<dl class="tabs contained" data-tab>
		  <dd class="active black_bg">Fields of Study</dd>
		</dl>
		<div class="tabs-content contained">
			<li class="active">
				<form method="post" action="academics/fields">
				  	<div class="row hide-for-small">	
					<!-- Search Bar -->
						<div class="small-12 columns">
							<label for="home_search">
								<input type="submit" class="icon-search" value="&#xe004;" />
						     	<input type="text" name="home_search" placeholder="Search fields of study by major, minor, interests, or name" />
						     </label>
						</div>
					</div>	
					<div class="row" id="filters">
						<ul class="inline-list hide-for-small-only">
							<li class="button bright_blue_bg"><a href="academics/fields" data-filter="*" onclick="ga('send', 'event', 'Fields', 'Homepage', 'All');">View All</a></li>
							<li class="button green_bg"><a href="academics/fields?filter=department" data-filter=".department" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Department');">Departments</a></li>
							<li class="button purple_bg"><a href="academics/fields?filter=interdisciplinary" data-filter=".interdisciplinary" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Interdisciplinary');">Interdisciplinary</a></li>
							<li class="button fushia"><a href="academics/fields?filter=arts" data-filter=".arts" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Arts');">The Arts</a></li>
							<li class="button yellow_bg"><a href="academics/fields?filter=humanities" data-filter=".humanities" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Humanities');">Humanities</a></li>
							<li class="button orange_bg"><a href="academics/fields?filter=natural" data-filter=".natural" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Natural');">Natural Sciences</a></li>
							<li class="button bright_blue_bg"><a href="academics/fields?filter=social" data-filter=".social" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Social');">Social Sciences</a></li>
						</ul>
						<div class="small-9 columns show-for-small-only">
							<div class="button bright_blue_bg"><a href="academics/fields" data-filter="*" onclick="ga('send', 'event', 'Fields', 'Homepage', 'All');">View All</a></div>
							<div class="button green_bg"><a href="academics/fields?filter=department" data-filter=".department" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Department');">Departments</a></div>
							<div class="button purple_bg"><a href="academics/fields?filter=interdisciplinary" data-filter=".interdisciplinary" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Interdisciplinary');">Interdisciplinary</a></div>
							<div class="button fushia"><a href="academics/fields?filter=arts" data-filter=".arts" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Arts');">The Arts</a></div>
							<div class="button yellow_bg"><a href="academics/fields?filter=humanities" data-filter=".humanities" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Humanities');">Humanities</a></div>
							<div class="button orange_bg"><a href="academics/fields?filter=natural" data-filter=".natural" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Natural');">Natural Sciences</a></div>
							<div class="button bright_blue_bg"><a href="academics/fields?filter=social" data-filter=".social" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Social');">Social Sciences</a></div>
						</div>
					</div>	    
				</form>
			</li>
		</div>
	</section>

	<section class="row black_bg radius10" id="news_feed" role="complementary">
	<?php
		//Query news and department extras for Homepage category
		$homepage_query = new WP_Query(array(
					'post_type' => array('deptextra', 'post'),
					'category_name' => 'homepage',
					'posts_per_page' => '3'				
					));
					 
		//If there are results
		if ( $homepage_query->have_posts() ) : while ( $homepage_query->have_posts() ) : $homepage_query->the_post();
		
		$format = get_post_format();  //Determine post format
		if ( false === $format ) {
			$format = 'standard'; }
			if ( $format == 'video' ) : locate_template('parts-home-video.php', true, false); endif;
			if ( $format == 'standard' ) : locate_template('parts-home-news.php', true, false); endif;
	?>
	<?php endwhile; endif; ?>
	</section>

<?php } ?>
<?php if (is_handheld()) { ?>
<div id="handheld">	
	<section class="row">
		<div class="small-12 columns">
			<h1>Explore Our Fields of Study</h1>
			<div class="button bright_blue_bg"><a href="academics/fields" data-filter="*" onclick="ga('send', 'event', 'Fields', 'Homepage', 'All');">View All</a></div>
			<div class="button green_bg"><a href="academics/fields?filter=department" data-filter=".department" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Department');">Departments</a></div>
			<div class="button purple_bg"><a href="academics/fields?filter=interdisciplinary" data-filter=".interdisciplinary" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Interdisciplinary');">Interdisciplinary</a></div>
			<div class="button fushia"><a href="academics/fields?filter=arts" data-filter=".arts" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Arts');">The Arts</a></div>
			<div class="button yellow_bg"><a href="academics/fields?filter=humanities" data-filter=".humanities" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Humanities');">Humanities</a></div>
			<div class="button orange_bg"><a href="academics/fields?filter=natural" data-filter=".natural" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Natural');">Natural Sciences</a></div>
			<div class="button bright_blue_bg"><a href="academics/fields?filter=social" data-filter=".social" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Social');">Social Sciences</a></div>
		</div>
	</section>
	<section class="row radius10" id="news_feed" role="complementary">
		<div class="small-12 columns">
			<h2>Latest News & Announcements</h2>
			<?php
				//Query news and department extras for Homepage category
				$homepage_query = new WP_Query(array(
							'post_type' => array('deptextra', 'post'),
							'category_name' => 'homepage',
							'posts_per_page' => '3'				
							));
							 
				//If there are results
				if ( $homepage_query->have_posts() ) : while ( $homepage_query->have_posts() ) : $homepage_query->the_post();
				
				$format = get_post_format();  //Determine post format
				if ( false === $format ) {
					$format = 'standard'; }
					if ( $format == 'video' ) : locate_template('parts-home-video-mobile.php', true, false); endif;
					if ( $format == 'standard' ) : locate_template('parts-home-news-mobile.php', true, false); endif;
			?>
			<?php endwhile; endif; ?>
		</div>
	</section>
</div>
<?php } ?>

<?php get_footer(); ?>