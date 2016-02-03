<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="small-8 columns wrapper radius-left offset-topgutter">
		<section role="main">
				<h5 class="uppercase no-margin">Dean's Newsletter <time class="floatright"><?php echo get_post_meta($post->ID, 'date_newsletter', true); ?></time></h4>
				<p><b>A newsletter from James B. Knapp Dean Beverly Wendland</b></p>
				<h1><?php the_title();?></h1>
				<?php the_content(); ?>
		</section>
	</div>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>
	<?php locate_template('parts-deans-sidebar.php', true, false); ?>
	</div> 
<?php get_footer(); ?>