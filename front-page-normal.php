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

	<div class="row" id="page">
		<div class="small-12 large-7 columns end offset-top hide-for-small" id="evergreen" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<?php while ($flagship_evergreen_query->have_posts()) : $flagship_evergreen_query->the_post(); ?>
				<!-- Set background image. Resolution varies based on size -- Desktop, Tablet, Mobile -->
					<style>
						body { background: #000 url('<?php echo get_post_meta($post->ID, 'ecpt_fullimage', true); ?>') no-repeat top center;
								background-attachment: scroll; }
						@media only screen and (max-width: 420px) { body { background: #000; } }
						#main_nav {margin-top: 15px;}
					</style>
					<a href="#" data-reveal-id="modal-caption" onclick="ga('send', 'event', 'Homepage Big Ideas', 'Click', '<?php the_title(); ?>')">
						<h1 class="text-shadow"><?php the_title(); ?>
							<?php the_content();?>
						</h1>
					</a>
					<div id="modal-caption" class="reveal-modal radius10" data-reveal aria-labelledby="modal-caption-<?php the_ID(); ?>" aria-hidden="true" role="dialog">
							<h4>About the Photo</h4>
							<p class="white" id="modal-caption-<?php the_ID(); ?>">
								<?php echo get_post_meta($post->ID, 'ecpt_caption_credit', true);  ?>
							</p>
						<a class="close-reveal-modal" aria-label="Close">&#215;</a>
					</div>
			<?php endwhile; ?>		
		</div>
	</div>

	<div class="row" id="field_search" role="form">
		<dl class="tabs contained" data-tab>
			<label for="field_search">
				<dd class="active black_bg">
					<h2><span class="show-for-medium-up">Fields of Study</span></h2>
					<h1 class="mobile-title">
						<span class="show-for-small-only">Explore our Fields of Study</span>
					</h1>
				</dd>
			</label>
		</dl>
		<div class="tabs-content contained">
			<li class="active">
				<form method="post" action="academics/fields">
				  	<div class="row hide-for-small">	
					<!-- Search Bar -->
						<div class="small-12 columns">
							<button class="submit" type="submit" aria-label="submit"/>
								<span class="fa fa-search"></span>
							</button>
					     	<input type="text" name="home_search" id="home_search" placeholder="Search our fields of study by program type, the department name, and major/minor availability" />
						     	<label for="home_search" class="screen-reader-text">
									Search our fields of study by program type, the department name, and major/minor availability
								</label>
						</div>
					</div>	
					<div class="row" id="filters">
						<ul class="small-9 medium-12 columns" id="homepage_buttons">
							<li class="button bright_blue_bg"><a href="academics/fields?filter=undergrad_program&ccAC=1" data-filter=".undergrad_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Department');">Undergraduate</a></li>
							<li class="button fushia"><a href="academics/fields?filter=full_time_program&ccAC=1" data-filter=".full_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Interdisciplinary');">Full-Time Graduate</a></li>
							<li class="button orange_bg"><a href="academics/fields?filter=part_time_program&ccAC=1" data-filter=".part_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Arts');">Part-Time Graduate</a></li>
							
							<li class="button green_bg"><a href="academics/departments-programs-and-centers" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Natural');">Departments</a></li>
							<li class="button aqua_bg"><a href="academics/majors-minors" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Social');">Majors & Minors</a></li>

							<!--<li class="button yellow_bg"><a href="http://pages.jh.edu/summer/" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Social');">Summer Programs <span class="fa fa-external-link-square"></span></a></li>-->
						</ul>
						
					</div>	    
				</form>
			</li>
		</div>
	</div>

	<div class="row black_bg radius10" id="news_feed" role="complementary">
		<div class="small-12 columns">
			<h2 class="hide-for-small-only white">Arts & Sciences News</h2>
			<h2 class="hide-for-medium-up black">Arts & Sciences News</h2>
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
						if ( $format == 'video' ) : locate_template('/parts/home-video.php', true, false); endif;
						if ( $format == 'standard' ) : locate_template('/parts/home-news.php', true, false); endif;
				?>
				<hr class="show-for-small-only">
				<?php endwhile; endif; ?>
		</div>
	</div>



<?php get_footer(); ?>