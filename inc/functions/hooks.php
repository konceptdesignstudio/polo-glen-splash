<?php

// Place generic filters and actions here

function cur_modify_posts_per_page( $query ){
	if ( $query->is_main_query() && is_tax('publication_cat', 'clinical-avian-medicine') ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
		$query->set( 'posts_per_page', -1 );
	} else if( $query->is_main_query() && is_tax('publication_cat') ){
		$query->set( 'posts_per_page', 6 );
	}
}

add_action( 'pre_get_posts', 'cur_modify_posts_per_page');
