<?php get_header(); ?>

<div class="row wrapper radius10">
	<main class="small-12 columns no-gutter" role="main-content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if ( has_post_thumbnail()) { ?> 
			<div class="photo-page-left floatleft small-6 columns">
				<?php the_post_thumbnail('full',array('class'	=> "radius-topleft")); ?>
			</div>
			<?php } ?>

			<h1><?php the_title();?></h1>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
	</main>
</div>

<?php get_footer(); ?>

