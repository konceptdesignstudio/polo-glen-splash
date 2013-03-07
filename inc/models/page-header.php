<?php
$background_image = $headline = $subhead = '';
if( !is_single() ) :
	if( is_tax() ){
		$term = get_queried_object();
		$background_image = cur_get_taxonomy_uploaded_images('meta_taxonomy_page', $term->term_id, 'cur_header_image'  );
		$headline = cur_get_taxonomy_meta('meta_taxonomy_page', $term->term_id, 'cur_headline'  );
		$subhead = cur_get_taxonomy_meta('meta_taxonomy_page', $term->term_id, 'cur_subhead'  );
		$background_image = &$background_image[0];
	} else {
		global $post;
		$post_id = $post->ID;
		if( is_home() ){
			$post_id = get_option('page_for_posts', true);
		}
		$background_image = cur_get_post_thumbnail_url( $post_id, 'page-header' );
		$headline = get_post_meta($post_id, 'cur_headline', true);
		$subhead = get_post_meta($post_id, 'cur_subhead', true);
	}
	if( !empty( $background_image ) ) :
?>
<section id="page-header" style="background-image: url('<?php echo $background_image; ?>');">
	<div class="container">
		<h2><?php if( $headline ){ echo $headline; } ?></h2>
		<h3><?php if( $subhead ){ echo $subhead; } ?></h3>
	</div>
</section>
<?php endif; 
endif;
?>
