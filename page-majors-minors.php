<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="opp">
	<main class="small-12 medium-8 columns wrapper radius-left offset-topgutter">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title();?></h1>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
	</main>	<!-- End Wrapper -->
	<aside class="small-12 medium-4 columns" id="sidebar"> <!-- Begin Sidebar -->
		<div class="row">
		<!-- Page Specific Sidebar -->
		<?php if ( get_post_meta($post->ID, 'ecpt_page_sidebar', true) ) { 
				echo apply_filters('the_content', get_post_meta($post->ID, 'ecpt_page_sidebar', true));
			} ?>
		</div> <!--End Dept Nav Links -->
	</aside> <!-- End Sidebar -->
</div>	
<?php get_footer(); ?>