<?php get_header(); ?>
	
	<?php  
	    $structure = get_post_meta($post->ID, 'ecpt_structure', true);
	    $field = get_post_meta($post->ID, 'ecpt_field_level', true);
	     if ( $field == 'undergraduate' ) {
	    	locate_template('parts-undergrad.php', true, false);
	    } 
	     if ( $field == 'full-graduate' ) {
	    	locate_template('parts-full-time-grad.php', true, false);
	    } 
	     if ( $field == 'part-graduate' ) {
	    	locate_template('parts-part-time-grad.php', true, false);
	    } 
	?>

<?php get_footer(); ?>
