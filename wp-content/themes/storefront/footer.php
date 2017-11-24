<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">
			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' ); ?>
				<div class="row">
					<div id="footerLink">
						<p>
							<a href="http://www.plastic-crate.com" target="_blank" >plastic crate manufacturer</a> <b>|</b>
							<a href="http://www.joinplastic.com" target="_blank" >folding plastic crate</a> <b>|</b>
							<a href="http://www.chinacrates.com" target="_blank" >plastic crate</a>
							<b>|</b>
							<a href="http://www.moving-dolly.com" target="_blank" >moving dolly</a>
							<b>|</b>
							<a href="http://www.qushengbox.com" target="_blank" >上海渠晟塑料有限公司</a>
							<b>|</b>
							<a href="http://www.jiajiubox.com" target="_blank" >上海周转箱</a>
							<b>|</b>
						</p>
					</div>
				</div>
		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
