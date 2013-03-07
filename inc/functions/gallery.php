<?php

//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'cur_gallery_shortcode');

function cur_gallery_shortcode($attr) {
	global $post, $gallery_id;

	static $instance = 0;
	$instance++;

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'offset' => 1,
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$post_parent = intval($id);

	$args = array(
		'post_parent' => $post_parent,
		'post_status' => 'inherit',
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'order' => $order,
		'orderby' => $orderby
	);

$GLOBALS['cur_order'] = $order;
$GLOBALS['cur_orderby'] = $orderby;

	$attachments = get_children( $args );

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$selector = "gallery-{$id}";

	$output = '<ul class="slides">';

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {

		$src = wp_get_attachment_image_src($id, 'large');

        $output .= '<li><a href="'.$src[0].'" rel="prettyPhoto[\''.$selector.'\']" title="'.$attachment->post_excerpt.'">';
        $output .= wp_get_attachment_image( $id, 'featured-image');
        $output .= '</a></li>';
        $i++;
	}

	$output .= "
		</ul>\n";

	return $output;
}

