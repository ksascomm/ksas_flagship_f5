<?php
/*
Template Name: Calendar
*/
?>
<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 columns">	
		<main class="content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			
			<!-- /*****Calendar display for desktop then mobile*****/ -->
				<?php if(is_mobile()) {  ?>	
					<div class="row">
						<a href="<?php echo get_site_url() . '/calendar/krieger_all' ; ?>">View our Events Calendar</a>
					</div>
				<?php } else { ?>
					<div class="hide-for-small-only" id="calendar_container"></div>
					<div class="show-for-small-only">
						<a href="<?php echo get_site_url() . '/calendar/krieger_all' ; ?>">View our Events Calendar</a>
					</div>
				<?php } ?>
		</main>
	</div>
</div> 
<?php get_footer(); ?>