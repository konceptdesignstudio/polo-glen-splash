<?php

function cur_register_post_types(){

	$labels = array(
		'name' => 'Publications',
		'singular_name' => 'Publication'
	);
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		//'rewrite' => array( 'slug' => 'messsages' ),
		'supports' => array( 'title', 'editor', 'thumbnail')
	  ); 
	register_post_type('publication', $args);
	register_taxonomy('publication_cat', 'publication', array('label' => 'Categories', 'hierarchical' => true));

    //Post Type
    //$labels = array(
        //'name' => 'Post Type',
        //'singular_name' => 'Message'
    //);
      //$args = array(
        //'labels' => $labels,
        //'public' => true,
        //'publicly_queryable' => true,
        //'show_ui' => true, 
        //'show_in_menu' => true, 
        //'query_var' => true,
        //'capability_type' => 'post',
        //'has_archive' => true, 
        //'hierarchical' => false,
        //'menu_position' => null,
        //'has_archive' => true,
        ////'rewrite' => array( 'slug' => 'messsages' ),
        //'supports' => array( 'title', 'editor', 'thumbnail')
      //); 
    //register_post_type('post-type', $args);
  //  register_taxonomy('series', 'message', array('label' => 'Series', 'hierarchical' => true));

}
add_action('init', 'cur_register_post_types');
