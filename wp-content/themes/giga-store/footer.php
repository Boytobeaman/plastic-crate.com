<?php if ( is_active_sidebar( 'giga-store-footer-area' ) ) { ?>
	<div class="footer-widgets"> 
		<div class="container">		
			<div id="content-footer-section" class="row clearfix">
				<?php dynamic_sidebar( 'giga-store-footer-area' ) ?>
			</div>
		</div>
	</div>	
<?php } ?>
<footer id="colophon" class="rsrc-footer" role="contentinfo">
	<div class="container">  
	<div class="row friend-links">
			<a href="https://www.storage-totes.com/product-category/collapsible-storage-bins/" target="_blank">collapsible storage bins</a>
			<a href="https://www.plastic-crate.co.uk/product-category/euro-crates-boxes-for-sale/" target="_blank">euro containers</a>
			<a href="https://www.vegcrates.com/space-age-totes-with-lids-for-sale/" target="_blank">space age totes</a>
			<a href="https://www.ausplastic.com/product-category/collapsible-storage-box/" target="_blank">collapsible storage box</a>
		</div>
	</div>       
</footer> 
<p id="back-top">
	<a href="#top"><span></span></a>
</p>
<!-- end main container -->
</div>
<nav id="menu" class="off-canvas-menu">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'main_menu',
		'container'		 => false,
	) );
	?>
</nav>
<?php wp_footer(); ?>
</body>
</html>
