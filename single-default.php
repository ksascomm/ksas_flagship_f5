<?php get_header(); ?>

<div class="row wrapper radius10" role="main">
	<div class="small-12 columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<time><h6><?php echo get_the_date(); ?></h6></time>
			<h1><?php the_title();?></h1>
			<?php the_post_thumbnail('full', array('class' => 'floatleft')); ?>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>
