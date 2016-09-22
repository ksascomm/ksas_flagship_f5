<?php
/*
Template Name: Page with Sidebar
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="row sidebar_bg radius10" id="opp">
	<main class="small-12 medium-8 columns wrapper radius-left offset-topgutter">		
		<h1><?php the_title();?></h1>
			<?php if ( has_post_thumbnail()) { ?> 
				<div class="photo-page-left floatleft small-12 medium-7 columns">
					<?php the_post_thumbnail('full',array('class'	=> "radius-topleft")); ?>
				</div>
			<?php } ?>
		<?php the_content(); ?>
	</main>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>	
	
	<?php locate_template('parts/sidebar.php', true, false); ?>
		<!-- Page Specific Sidebar -->

</div> <!-- End #landing -->
<?php get_footer(); ?>