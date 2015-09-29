<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<style>
	#field_image { background: #000 url('<?php echo get_post_meta($post->ID, 'ecpt_image', true); ?>') no-repeat top center; }
</style>
<div class="row radius10 hide-for-small" id="field_image">
	<div class="small-4 small-offset-8 columns black_bg  radius-topright">
		<?php if ( get_post_meta($post->ID, 'ecpt_headline', true) ) : ?><h3 class="sky_blue"><?php echo get_post_meta($post->ID, 'ecpt_headline', true) ?></h3><?php endif;?>
		<?php if ( get_post_meta($post->ID, 'ecpt_subhead', true) ) : ?><p class="white"><?php echo get_post_meta($post->ID, 'ecpt_subhead', true) ?></p><?php endif;?>
	</div>
</div>

<div class="row sidebar_bg radius10" id="landing">
	<div class="small-12 medium-8 columns wrapper radius-left">		
		<section class="content" itemscope itemtype="http://schema.org/EducationalOrganization">
				<h2 itemprop="name"><?php the_title();?></h2>
				<span class="hide" itemprop="brand">Johns Hopkins University</span>
				<span class="hide" itemprop="brand">Krieger School of Arts & Sciences</span>
				<p class="contact"> <!-- Contact info line -->
					<?php if ( get_post_meta($post->ID, 'ecpt_phonenumber', true) ) : ?>
						<span class="icon-mobile" itemprop="telephone"><?php echo get_post_meta($post->ID, 'ecpt_phonenumber', true); ?></span> 
					<?php endif; ?>
					
					<?php if ( get_post_meta($post->ID, 'ecpt_emailaddress', true) ) : ?>
						<span class="icon-mail" itemprop="email">
						<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
							<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true);?>
						</a>
						</span>
					<?php endif; ?>
										
					<?php if ( get_post_meta($post->ID, 'ecpt_location', true) ) : ?>
						<span class="icon-location"><?php echo get_post_meta($post->ID, 'ecpt_location', true); ?></span> 
					<?php endif; ?>
					<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
						<br><span class="icon-globe" itemprop="url">
						<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')">
							<?php echo get_post_meta($post->ID, 'ecpt_homepage', true);?>
						</a>
						</span>
					<?php endif; ?>
				</p> <!-- End Contact info line -->
				
				<?php if ( get_post_meta($post->ID, 'ecpt_title', true) || get_post_meta($post->ID, 'ecpt_content', true) ) : ?>
					<div class="small-12 medium-6 columns floatleft" itemprop="owns">
				        <div class="callout-card skyblue radius">
							<?php if ( get_post_meta($post->ID, 'ecpt_title', true) ) : ?>
								 <div class="card-label">
						            <div class="label-text">&nbsp;</div>
						         </div>
							<?php endif; ?>
							 <div class="callout-card-content">
							 	<h5 class="black"><?php echo get_post_meta($post->ID, 'ecpt_title', true);?></h5>  
									<?php if ( get_post_meta($post->ID, 'ecpt_content', true) ) :  echo get_post_meta($post->ID, 'ecpt_content', true);  endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				
				<span itemprop="description"><?php if ( get_post_meta($post->ID, 'ecpt_section1', true) ) :  echo get_post_meta($post->ID, 'ecpt_section1', true);  endif; ?></span>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section2heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section2heading', true) ?></h3><?php else : ?>
					<h3>What can you do with your degree?</h3>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section2content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section2content', true);  endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section3heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section3heading', true) ?></h3><?php elseif(get_post_meta($post->ID, 'ecpt_section3content', true)) : ?>
					<h3>Related Programs and Centers</h3>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_section3content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section3content', true);  endif; ?>
				
		<?php endwhile; endif; ?>	
		</section>
	</div>	<!-- End main content (left) section -->
	
	<div class="small-12 medium-4 columns"> <!-- Begin Sidebar -->
	<!--Begin Jump to department -->
		<div class="row jumpmenu">
			<form name="jump" class="small-10 columns no-gutter">
				<h6>Jump to department</h6>
				<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
					<option>--<?php the_title(); ?></option>
					<?php if ( false === ( $jump_menu_query = get_transient( 'jump_menu_query' ) ) ) {
						// It wasn't there, so regenerate the data and save the transient
						$jump_menu_query = new WP_Query(array(
								'post_type' => 'studyfields',
								'orderby' => 'title',
								'order' => 'ASC',
								'posts_per_page' => '-1',
								'meta_query' => array(
									array(
									    'key' => 'ecpt_structure',
									    'value' => 'department',
									    'compare' => 'IN'
									))
							));
							set_transient( 'jump_menu_query', $jump_menu_query, 2592000 ); } ?>
					<?php while ($jump_menu_query->have_posts()) : $jump_menu_query->the_post(); ?>				
						<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
					<?php endwhile; ?>
				</select>
			</form>
		</div><!--End jump-menu -->
		
		<!--Begin Department Navigation Links -->
		<div class="row">
			<ul class="nav">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
					<li><span class="icon-arrow-right-2"></span><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')">Department Website</a></li>
				<?php endif; ?>

				<?php if ( get_post_meta($post->ID, 'ecpt_facultypage', true) ) : ?>
					<li><span class="icon-arrow-right-2"></span><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_facultypage', true); ?>">Faculty</a></li>
				<?php endif; ?>

				<?php if ( get_post_meta($post->ID, 'ecpt_undergraduatepage', true) ) : ?>
					<li><span class="icon-arrow-right-2"></span><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_undergraduatepage', true); ?>">Undergraduate</a></li>
				<?php endif; ?>

				<?php if ( get_post_meta($post->ID, 'ecpt_graduatepage', true) ) : ?>
					<li><span class="icon-arrow-right-2"></span><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_graduatepage', true); ?>">Graduate</a></li>
				<?php endif; ?>
				<?php //Get the academic department slug 
					$academicdepartments = get_the_terms( $post->ID, 'academicdepartment' );
						$academicdepartment_names = array();
							foreach ( $academicdepartments as $academicdepartment ) {
								$academicdepartment_names[] = $academicdepartment->slug;
							}
					$academicdepartment_name = $academicdepartment_names[0];
				 ?>

			<?php endwhile; endif; ?>	
			</ul>
		</div> <!--End Dept Nav Links -->
		
		<?php
			//Query department extras for that slug
			$dept_extra_query = new WP_Query(array(
						'post_type' => array('deptextra', 'post'),
						'orderby' => 'rand',
						'posts_per_page' => '1',
						'academicdepartment' => $academicdepartment_name
						));
						 
			//If there are results
			if ( $dept_extra_query->have_posts() ) : while ( $dept_extra_query->have_posts() ) : $dept_extra_query->the_post();
			
			$format = get_post_format();  //Determine post format
			if ( false === $format ) { $format = 'standard'; }
				if ( $format == 'video' ) : locate_template('parts-extras-video.php', true, false); endif;
				if ( $format == 'quote' ) : locate_template('parts-extras-quote.php', true, false); endif;
				if ( $format == 'standard' ) : locate_template('parts-extras-news.php', true, false); endif;
		?>
<?php endwhile; else : ?>
		</div> 
	</div> <!-- End Sidebar -->
</div> <!-- End #landing -->
<?php endif; ?>