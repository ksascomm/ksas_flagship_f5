<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="opp">
	<main class="small-12 large-8 columns wrapper radius-left offset-topgutter">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title();?></h1>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>	

	
			<h2>
				<a href="<?php echo site_url('/news-events/archive/student-voices/'); ?>">Student Voices</a>
			</h2>
			<p>Hear what current students have to say about Johns Hopkins and their academic experience</p>

		
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
			<article class="small-12 medium-4 medium-offset-1 columns end rust_bg no-gutter voices">
				<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_video" onclick="ga('send', 'event', 'Video', 'Play', '<?php the_title(); ?>');">
					<div class="video_thumb small">
						<span class="icon-play4" aria-hidden="true"></span><?php the_post_thumbnail('full'); ?>
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


	</main>
	<?php locate_template('parts/sidebar.php', true, false); ?>

</div>
<!-- ************Modal Video Boxes******************* -->
<?php if ( $student_voice_query->have_posts() ) : while ( $student_voice_query->have_posts() ) : $student_voice_query->the_post(); ?>
	<div id="modal_home_<?php the_id(); ?>_video" class="reveal-modal large black_bg" data-reveal aria-hidden="true" role="dialog">
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