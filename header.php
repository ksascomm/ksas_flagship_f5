<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="date" itemprop="dateModified" content="<?php the_modified_date(); ?>" />
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.ico" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-144x144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-114x114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-72x72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-57x57-precomposed.png" />
  <!-- CSS Files: All pages -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/app.min.css">

  <?php wp_head(); ?>
<?php include_once("analytics.php") ?> 
</head>

<?php
/* Get the Ancestor Page Slug to Use as a Body Class, this will only return a value on pages! */
$ancestorslug = '';
if( is_page() ) { 
	global $post;
        /* Get an array of Ancestors and Parents if they exist */
	$parents = get_post_ancestors( $post->ID );
        /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
	$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
	/* Get the parent and set the $ancestorslug with the page slug (post_name) */
        $parent = get_page( $id );
	$ancestorslug = $parent->post_name;
}

?>
	<!-- Make IE a modern browser -->
	<!--[if IE]>
		<script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://cdn.jsdelivr.net/css3-mediaqueries/0.1/css3-mediaqueries.min.js"></script>
	<![endif]-->
  	<!--[if lt IE 11]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/app.ie.css">
		<div data-alert class="alert-box alert">
		<?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.'); ?>	
		</div>		
	<![endif]-->
<body <?php body_class($ancestorslug); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<header itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
		<meta itemprop="headline" content="<?php echo get_bloginfo( 'title' ); ?>">
		<div id="mobile-nav">
	  		<div class="row">
		        <div class="small-12 columns">
		  			<div class="mobile-logo centered"><a href="<?php echo network_site_url(); ?>" title="Johns Hopkins University"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-logo-horizontal.png" alt="jhu logo"></a></div>
		  		</div>
	  		</div>
		</div>
	
		<div id="desktop-nav">
			<?php get_template_part( '/parts/offcanvas-nav' ); ?>

			<nav class="row hide-for-print" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" aria-label="Main Menu">
				<?php wp_nav_menu( array( 
					'theme_location' => 'main_nav', 
					'menu_class' => '', 
					'container' => 'div',
					'container_id' => 'main_nav', 
					'container_class' => 'small-12 columns',
					'depth' => 2,
					'fallback_cb' => 'foundation_page_menu',
					'walker' => new foundation_navigation(),
					 )); ?> 
			</nav>
		</div>
	</header>