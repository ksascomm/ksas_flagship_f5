<?php get_header(); ?>

<div class="row wrapper radius10" id="page">
	<main class="small-12 columns no-gutter" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
			<h1 itemprop="headline"><?php the_title();?></h1>
			<p itemprop="text"><?php the_content(); ?></p>
			</article>	
		<?php endwhile; endif; ?>
	</main>
</div>

<?php get_footer(); ?>

