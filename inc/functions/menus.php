<?php
//Register Menus
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
register_nav_menus(
			array(
				'primary' => __( 'Primary' ),
				'secondary' => __( 'Secondary' ),
				'footer' => __( 'Footer' ),
				'social' => __( 'Social' ),
			)
		);
}

get_template_part('inc/classes/walker-bootstrap-nav-menu');
get_template_part('inc/classes/walker-mv-cleaner');
get_template_part('inc/classes/walker-extract-current-submenu');
