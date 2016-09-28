<?php get_header(); ?>
<div class="row sidebar_bg radius10" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="small-8 columns wrapper radius-left offset-topgutter">
		<h5 class="uppercase no-margin">Dean's Newsletter <time class="floatright"><?php echo get_post_meta($post->ID, 'date_newsletter', true); ?></time></h4>
		<p><strong>A newsletter from James B. Knapp Dean Beverly Wendland</strong></p>
		<h1><?php the_title();?></h1>
		<?php the_content(); ?>
	</div>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>
	<?php locate_template('parts/deans-sidebar.php', true, false); ?>
	</div> 
<?php get_footer(); ?>