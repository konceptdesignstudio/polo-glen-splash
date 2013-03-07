<?php


function cur_register_connections(){

	//p2p_register_connection_type( array(
		//'name' => 'actors',
		//'from' => 'show',
		//'to' => 'user',
		////'to_query_vars' => array(
			////'tax_query' => array(
				////array( 
					////'taxonomy' => 'staff_position',
					////'field' => 'slug',
					////'terms' => 'actor'
				////)
			////)
		////)
	//) );

}

add_action('p2p_init', 'cur_register_connections');
