<main itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">	
	
	<?php if(!is_mobile()) {  ?>	
	<div class="row show-for-medium-up" id="field_image">
		<img src="<?php echo get_post_meta($post->ID, 'ecpt_image', true); ?>" alt="<?php the_title(); ?>" class="radius10">
	</div>
	<?php } ?>	
	<div class="row sidebar_bg radius10" id="landing">
		<div class="small-12 medium-8 columns wrapper radius-left offset-top-small">		
			<article class="content" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1 itemprop="headline"><?php the_title();?></h1>
						<?php if(!is_mobile()) {  ?>
							<p class="contact"> <!-- Contact info line -->
								<?php if ( get_post_meta($post->ID, 'ecpt_phonenumber', true) ) : ?>
									<span class="icon-phone"></span>  <?php echo get_post_meta($post->ID, 'ecpt_phonenumber', true); ?>
								<?php endif; ?>
								
								<?php if ( get_post_meta($post->ID, 'ecpt_emailaddress', true) ) : ?>
									<span class="icon-mail"></span> 
									<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
										<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true);?>
									</a>
									
								<?php endif; ?>
													
								<?php if ( get_post_meta($post->ID, 'ecpt_location', true) ) : ?>
									<span class="icon-location"></span>  <?php echo get_post_meta($post->ID, 'ecpt_location', true); ?>
								<?php endif; ?>
								<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
									<br><span class="icon-earth"></span> 
									<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')">
										<?php echo get_post_meta($post->ID, 'ecpt_homepage', true);?>
									</a>
									
								<?php endif; ?>
							</p> <!-- End Contact info line -->
						<?php } ?>	

						<?php if(is_mobile()) {  ?>
								<p class="contact"> <!-- Contact info line -->
									<?php if ( get_post_meta($post->ID, 'ecpt_phonenumber', true) ) : ?>
										<span class="icon-phone" aria-hidden="true"></span>  <?php echo get_post_meta($post->ID, 'ecpt_phonenumber', true); ?>
									<?php endif; ?>
									
									<?php if ( get_post_meta($post->ID, 'ecpt_emailaddress', true) ) : ?>
										<br><span class="icon-mail"></span> 
										<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
											<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true);?>
										</a>
										
									<?php endif; ?>
														
									<?php if ( get_post_meta($post->ID, 'ecpt_location', true) ) : ?>
										<br><span class="icon-location"></span> <?php echo get_post_meta($post->ID, 'ecpt_location', true); ?>
									<?php endif; ?>
									<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
										<br><span class="icon-earth"></span> 
										<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')">
											<?php echo get_post_meta($post->ID, 'ecpt_homepage', true);?>
										</a>
										
									<?php endif; ?>
								</p> <!-- End Contact info line -->
						<?php } ?>	
					
					<?php if ( get_post_meta($post->ID, 'ecpt_section1', true) ) :  echo get_post_meta($post->ID, 'ecpt_section1', true);  endif; ?>
					
					<?php if ( get_post_meta($post->ID, 'ecpt_section2content', true) ) :?>  
							<h3>What can you do with your degree?</h3>
						<?php echo get_post_meta($post->ID, 'ecpt_section2content', true);  endif; ?>
					
					<?php if ( get_post_meta($post->ID, 'ecpt_section3heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section3heading', true) ?></h3><?php elseif(get_post_meta($post->ID, 'ecpt_section3content', true)) : ?>
						<h3>Related Programs and Centers</h3>
					<?php endif; ?>
					<?php if ( get_post_meta($post->ID, 'ecpt_section3content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section3content', true);  endif; ?>
						
				<?php endwhile; endif; ?>	
			</article>
		</div>	
		
		<aside class="small-12 medium-4 columns" role="complementary" id="sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar"> 
		<!-- Begin Sidebar -->
			<a href="/admissions" class="button expand blue_bg cta">Apply Now!</a>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<div class="blue_bg offset-gutter sidebar_header">
						<h5 class="white">Explore <?php the_title();?></h5>
				</div>	

				<!--Begin Department Navigation Links -->
				<div class="row">
					<ul class="nav">
						<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
							<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')"><?php the_title(); ?> Website</a></li>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_facultypage', true) ) : ?>
							<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_facultypage', true); ?>">Faculty</a></li>
						<?php endif; ?>

						<?php if ( get_post_meta($post->ID, 'ecpt_undergraduatepage', true) ) : ?>
							<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_undergraduatepage', true); ?>">Undergraduate</a></li>
						<?php endif; ?>

						<?php if ( get_post_meta($post->ID, 'ecpt_graduatepage', true) ) : ?>
							<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_graduatepage', true); ?>">Graduate</a></li>
						<?php endif; ?>
					</ul>
				</div> <!--End Dept Nav Links -->
			<?php endwhile; endif; ?>	

			<?php if ( get_post_meta($post->ID, 'ecpt_title', true) && get_post_meta($post->ID, 'ecpt_content', true) ) : ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_title', true) ) : ?>
					<div class="blue_bg offset-gutter sidebar_header">
						<h5 class="white"><?php echo get_post_meta($post->ID, 'ecpt_title', true);?></h5>
					</div>	
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_content', true) ) : ?> 
					<div class="row">
						<div class="small-12 columns">
							<?php echo get_post_meta($post->ID, 'ecpt_content', true); ?>
						</div>		
					</div>
				<?php endif; ?>
			<?php endif; ?>		
			<!--Begin Jump to department -->

			<label for="jump">
				<div class="blue_bg offset-gutter sidebar_header">
					<h5 class="white">Other Undergraduate &  Full-Time Graduate Programs</h5>
				</div>
			</label>	
	        <select name="jump" id="jump" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
	         	<option>--<?php the_title(); ?></option>
				<?php if ( false === ( $jump_menu_undergrad_query = get_transient( 'jump_menu_undergrad_query' ) ) ) {
					// It wasn't there, so regenerate the data and save the transient
					$jump_menu_undergrad_query = new WP_Query(array(
							'post_type' => 'studyfields',
							'orderby' => 'title',
							'order' => 'ASC',
							'posts_per_page' => '-1',
							'tax_query' => array(
								array(
								    'taxonomy' => 'program_type',
								    'field' => 'slug',
								    'terms' => array('undergrad_program', 'full_time_program'),
								))
						));
						set_transient( 'jump_menu_undergrad_query', $jump_menu_undergrad_query, 2592000 ); } ?>
				<?php while ($jump_menu_undergrad_query->have_posts()) : $jump_menu_undergrad_query->the_post(); ?>				
					<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
				<?php endwhile; ?>
	        </select>
			
			<!--End jump-menu -->

			<a href="/academics/fields" class="button blue_bg cta">Explore All Our Fields of Study</a>
		</aside> <!-- End Sidebar -->

	</div> <!-- End #landing -->
</main>