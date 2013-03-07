<?php
/********************* META BOXES DEFINITION ***********************/

/**
 * Prefix of meta keys (optional)
 * Wse underscore (_) at the beginning to make keys hidden
 * You also can make prefix empty to disable it
 */
$prefix = 'cur_';
global $meta_boxes;
$meta_boxes = array();

$meta_boxes[] = array(
	'id' => 'meta_page',
	'title' => __('Page Meta', 'journey'),
	'pages' => array( 'page' ),

	'fields' => array(
		array(
			'name' => __( 'Headline', 'avian' ),
			'id' => $prefix . 'headline',
			'type' => 'text',
		),
		array(
			'name' => __( 'Subhead', 'avian' ),
			'id' => $prefix . 'subhead',
			'type' => 'text',
		),
	)
);
$meta_boxes[] = array(
	'id' => 'meta_publication',
	'title' => __('Publication Meta', 'journey'),
	'pages' => array( 'publication' ),

	'fields' => array(
		array(
			'name' => __( 'PDF', 'avian' ),
			'id' => $prefix . 'pdf',
			'type' => 'file',
		),
	)
);

//if( is_admin() ){

    //global $wpdb;

    //$slides = $wpdb->get_results("SELECT ID, post_title from $wpdb->posts where post_type = 'slide' AND post_status = 'publish'");

    //foreach( $slides as $s ){
        //$slides_array[ $s->ID ] = $s->post_title;
    //}
//}


// Hook to 'admin_init' to make sure the meta box class is loaded before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'cur_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function cur_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
