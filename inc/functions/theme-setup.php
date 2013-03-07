<?php

add_action('after_setup_theme', 'of_setup_theme');
function of_setup_theme(){
	add_theme_support( 'menus' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(746, 746, false);
	add_image_size('thumb', 120, 140, false);
	add_image_size('page-header', 235, 1496);


	add_filter('the_generator', 'wpbeginner_remove_version');
    function wpbeginner_remove_version() {
    return '';
    }

	add_filter('login_errors',create_function('$a', "return null;"));
	//remove_filter('the_content', 'wpautop');
	add_editor_style();

	function roots_head_cleanup() {
	  // http://wpengineer.com/1438/wordpress-header/
	  remove_action('wp_head', 'feed_links', 2);
	  remove_action('wp_head', 'feed_links_extra', 3);
	  remove_action('wp_head', 'rsd_link');
	  remove_action('wp_head', 'wlwmanifest_link');
	  remove_action('wp_head', 'index_rel_link');
	  remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	  remove_action('wp_head', 'start_post_rel_link', 10, 0);
	  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	  remove_action('wp_head', 'wp_generator');
	  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	}

	add_action('init', 'roots_head_cleanup');

	function customformatTinyMCE($init) {
		// Add block format elements you want to show in dropdown
		//$init['theme_advanced_blockformats'] = 'p,h3,h4,h5,h6,small';

		// Add elements not included in standard tinyMCE doropdown p,h1,h2,h3,h4,h5,h6
		$init['extended_valid_elements'] = 'code[*]';

		return $init;
	}


	// Changing excerpt more
	function new_excerpt_more($more) {
	global $post;
	return '... <a href="'. get_permalink($post->ID) . '">' . 'Read More >>>' . '</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	function cur_excerpt_length( $query ){
		return 30;
	}
	function cur_excerpt_length_long( $query ){
		return 100;
	}

	function cur_set_excerpt_length(){
		if( @is_home() ){
			add_filter('excerpt_length', 'cur_excerpt_length_long');
		} else {
			add_filter('excerpt_length', 'cur_excerpt_length');
		}
	}
	add_action( 'pre_get_posts', 'cur_set_excerpt_length');

	// Modify Tiny_MCE init
	add_filter('tiny_mce_before_init', 'customformatTinyMCE' );

	//move wpautop filter to AFTER shortcode is processed
	//remove_filter( 'the_content', 'wpautop' );
	//add_filter( 'the_content', 'wpautop' , 99);
	//add_filter( 'the_content', 'shortcode_unautop',100 );

	//function cur_add_placeholder($field_content, $field, $value, $lead_id, $form_id){
		//var_dump( func_get_args() );
	//}
	//add_filter("gform_field_content", "cur_add_placeholder", 10, 5);
	//function cur_add_placeholder($input, $field, $value, $lead_id, $form_id){
		//var_dump( func_get_args() );
	//}
	//add_filter("gform_field_input", "cur_add_placeholder", 10, 5);

	/**
	 * Adjusting the HTML of the submit button to match design
	 *
	 *
	 * @param $button string  required  The text string of the button we're editing
	 * @param $form   array   required  The whole form object
	 *
	 * @return string The new HTML for the button
	 */
	add_filter( 'gform_submit_button', 'cur_submit_button', 10, 2 );
	function cur_submit_button( $button, $form ){
	 
	  return '<button class="button teal gform_submit" type="submit" id="gform_submit_button_'.$form["id"].'" value="'. $form["button"]["text"] .'">' . $form["button"]["text"] . '</button>';
	} 

	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

	function remove_width_attribute( $html ) {
	   $html = preg_replace( '/(width|height)=[\'|"]\d*[\'|"]\s/', "", $html );
	   return $html;
	}

    add_filter('jpeg_quality', 'jpeg_quality_callback');
    function jpeg_quality_callback($arg) {
        return (int)100;
    }
}
