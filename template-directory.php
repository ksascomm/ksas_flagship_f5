<?php
/*
Template Name: Dean's Directory
*/
?>
<?php get_header(); 
	//Set Fields of Study Query Parameters
	if ( false === ( $flagship_leadership_query = get_transient( 'flagship_leadership_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_leadership_query = new WP_Query(array(
					'post_type' => 'people',
					'role' => 'leadership',
					'meta_key' => 'ecpt_people_alpha',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'posts_per_page' => '-1'));
					set_transient( 'flagship_leadership_query', $flagship_leadership_query, 2592000 ); }
		
	if ( false === ( $flagship_dean_staff_query = get_transient( 'flagship_dean_staff_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_dean_staff_query = new WP_Query(array(
					'post_type' => 'people',
					'role' => 'staff',
					'meta_key' => 'ecpt_people_alpha',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'posts_per_page' => '-1'));
					set_transient( 'flagship_dean_staff_query', $flagship_dean_staff_query, 2592000 ); }		 ?>

<div class="row wrapper radius10" role="main" id="page">	
		<div class="small-12 large-7 columns copy">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title();?></h1>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
		</div>
		
		<div class="small-12 large-5 columns" id="fields_search">
			<form action="#">
				<fieldset class="radius10">
					<div class="row">
						<h2>Search the dean's directory:</h2>
					</div>
					
					<div class="row">		
						<button class="submit" type="submit" aria-label="submit"/>
							<span class="fa fa-search"></span>
						</button>
						<input type="text" name="search" id="id_search"  /> 
							<label for="id_search" class="screen-reader-text">
								Search the dean's directory
							</label>
					</div>
					
				</fieldset>
			</form>	
		</div>

	
	<div class="row" id="fields_container">
		<ul class="large-12 columns" id="directory">
		<?php while ($flagship_leadership_query->have_posts()) : $flagship_leadership_query->the_post(); ?>
				<li class="person">
					<div class="row">
						<div class="small-12 columns">
						
							<?php if ( has_post_thumbnail()) { ?> 
								<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small')); ?></a>
							<?php } ?>			    
							<h4 class="no-margin">
								<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h4>
							<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
								<h5 class="no-margin"><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h5>
							<?php endif; ?>
						</a>
						<p class="contact black">
							<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?><span class="icon-phone"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?><span class="icon-printer"></span><?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?><span class="icon-mail"></span> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?><span class="icon-location"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?><?php endif; ?>
						</p>
						</div>	
					</div>
				</li>		
		<?php endwhile; ?>
		
		
		<?php while ($flagship_dean_staff_query->have_posts()) : $flagship_dean_staff_query->the_post(); ?>
				<li class="person">
					<div class="row">
						<div class="small-12 columns">
						<h4 class="no-margin"><?php the_title(); ?></h4>
						<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
								<h5 class="no-margin"><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h5>
						<?php endif; ?>
						<p class="contact">
							<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?><span class="icon-phone"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?><span class="icon-printer">/span> <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?><<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?><span class="icon-mail"></span> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?><span class="icon-location"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?><?php endif; ?>
						</p>
						</div>
					</div>
				</li>		
		<?php endwhile; ?>
			<div class="row" id="noresults">
				<div class="small-12 medium-4 columns centered">
					<h3> No matching results</h3>
				</div>
			</div>
		</ul>
	</div>
</div> <!-- End content wrapper -->
<?php get_footer(); ?>