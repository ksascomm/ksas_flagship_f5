<footer>
  	<div class="row hide-for-print">
  		<nav class="medium-3 columns hide-for-small" id="quicklinks" aria-label="Quicklinks Menu">
			<?php wp_nav_menu( array( 
			'theme_location' => 'quick_links', 
			'menu_class' => 'nav-bar', 
			'fallback_cb' => 'foundation_page_menu', 
			'container' => 'false', 
			'walker' => new foundation_navigation() ) ); ?>
  		</nav>
		<!-- Footer Links -->
		<div class="medium-6 columns" role="navigation" aria-labelledby="menu-footer-links">
			<ul id="menu-footer-links" class="inline-list">
				<li role="menuitem"><a href="http://krieger.jhu.edu/about/contact/">Contact/Directory</a></li>
				<li role="menuitem"><a href="http://krieger.jhu.edu/communications-office/">Communications Office</a></li>
				<li role="menuitem"><a href="https://www.jhu.edu/alert/">Emergency Alerts & Info</a></li>
				<li role="menuitem"><a href="http://krieger.jhu.edu/research/policies/">Policies</a></li>
				<li role="menuitem"><a href="http://krieger.jhu.edu/faculty-jobs/">Faculty Job Openings</a></li>
			</ul>
		</div>
		
		<!-- Social Media -->
		<div class="small-12 medium-3 large-2 columns" id="social-media" role="navigation" aria-labelledby="social-media">
			<div class="small-6 columns">
				<a href="http://facebook.com/jhuksas" title="Facebook"><span class="fa fa-facebook-official fa-3x"></span><span class="screen-reader-text">Facebook</span></a>
			</div>
			<div class="small-6 columns">
				<a href="https://www.youtube.com/user/jhuksas" title="YouTube"><span class="fa fa-youtube-square fa-3x"></span><span class="screen-reader-text">YouTube</span></a>
			</div>
		</div>
  	</div>
  	<div class="row" id="copyright" role="contentinfo">
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
  
  <?php wp_footer(); 
  locate_template('/parts/script-initiators.php', true, false); ?>

	</body>
</html>