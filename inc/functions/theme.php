<?php

function cur_prettyphoto_link($title, $link, $gallery = null ){
	$rel = ( $gallery ) ? "lightbox[$gallery]" : 'lightbox';
	return ( empty( $link ) ) ? $title : '<a href="' . $link . '" data-ob="' . $rel . '" data-ob_share="false">' . $title . '</a>';
}
