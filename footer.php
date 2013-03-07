</section> <!-- /#main-content -->
<div class="push"></div>
</section>

<footer>

	<div class="container">
        <?php
		if ( has_nav_menu( 'footer' )) {
			wp_nav_menu( 
				array( 
					'theme_location' => 'footer',
					'container' => 'nav',
					'container_id' => 'nav-footer',
				)
			);
		} 
		?>
		<div id="footer-info">
            &copy; <?php echo date('Y') . ' ' . get_bloginfo('name'); ?>. All Rights Reserved.
		</div>
    
	</div>

</footer>	

<section id="scripts">

	<?php wp_footer(); ?>

</section>

</body>
</html>
