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

//Remove posts tab from admin menu
    function modify_editor_menu ()      //creating functions post_remove for removing menu item
{
    remove_menu_page('edit.php');                     //Posts
    remove_menu_page( 'edit-comments.php' );          //Comments
  //  $wp_admin_bar->remove_node( 'wp-admin-bar-comments');
    remove_menu_page( 'tools.php' );                  //Tools
}


if( current_user_can('editor') || current_user_can('author')) {
    add_action('admin_menu', 'modify_editor_menu');   //adding action for triggering function call
}

function remove_admin_bar_links() {
    global $wp_admin_bar;
//    $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
//    $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
//    $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
//    $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
//    $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
//    $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
//    $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
//    $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
//    $wp_admin_bar->remove_menu('updates');          // Remove the updates link
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link
//    $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
//    $wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


function custom_admin_logo() {
    //if ( popper_custom_logo() ) {

        echo '<style type="text/css">
	#wp-admin-bar-wp-logo > .ab-item .ab-icon {
		background-image: url("https://eaglespringspub.com/wp-content/uploads/2016/05/cropped-esp_logo.png") !important;
		background-position: 0 !important;
	}
	</style>';
  //  }

}
add_action( 'admin_head', 'custom_admin_logo' );





?>