<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="opp">
	<main class="small-12 medium-8 columns wrapper radius-left offset-topgutter">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title();?></h1>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
	</main>	<!-- End Wrapper -->
<?php locate_template('parts/sidebar.php', true, false); ?>
</div>	
<?php get_footer(); ?>