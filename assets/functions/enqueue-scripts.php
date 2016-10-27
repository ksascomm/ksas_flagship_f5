<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Load modernizr files in footer
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.min.js', array(), '', false );
    
    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.min.js', array( 'jquery' ), '5.5.3', true );

    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-plugins', get_template_directory_uri() . '/assets/js/foundation.plugins.min.js', array( 'jquery' ), '5.5.3', true );
    
    // Adding app file in the footer
    wp_enqueue_script( 'app-js', get_template_directory_uri() . '/assets/js/vendor/app.min.js', array( 'jquery' ), '', true );

}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

// Defer Plugin Javascripts
// Defer jQuery Parsing using the HTML5 defer property
if (!(is_admin() )) {
    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        if ( strpos( $url, 'modernizr.min.js' ) ) return $url;
        if ( strpos( $url, 'foundation.min.js' ) ) return $url;
        if ( strpos( $url, 'foundation.plugins.min.js' ) ) return $url;
        // return "$url' defer ";
        return "$url' defer onload='";
    }
    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}