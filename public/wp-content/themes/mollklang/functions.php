<?php

    /* Custom Post Type Start */
 
    function create_posttype() {
        register_post_type( 'portfolio',
        // CPT Options
 
            array(
                'labels' => array(
                'name' => __( 'Portfolio' ),
                'singular_name' => __( 'Portfolio' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'portfolio'),
            )
        );
    }
    // Hooking up our function to theme setup
    add_action( 'init', 'create_posttype' );
 
    /* Custom Post Type End */

?>