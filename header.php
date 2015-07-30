<!DOCTYPE html>
<html lang="en" class="no-js"> 

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title><?php create_page_title(); ?></title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.ico" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-144x144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-114x114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-72x72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-57x57-precomposed.png" />
  <!-- CSS Files: All pages -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/app.css">

  <!-- CSS Files: Conditionals -->
  
  <!-- Modernizr and Jquery Script -->
  <?php wp_enqueue_script('jquery'); ?> 
  <script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/modernizr-min.js"></script>
  <?php wp_head(); ?>

  <?php include_once("parts-analytics.php") ?> 
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
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/lte-ie7.js"></script>
  <![endif]-->
<body <?php body_class($ancestorslug); ?>>
	<header>
		<div id="mobile-nav">
	  		<div class="row">
		        <div class="small-12 columns">
		  			<div class="mobile-logo"><a href="<?php echo network_site_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/jhu.png" alt="jhu logo"></a></div>
		  		</div>
	  		</div>
		</div>
	
		<div id="desktop-nav">
			<div class="row hide-for-print">
				<div id="search-bar" class="small-12 medium-4 medium-offset-8 columns" role="search">
					<div class="row">
						<div class="small-6 columns">
							<form method="GET" action="<?php echo site_url('/search'); ?>" role="search">
								<input type="submit" class="icon-search" value="&#xe004;" />
								<label class="hide" for="search">Search</label><input type="text" name="q" id="search" placeholder="Search this site" />
							</form>
						</div>
						<div class="small-6 columns links inline">
							<a href="http://www.jhu.edu">jhu.edu</a> |
							<a href="http://library.jhu.edu/">Library</a> |
							<a href="<?php echo network_site_url(); ?>about/contact/">Contact</a>
						</div>
					</div>	
				</div>	<!-- End #search-bar	 -->
			</div>
			<div class="row hide-for-print" role="navigation">
				<?php wp_nav_menu( array( 
					'theme_location' => 'main_nav', 
					'menu_class' => '', 
					'container' => 'nav',
					'container_id' => 'main_nav', 
					'container_class' => 'small-12 columns',
					'depth' => 2,
					'walker'=> new page_id_classes )); ?> 
			</div>
	</header>