<?php get_header(); ?>

<div class="row wrapper radius10" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog" id="page">
	<div class="small-12 columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<time datetime="<?php the_time('c'); ?>" itemprop="datePublished"><h6><?php echo get_the_date(); ?></h6></time>
			<h1 itemprop="headline"><?php the_title();?></h1>
			<span class="hide" itemprop="author" itemscope itemtype="https://schema.org/Person">
			By <span itemprop="name">Krieger School of Arts & Sciences</span>
			</span>
			<meta name="dateModified" itemprop="dateModified" content="<?php the_modified_date(); ?>" />			
			<?php the_post_thumbnail('full', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
			<p itemprop="text"><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>
