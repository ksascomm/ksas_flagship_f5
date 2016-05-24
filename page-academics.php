<?php get_header(); ?>
<main role="main">
	<div class="row wrapper radius10">
		<div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="small-12 medium-6 columns show-for-large-up">
					<?php the_post_thumbnail('full',array(
							'class'	=> "radius-topleft")); ?>
			</div>
			<div class="small-12 medium-6 columns">
					<h1><?php the_title();?></h1>
					<p><?php the_content(); ?></p>
			</div>
			<?php endwhile; endif; ?>	
		</div>	
		<div class="row">
			<div class="small-12 medium-6 columns">
				<div id="links">			
					<dl class="tabs contained" data-tab style="margin-left: 17px">
						<dd class="active bright_blue_bg semibold">Academic Resources</dd>
					</dl>

					<div class="tabs-content contained">
					<?php wp_nav_menu( array( 
							'theme_location' => '',
							'menu' => 'Academic Resources', 
							'menu_class' => 'panel', 
							'container' => 'li',
							'container_class' => 'active',
							'depth' => 1 )); ?> 
					</div>	
				</div>
			</div>
			<div class="small-12 medium-6 columns">
				<div class="panel callout radius10">
					<h3>Fields of Study</h3>
					<p class="no-margin">Here's what you'll be able to browse and search for:</p>
					<ul>
						<li><a href="/academics/fields/?filter=undergrad_program">Undergraduate Majors &amp; Minors</a></li>
						<li><a href="/academics/fields/?filter=full_time_program">Full-Time Graduate Programs</a></li>
						<li><a href="/academics/fields/?filter=part_time_program">Part-Time Graduate Programs</a></li>
						<li><a href="/academics/fields/?filter=interdisciplinary">Centers, Programs, &amp; Institutes</a></li>
					    <li><a href="http://advanced.jhu.edu/academics/online-programs/">Online Programs <i class="fa fa-external-link-square"></i></a></li>
					</ul>
				</div>	
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns tan_bg radius10">
				<div class="row">
					<h3 class="blue"><a href="<?php echo site_url('/news/archive/student-voices'); ?>">Student Voices</a></h3>
					<p>Hear what current students have to say about Johns Hopkins and their academic experience<</p>
				</div>
				
				<div class="row" id="video_scroll">
					<div class="medium-1 columns spacer"></div>
					<?php $student_voice_query = new WP_Query(array(
							'post_type' => array('deptextra', 'post'),
							'category_name' => 'voices',
							'orderby' => 'rand',
							'posts_per_page' => '6',
						));
	 
						if ( $student_voice_query->have_posts() ) : while ( $student_voice_query->have_posts() ) : $student_voice_query->the_post(); 

				 ?>
					<article class="small-5 medium-3 columns end rust_bg no-gutter voices">
						<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_video" onclick="ga('send', 'event', 'Video', 'Play', '<?php the_title(); ?>');">
							<div class="video_thumb small">
								<span class="icon-play"></span><?php the_post_thumbnail('full'); ?>
							</div>
							<?php if (has_term('','academicdepartment', $post->ID) == true) {
							$terms = get_the_terms( $post->ID, 'academicdepartment' );
								$dept_name_array = array();
								foreach ( $terms as $term ) {
								    $dept_name_array[] = $term->name;
								}
							?><h3><?php echo $dept_name_array[0]?></h3>
							<?php } else {
								$affiliations = get_the_terms( $post->ID, 'affiliation' );
									$affiliation_names = array();
									foreach ( $affiliations as $affiliation ) {
										$affiliation_names[] = $affiliation->name;
									}
								?>
									<h3><?php echo $affiliation_names[0]; ?></h3>
							<?php } ?>							
						</a>
					</article>
					<?php endwhile; endif; ?>
					<div class="medium-1 columns spacer"></div>
				</div>
			</div>
		</div>	
	</div>
</main>

<!-- ************Modal Video Boxes******************* -->
<?php if ( $student_voice_query->have_posts() ) : while ( $student_voice_query->have_posts() ) : $student_voice_query->the_post(); ?>
	<div id="modal_home_<?php the_id(); ?>_video" class="reveal-modal large black_bg" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="flex-video"></div>
		<a class="close-reveal-modal" aria-label="Close">&#215;</a>
	</div>
	<script>
		<?php 
		$vid_url = get_the_content();
		$embed_vid = "[embed]" . $vid_url . "[/embed]"; 
		$wp_embed = new WP_Embed();
		$post_embed = $wp_embed->run_shortcode($embed_vid); ?>
		var $d = jQuery.noConflict();
	        $d('a[data-reveal-id="modal_home_<?php the_id(); ?>_video"]').click( function(){
	            $d('<?php echo $post_embed; ?>').appendTo('#modal_home_<?php the_id();?>_video .flex-video');
	        });
	</script>
<?php endwhile; endif; ?>
<!-- ************End Modal Video Boxes******************* -->

<?php get_footer(); ?>