<aside class="small-12 large-4 columns" id="sidebar"> <!-- Begin Sidebar -->
		<div class="photo-page-right">
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/deanwendland.jpg" class="radius-topright offset-gutter" />
		</div>
		<div class="rust_bg offset-gutter" id="sidebar_header">
			<h5 class="white">James B. Knapp Dean Beverly Wendland</h5>
		</div>
		<div class="row">
			<?php wp_nav_menu( array( 
				'menu' => 'Dean Links',
				'container' => false,
				'menu_class' => 'nav',
				'items_wrap' => '<ul class="%2$s" role="navigation" aria-label="Sidebar Menu">%3$s</ul>',
				'depth' => 1 )); ?> 
		</div>
</aside> <!-- End Sidebar -->