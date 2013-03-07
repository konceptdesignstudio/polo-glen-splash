<?php 

add_action('wp_enqueue_scripts', 'register_theme_libs');
function register_theme_libs() {

    wp_register_script('prettyPhoto-js', CUR_ASSETS . '/js/libs/jquery.prettyPhoto.js', array('jquery'), '3.1.5', true);
    wp_register_style('prettyPhoto-css', CUR_ASSETS . '/css/prettyPhoto.css', array(), NULL);
    wp_register_script('orangebox-js', CUR_ASSETS . '/js/libs/orangebox.min.js', array('jquery'), '3.0.0', true);
    wp_register_style('orangebox-css', CUR_ASSETS . '/css/orangebox.css', array(), NULL);

	wp_deregister_script('jquery');
	if (WP_LOCAL_DEV) {
		wp_enqueue_script('jquery', CUR_ASSETS.'/js/libs/jquery-1.9.1.min.js', array(), '1.9.1', true);
	}
	else{
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', array(), NULL, true);
	}
	wp_enqueue_script('modernizr', CUR_ASSETS.'/js/libs/modernizr-2.5.3.min.js', array(), '2.5.3', false);
	wp_enqueue_script('selectivizr', CUR_ASSETS.'/js/libs/selectivizr.js', array(), '1.0.2', false);

    wp_enqueue_style('theme-fonts', 'http://fonts.googleapis.com/css?family=Oswald', array(), NULL);
}

function cur_register_pretty_photo(){
	if( is_tax('publication_cat') ) :
		wp_enqueue_script('orangebox-js');
		wp_enqueue_style('orangebox-css');
	endif;
}
add_action('wp_enqueue_scripts', 'cur_register_pretty_photo');

function cur_register_flexslider(){
		wp_enqueue_script('flexslider');
}
add_action('wp_enqueue_scripts', 'cur_register_flexslider');

add_action('wp_enqueue_scripts', 'register_theme_scripts');
function register_theme_scripts() {
		wp_enqueue_script('theme-scripts', CUR_ASSETS . '/js/scripts.js', array('jquery'), NULL, true);
}

function cur_deregister_conflicts(){
    wp_deregister_style('ai1ec-calendar');
    wp_deregister_style('ai1ec-event');
}
//add_action('wp_enqueue_scripts', 'cur_deregister_conflicts', 999);

function cur_admin_enqueue_scripts(){
    
    if ( is_admin() ) {
        if ( !empty( $_GET['post'] ) || !empty( $_GET['post_type'] ) ){
            if( isset($_GET['post']) && get_post_type( $_GET['post'] ) != 'message' || isset($_GET['post_type']) && $_GET['post_type'] != 'message' ){
                wp_enqueue_script('jquery');
                wp_enqueue_script('cur-hide-podcast', CUR_ASSETS . "js/admin/hide-podcast.js",array('jquery'));
            } 
            if( isset($_GET['post']) && get_post_type( $_GET['post'] ) != 'page' || isset($_GET['post_type']) && $_GET['post_type'] != 'page' ){
                wp_enqueue_script('jquery');
                wp_enqueue_script('cur-hide-sidebar', CUR_ASSETS . "js/admin/hide-sidebar.js",array('jquery'));

            }
        }
    }

}
add_action('admin_enqueue_scripts', 'cur_admin_enqueue_scripts');
