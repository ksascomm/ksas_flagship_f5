  <footer>
  	<div class="row" role="navigation">
		<?php wp_nav_menu( array( 
		'theme_location' => 'quick_links', 
		'menu_class' => 'nav-bar', 
		'fallback_cb' => 'foundation_page_menu', 
		'container' => 'nav', 
		'container_id' => 'quicklinks',
		'container_class' => 'small-10 medium-3 columns', 
		'walker' => new foundation_navigation() ) ); ?>
  		
		<?php wp_nav_menu( array( 
		'theme_location' => 'footer_links', 
		'menu_class' => 'inline-list', 
		'fallback_cb' => 'foundation_page_menu', 
		'container' => 'nav', 
		'container_class' => 'medium-7 columns', 
		'walker' => new foundation_navigation() ) ); ?>
		
		<nav class="small-12 medium-2 columns" id="social-media">
			<div class="small-6 columns">
				<a href="http://facebook.com/jhuksas" title="Facebook"><span class="fa fa-facebook-official fa-3x"></span><span class="screen-reader-text">Facebook</span></a>
			</div>
			<div class="small-6 columns">
				<a href="https://www.youtube.com/user/jhuksas" title="YouTube"><span class="fa fa-youtube-square fa-3x"></span><span class="screen-reader-text">YouTube</span></a>
			</div>
		</nav>
  	</div>
  	<div class="row" id="copyright" role="content-info">
  		<div class="small-12 medium-5 medium-centered columns">
	  		<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, Zanvyl Krieger School of Arts & Sciences, 3400 N. Charles St, Baltimore, MD 21218</p>
  		</div>
  	</div>
		<div class="row">
  		<div class="small-12 small-centered medium-4 columns">
				<a href="http://www.jhu.edu" title="Johns Hopkins University"><img src="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" alt="Johns Hopkins University logo" /></a>
			</div>
		</div>
  </footer>
  
  <?php locate_template('parts-script-initiators.php', true, false); wp_footer();?>

	</body>
</html>