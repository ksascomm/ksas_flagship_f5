<?php get_header(); ?>

<div class="row wrapper radius10">
	<main class="small-12 columns no-gutter" role="main">
		<h1>Whoops...</h1>
		<p>This page does not exist.  Try searching</p>
		    <form class="search-form" action="<?php echo site_url('/search'); ?>" method="get">
                <fieldset>
                    <input type="text" class="input-text" name="q" />
                    <input type="submit" class="button blue_bg" value="Search" />
                </fieldset>
   			</form>        
	</main>
</div>

<?php get_footer(); ?>

