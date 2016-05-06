<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';
    wp_enqueue_style( 'popper-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css' );

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css'
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
?>