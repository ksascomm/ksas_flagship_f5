<!***********ALL PAGES**************>
	<script async>
	var $x = jQuery.noConflict();
		$x('#quicklinks ul.flyout li a').on('click', function() {
  			ga('send', 'event', 'Quicklinks', 'Flyout Menu', 'Flagship');
		});
	</script>

	<script async>
		var $za = jQuery.noConflict();
			$za('#quicklinks ul.flyout li a').on('click', function() {
	  			_sz.push(['event', 'Quicklinks', 'Flyout Menu', ('Flagship-SiteImprove') ]);
			});
	</script>

	<script async>
		var $zz = jQuery.noConflict();
			$zz('#trigger').on('click', function() {
	  			_sz.push(['event', 'Quicklinks', 'Explore KSAS', ('Offcanvas Top Navigation') ]);
			});
	</script>

<!**********TABLET/MOBILE MENUS**************>  
<?php if(is_tablet()) {  ?>
		<script defer>
			jQuery(document).ready(function () {
			    jQuery('#main_nav').meanmenu({meanScreenWidth: "767"});
			});
		</script>
<?php } else { ?>
	<script defer>
		jQuery(document).ready(function () {
		    jQuery('#main_nav').meanmenu();
		});
	</script>
<?php } ?>

	
<!***********FIELDS OF STUDY**************>
  <?php if ( is_page_template( 'template-fieldsofstudy.php' ))  { ?>
  	<script defer src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/page.fieldsofstudy.min.js"></script>
  	
  		<?php if (isset($_POST['home_search'])) { ?>
	  		<script defer>
		  		var $j = jQuery.noConflict();
		  		$j(window).load(function() {
		  		    $j('#id_search').trigger('keyup'); // Trigger the listener
		  		});
	  		</script>
	  	<?php } else { ?>
	  		<script defer>
		  		var $j = jQuery.noConflict();
		  		$j(window).load(function() {
		  		    var filterFromQuerystring = getParameterByName('filter');
		  		    $j('.filter a[data-filter=".' + filterFromQuerystring  + '"]').click();
		  		});
	  		</script>
  		<?php } ?>
  		<script>

</script>
 
	<?php } ?> 
<!***********DIRECTORY**************>
<?php if ( is_page_template( 'template-directory.php' ))  { ?>
  	<script defer src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/page.directory.min.js"></script>
<?php } ?>

<!***********RESEARCH**************>
<?php if ( is_page('research')) { ?>

<?php } ?>


<!***********ABOUT**************>

<!***********NAVIGATION INDICATORS**************>
<?php if (  is_singular('post') || is_page_template('template-photo-archive.php') || is_page_template('template-story-archive.php') || is_page_template('template-video-archive.php') || is_page('archive') || is_page('events')) { 
		$news_id = ksas_get_page_id('news-events');
		$archive_id = ksas_get_page_id('archive');
?>
	<script defer>
		var $j = jQuery.noConflict();
		$j(document).ready(function(){
			$j('li.page-id-<?php echo $news_id; ?>').addClass('current_page_ancestor');
			$j('li.page-id-<?php echo $archive_id; ?>').addClass('current_page_parent');
			});
	</script>
<?php } ?>

<?php if ( is_singular('people') ) { 
	$about_id = ksas_get_page_id('about');
	$people_id = ksas_get_page_id('leadership');
?>
	<script defer>
		var $k = jQuery.noConflict();
		$k(document).ready(function(){
			$k('li.page-id-<?php echo $about_id; ?>').addClass('current_page_ancestor');
			$k('li.page-id-<?php echo $people_id; ?>').addClass('current_page_parent');
			});
	</script>
<?php } ?>
<?php if ( is_singular('studyfields') || is_page_template('template-fieldsofstudy.php') ) { 
		$academics_id = ksas_get_page_id('academics');
		$fields_id = ksas_get_page_id('fields');
?>
	<script defer>
		var $k = jQuery.noConflict();
		$k(document).ready(function(){
			$k('li.page-id-<?php echo $academics_id; ?>').addClass('current_page_ancestor');
			$k('li.page-id-<?php echo $fields_id; ?>').addClass('current_page_parent');
			});
	</script>
<?php } ?>
<?php if ( is_category('newsletter') ) { 
	$about_id = ksas_get_page_id('about');
	$newsletter_id = ksas_get_page_id('dean-newsletter');
?>
	<script defer>
		var $k = jQuery.noConflict();
		$k(document).ready(function(){
			$k('li.page-id-<?php echo $about_id; ?>').addClass('current_page_ancestor');
			$k('li.page-id-<?php echo $newsletter_id; ?>').addClass('current_page_parent');
			});
	</script>
<?php } ?>

<script defer>
jQuery.noConflict();
jQuery(document).foundation();
</script>
