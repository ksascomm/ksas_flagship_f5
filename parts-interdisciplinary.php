<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<style>
	#field_image { background: #000 url('<?php echo get_post_meta($post->ID, 'ecpt_image', true); ?>') no-repeat top center; }
</style>
<div class="row radius10" id="field_image"></div>

<div class="row sidebar_bg radius10" id="landing">
	<div class="small-12 medium-8 columns wrapper radius-left offset-top-small">		
		<section>
				<h2><?php the_title();?></h2>
				<p class="contact"> <!-- Contact info line -->
					<?php if ( get_post_meta($post->ID, 'ecpt_phonenumber', true) ) : ?>
						<span class="icon-mobile"><?php echo get_post_meta($post->ID, 'ecpt_phonenumber', true); ?></span> 
					<?php endif; ?>
					
					<?php if ( get_post_meta($post->ID, 'ecpt_emailaddress', true) ) : ?>
						<span class="icon-mail">
						<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
							<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true);?>
						</a>
						</span>
					<?php endif; ?>
										
					<?php if ( get_post_meta($post->ID, 'ecpt_location', true) ) : ?>
						<span class="icon-location"><?php echo get_post_meta($post->ID, 'ecpt_location', true); ?></span> 
					<?php endif; ?>
					<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
						<br><span class="icon-globe">
						<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')">
							<?php echo get_post_meta($post->ID, 'ecpt_homepage', true);?>
						</a>
						</span>
					<?php endif; ?>
				</p> <!-- End Contact info line -->
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section1', true) ) :  echo get_post_meta($post->ID, 'ecpt_section1', true);  endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section2heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section2heading', true) ?></h3><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section2content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section2content', true);  endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section3heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section3heading', true) ?></h3><?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_section3content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section3content', true);  endif; ?>
				
		<?php endwhile; endif; ?>	
		</section>
	</div>	
	
	<div class="small-12 medium-4 columns" id="sidebar"> <!-- Begin Sidebar -->
			<a href="/admissions" class="button expand blue_bg cta">Apply Now!</a>
		
		<!--Begin Department Navigation Links -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="blue_bg offset-gutter" id="sidebar_header">
				<h5>Explore <?php the_title();?></h5>
		</div>	
		
		<div class="row">
			<ul class="nav">
				<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
					<li><span class="icon-arrow-right-2"></span><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')">Department Website</a></li>
				<?php endif; ?>
				<?php //Get the affiliation slug 
					$affiliations = get_the_terms( $post->ID, 'affiliation' );
						$affiliation_names = array();
							foreach ( $affiliations as $affiliation ) {
								$affiliation_names[] = $affiliation->slug;
							}
					$affiliation_name = $affiliation_names[0];
				 ?>
			<?php endwhile; endif; ?>	
			</ul>
		</div> <!--End Dept Nav Links -->

		<div class="blue_bg offset-gutter" id="sidebar_header">
			<h5><?php echo get_post_meta($post->ID, 'ecpt_title', true);?></h5>
		</div>	
		<div class="row">
			<div class="small-12 columns">
				<?php if ( get_post_meta($post->ID, 'ecpt_content', true) ) :  echo get_post_meta($post->ID, 'ecpt_content', true);  endif; ?>
			</div>		
		</div>

		<!--Begin Jump to department -->
		<div class="blue_bg offset-gutter" id="sidebar_header">
			<h5>Explore Other Programs</h5>
		</div>	

		
		<div class="row jumpmenu">
			<form name="jump" class="small-10 columns no-gutter">
				<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
					<option>--<?php the_title(); ?></option>
					<?php if ( false === ( $jump_menu_pci_query = get_transient( 'jump_menu_pci_query' ) ) ) {
						// It wasn't there, so regenerate the data and save the transient
						$jump_menu_pci_query = new WP_Query(array(
								'post_type' => 'studyfields',
								'orderby' => 'title',
								'order' => 'ASC',
								'posts_per_page' => '-1',
								'meta_query' => array(
									array(
									    'key' => 'ecpt_structure',
									    'value' => 'interdisciplinary',
									    'compare' => 'IN'
									))
							));
							set_transient( 'jump_menu_pci_query', $jump_menu_pci_query, 2592000 ); } ?>
					<?php while ($jump_menu_pci_query->have_posts()) : $jump_menu_pci_query->the_post(); ?>				
						<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
					<?php endwhile; ?>
				</select>
			</form>
		</div><!--End jump-menu -->
		
		<a href="/academics/fields" class="button blue_bg cta">Explore All Our Fields of Study</a>


		<?php
			
			//Query department extras for that slug
			$dept_extra_query = new WP_Query(array(
						'post_type' => 'deptextra',
						'orderby' => 'rand',
						'posts_per_page' => '1',
						'affiliation' => $affiliation_name
						));
						 
			//If there are results
			if ( $dept_extra_query->have_posts() ) : while ( $dept_extra_query->have_posts() ) : $dept_extra_query->the_post();
			
			$format = get_post_format();  //Determine post format
				if ( $format == 'video' ) : locate_template('parts-extras-video.php', true, false); endif;
				if ( $format == 'quote' ) : locate_template('parts-extras-quote.php', true, false); endif;
				if ( $format == 'standard' ) : locate_template('parts-extras-news.php', true, false); endif;
		?>
		<?php endwhile; else : ?>
		</div> 
</div> <!-- End #landing -->
<?php endif; ?>