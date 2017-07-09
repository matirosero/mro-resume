<?php

add_action( 'wp_enqueue_scripts', 'resume_parent_theme_enqueue_styles' );

function resume_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'resume-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'mro-resume-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'resume-style' )
    );

}
