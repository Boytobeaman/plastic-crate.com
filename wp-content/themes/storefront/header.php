<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<meta name="yandex-verification" content="4001ef6415331fa6" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="/css/bootstrap4.min.css">
<script src="/js/jquery.min.js"></script>
<script src="/js/tether.min.js"></script>
<script src="/js/bootstrap4.min.js"></script>
<script src="/js/customize.js"></script>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<!-- google analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76091789-3', 'auto');
  ga('send', 'pageview');

</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2556371792604486",
    enable_page_level_ads: true
  });
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php
	do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
		<div class="col-full">
			<div class="container-fluid">
				<div class="row">
					<?php
					/**
					 * Functions hooked into storefront_header action
					 *
					 * @hooked storefront_skip_links                       - 0
					 * @hooked storefront_social_icons                     - 10
					 * @hooked storefront_site_branding                    - 20
					 * @hooked storefront_secondary_navigation             - 30
					 * @hooked storefront_product_search                   - 40
					 * @hooked storefront_primary_navigation_wrapper       - 42
					 * @hooked storefront_primary_navigation               - 50
					 * @hooked storefront_header_cart                      - 60
					 * @hooked storefront_primary_navigation_wrapper_close - 68
					 */
					do_action( 'storefront_header' ); ?>
				</div><!--.row-->
			</div><!-- .container -->
		</div><!-- .col-full -->
	</header><!-- #masthead -->
	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * Functions hooked in to storefront_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' );
