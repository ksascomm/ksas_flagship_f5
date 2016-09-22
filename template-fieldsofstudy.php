<?php
/*
Template Name: Fields of Study
*/
?>
<?php get_header(); 
	//Set Fields of Study Query Parameters
	if ( false === ( $flagship_studyfields_query = get_transient( 'flagship_studyfields_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_studyfields_query = new WP_Query(array(
					'post_type' => 'studyfields',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => '-1'));
					set_transient( 'flagship_studyfields_query', $flagship_studyfields_query, 2592000 ); } ?>

		
<div class="row wrapper radius10">
	<div class="small-12 columns">
		<section class="row">
		
			<div class="small-12 large-9 columns copy">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				<p><?php the_content(); ?></p>
			<?php endwhile; endif; ?>
			</div>
			<div class="small-12 columns" id="fields_search" role="search">
				<form action="#">
					<fieldset class="radius10">

						<div class="row filter option-set" data-filter-group="program_type">
							<h5>Choose program type:</h5>
							<div class="button blue_bg"><a href="#" data-filter="" class="selected">View all</a></div>
							<div class="button bright_blue_bg"><a href="#" data-filter=".undergrad_program" onclick="ga('send', 'event', 'Fields', 'Filter', 'Undergrad');">Undergraduate</a></div>
							<div class="button fushia"><a href="#" data-filter=".full_time_program" onclick="ga('send', 'event', 'Fields', 'Filter', 'Graduate');">Graduate (full-time)</a></div>
							<div class="button orange_bg"><a href="#" data-filter=".part_time_program" onclick="ga('send', 'event', 'Fields', 'Filter', 'AAP');">Graduate (part-time)</a></div>
						</div>
						<div class="row">
							<label for="id_search">
								<h5>Search by keyword:</h5>
							</label>		
							<button class="submit" type="submit" aria-label="submit"/>
								<span class="fa fa-search"></span>
							</button>
							<input type="text" name="search" value="<?php if (isset($_POST['home_search'])) { echo($_POST['home_search']); } ?>" id="id_search" aria-label="Search Fields of Study" placeholder="Enter major/minor, area of study, or description keyword"  /> 
								<label for="id_search" class="screen-reader-text">
									Search Fields of Study
								</label>
						</div>
						
						<!--<div class="row hide-for-mobile">
							<h5>Filter fields of study:</h5>
						</div>

						<div class="row filter hide-for-mobile option-set" data-filter-group="structure">
							<div class="button bright_blue_bg"><a href="#" data-filter="" class="selected">View All</a></div>
							<div class="button green_bg"><a href="#" data-filter=".department" onclick="ga('send', 'event', 'Fields', 'Filter', 'Department');">Departments</a></div>
							<div class="button purple_bg"><a href="#" data-filter=".interdisciplinary" onclick="ga('send', 'event', 'Fields', 'Filter', 'Interdisciplinary');">Interdisciplinary</a></div>
							<div class="button fushia"><a href="#" data-filter=".arts" onclick="ga('send', 'event', 'Fields', 'Filter', 'Arts');">The Arts</a></div>
							<div class="button yellow_bg"><a href="#" data-filter=".humanities" onclick="ga('send', 'event', 'Fields', 'Filter', 'Humanities');">Humanities</a></div>
							<div class="button orange_bg"><a href="#" data-filter=".natural" onclick="ga('send', 'event', 'Fields', 'Filter', 'Natural');">Natural Sciences</a></div>
							<div class="button bright_blue_bg"><a href="#" data-filter=".social" onclick="ga('send', 'event', 'Fields', 'Filter', 'Social');">Social Sciences</a></div>
						</div> -->
						
					</fieldset>
				</form>	
			</div>
		</section>
	<section class="row" id="fields_container" role="main">
		<?php while ($flagship_studyfields_query->have_posts()) : $flagship_studyfields_query->the_post(); 
			//Pull discipline array (humanities, natural, social)
			if(get_post_meta($post->ID, 'ecpt_discipline', true)) {
				$discipline_array = get_post_meta($post->ID, 'ecpt_discipline', true);
				$discipline = array_values($discipline_array);
			}
			$program_types = get_the_terms( $post->ID, 'program_type' );
				if ( $program_types && ! is_wp_error( $program_types ) ) : 
					$program_type_names = array();
						foreach ( $program_types as $program_type ) {
							$program_type_names[] = $program_type->slug;
						}
					$program_type_name = join( " ", $program_type_names );
				endif;
		?>
		<?php if(is_mobile()) {  ?>	
			<!-- Set mobile classes for isotype.js filter buttons -->
			<div class="medium-6 large-4 columns mobile-field <?php echo $discipline[0] . ' '; if ( isset($discipline[1] )) { echo $discipline[1] . ' ';  } if ( isset($discipline[2] )) { echo $discipline[2] . ' ';  } echo get_post_meta($post->ID, 'ecpt_structure', true);?> <?php echo $program_type_name; ?>">
				<a href="<?php the_permalink();?>" title="<?php the_title(); ?>" class="field">
					<ul class="field">
					<!-- Display ribbons for discipline taxonomy -->
						<li class="blue"><?php the_title(); ?>
						<span class="hide"><?php echo get_post_meta($post->ID, 'ecpt_keywords', true); ?></span>
						</li>
					</ul>
				</a>
			</div>
		<?php } else { ?>
			<!-- Set desktop classes for isotype.js filter buttons -->
			<div class="medium-6 large-4 columns  mobile-field <?php echo $discipline[0] . ' '; if ( isset($discipline[1] )) { echo $discipline[1] . ' ';  } if ( isset($discipline[2] )) { echo $discipline[2] . ' ';  } echo get_post_meta($post->ID, 'ecpt_structure', true);?> <?php echo $program_type_name; ?>">
			
								
					<div class="small-12 columns field <?php echo $program_type_name; ?>">
					
					<!-- Display ribbons for discipline taxonomy -->
					<div class="row">	
						<div class="small-12 columns disciplines">
						</div>
					</div>
					
						
						<h3><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>"><?php the_title(); ?></a></h3>
						<div class="row">
							<div class="small-12 columns">
								<p class="contact">
									<?php echo get_post_meta($post->ID, 'ecpt_phonenumber', true); ?>
									<span class="floatright">
										<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
											<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>
										</a>
									</span>
								</p>
								<ul class="fields-of-study">
									<?php if (get_post_meta($post->ID, 'ecpt_majors', true)) : ?>
										<li><strong>Majors:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_majors', true); ?>
										</li>
									<?php endif; ?>
									<?php if (get_post_meta($post->ID, 'ecpt_minors', true)) : ?>
										<li><strong>Minors:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_minors', true); ?></li>
									<?php endif; ?>
									<?php if (get_post_meta($post->ID, 'ecpt_degreesoffered', true)) : ?>
										<li><strong>Degrees Offered:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_degreesoffered', true); ?></li>
									<?php endif; ?>
									<?php if (get_post_meta($post->ID, 'ecpt_pcitext', true)) : ?>
										<p><?php echo get_post_meta($post->ID, 'ecpt_pcitext', true); ?></p>
									<?php endif; ?>
								</lu>
							</div>	
						</div>
						<span class="hide"><?php echo get_post_meta($post->ID, 'ecpt_keywords', true); ?></span>
					</div>
				</a>
			</div>
		<?php } ?>	
		<?php endwhile; ?>
		
		<div class="row" id="noresults">
			<div class="small-4 columns centered">
				<h3> No matching results</h3>
			</div>
		</div>
	</section>
	</div>
</div> <!-- End content wrapper -->
<?php get_footer(); ?>