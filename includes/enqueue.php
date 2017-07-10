<?php

/**
 * Enqueue scripts and styles.
 */
function mro_deregister_scripts() {

    //Deregister styles

	// Bootstrap
	wp_dequeue_style( 'tt-bootstrap.css' );
	wp_deregister_style( 'tt-bootstrap.css' );

	// Custom Scrollbar
	wp_dequeue_style( 'tt-custom-scrollbar.css' );
	wp_deregister_style( 'tt-custom-scrollbar.css' );

	// flickity
	wp_dequeue_style( 'tt-flickity.css' );
	wp_deregister_style( 'tt-flickity.css' );

	// font-awesome
	wp_dequeue_style( 'tt-font-awesome.css' );
	wp_deregister_style( 'tt-font-awesome.css' );

	// icomoon
	wp_dequeue_style( 'tt-icomoon.css' );
	wp_deregister_style( 'tt-icomoon.css' );

	// jquery.fullPage
	wp_dequeue_style( 'tt-jquery.fullPage.css' );
	wp_deregister_style( 'tt-jquery.fullPage.css' );

	// owl
	wp_dequeue_style( 'tt-owl.css' );
	wp_deregister_style( 'tt-owl.css' );

	// tt-main-style
	wp_dequeue_style( 'tt-main-style' );
	wp_deregister_style( 'tt-main-style' );

	// tt-theme-style
	wp_dequeue_style( 'tt-theme-style' );
	wp_deregister_style( 'tt-theme-style' );

	//Deregister scripts

	//Podcaster responsive menu (replaced by Bootstrap's)
	// wp_dequeue_script( 'thst-resmen' );
	// wp_deregister_script( 'thst-resmen' );


}
// add_action( 'wp_enqueue_scripts', 'rhap_scripts' );
add_action('wp_print_styles', 'mro_deregister_scripts', 99999);


