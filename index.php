<?php get_header(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<header class="post-meta">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="entry-date"><?php the_time(get_option('date_format')); ?></p>
				<?php if ( comments_open() && ! post_password_required() ) {
					comments_popup_link( '<span class="comments-link">' . __( 'comments (0)', 'avian' ) . '</span>'
					,'<span class="comments-link">'._x( 'comments (1)', 'comments number', 'avian' ).'</span>'
					, '<span class="comments-link">'._x( 'comments (%)', 'comments number', 'avian' ).'</span>' );
				} ?>

			</header>
			<div class="entry-content">
				<?php if( has_post_thumbnail( $post->ID ) ) : ?>
					<a class="featured-image-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				<?php endif; ?>
                <?php if( is_home() ) : the_excerpt(); else : the_content(); endif; ?>
            </div> <!-- /.entry-content -->

			<?php if( is_single() ) comments_template(); ?>
    <?php endwhile; ?>
	<?php cur_pagination(); ?>
	</article>
    <?php get_sidebar(); ?>
<?php get_footer(); ?>
