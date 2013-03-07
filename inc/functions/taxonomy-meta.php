<?php
$prefix = 'cur_';
$meta_sections = array();

$meta_sections[] = array(
	'id' => 'meta_headline',
	'title' => 'Headlines Meta',
	'taxonomies' => array( 'publication_cat' ),

	'fields' => array(
		array(
			'name' => __( 'Subtitle', 'avian' ),
			'id' => $prefix . 'subtitle',
			'type' => 'text',
		),
		array(
			'name' => __( 'Excerpt', 'avian' ),
			'id' => $prefix . 'excerpt',
			'type' => 'text',
		),
		array(
            'name' => 'Background Image',
            'id' => $prefix . 'background_image',
            'type' => 'image',
        ),
	)
);

$meta_sections[] = array(
	'id' => 'meta_taxonomy_page',
	'title' => 'Taxonomy Page',
	'taxonomies' => array( 'publication_cat' ),

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
		array(
            'name' => 'Header Image',
            'id' => $prefix . 'header_image',
            'type' => 'image',
		),
		array(
            'name' => 'Format',
            'id' => $prefix . 'format',
			'type' => 'select',
			'std' => 'list',
			'options' => array(
				'list' => 'List',
				'book' => 'Book',
			)
		),
	)
);

foreach ($meta_sections as $meta_section) {
    $my_section = new RW_Taxonomy_Meta($meta_section);
}

