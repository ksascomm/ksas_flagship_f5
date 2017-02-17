<?php get_header(); ?>

<div class="row wrapper radius10" id="page">
	<div class="small-12 columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title();?></h1>
			<div class="row">
				<div class="small-12 medium-6 columns end">
					<?php the_excerpt() ?>
				</div>
			</div>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>
