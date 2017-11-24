<?php
////////////////////////////////////////////////////////////////////
// Setting theme options
//////////////////////////////////////////////////////////////////// 
include_once( trailingslashit( get_template_directory() ) . 'lib/plugin-activation.php' );
include_once( trailingslashit( get_template_directory() ) . 'lib/theme-config.php' );
include_once( trailingslashit( get_template_directory() ) . 'lib/include-kirki.php' );
include_once( trailingslashit( get_template_directory() ) . 'lib/customizer.php' );

add_action( 'after_setup_theme', 'giga_store_setup' );

if ( !function_exists( 'giga_store_setup' ) ) :

	function giga_store_setup() {

		// Theme lang
		load_theme_textdomain( 'giga-store', get_template_directory() . '/languages' );

		// Add Title Tag Support
		add_theme_support( 'title-tag' );

		add_theme_support( 'custom-logo', array(
			'height'		 => 100,
			'width'			 => 400,
			'flex-height'	 => true,
			'flex-width'	 => true,
		) );

		// Register Menus
		register_nav_menus(
		array(
			'top_menu'		 => __( 'Top Menu', 'giga-store' ),
			'main_menu'		 => __( 'Main Menu', 'giga-store' ),
			'footer_menu'	 => __( 'Footer Menu', 'giga-store' ),
		)
		);

		// Add support for a featured image and the size
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300, 300, true );
		add_image_size( 'giga-store-home', 400, 300, true );
		add_image_size( 'giga-store-square', 400, 400, true );
		add_image_size( 'giga-store-single', 1600, 400, true );
		
		// Add Custom Background Support
		$args = array(
			'default-color' => 'FFFFFF',
		);
		add_theme_support( 'custom-background', $args );

		// Adds RSS feed links to for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// WooCommerce support
		add_theme_support( 'woocommerce' );
		if ( get_theme_mod( 'woo_gallery_zoom', 0 ) == 1 ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}
		if ( get_theme_mod( 'woo_gallery_lightbox', 1 ) == 1 ) {
			add_theme_support( 'wc-product-gallery-lightbox' );
		}
		if ( get_theme_mod( 'woo_gallery_slider', 0 ) == 1 ) {
			add_theme_support( 'wc-product-gallery-slider' );
		}
	}

endif;

// Set Content Width
function giga_store_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'giga_store_content_width', 1170 );
}
add_action( 'after_setup_theme', 'giga_store_content_width', 0 );

////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////
function giga_store_theme_stylesheets() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.6' );
	wp_enqueue_style( 'giga-store-stylesheet', get_stylesheet_uri(), array(), '1.1.0', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '2.6.0' );
	wp_enqueue_style( 'of-canvas-menu', get_template_directory_uri() . '/css/jquery.mmenu.all.css', array(), '5.5.3' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.5.1' );
}

add_action( 'wp_enqueue_scripts', 'giga_store_theme_stylesheets' );

////////////////////////////////////////////////////////////////////
// Register Bootstrap JS with jquery
////////////////////////////////////////////////////////////////////
function giga_store_theme_js() {
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'giga-store-theme-js', get_template_directory_uri() . '/js/customscript.js', array( 'jquery', 'flexslider' ), '1.1.0', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.6.0', true );
	wp_enqueue_script( 'of-canvas-menu', get_template_directory_uri() . '/js/jquery.mmenu.min.all.js', array( 'jquery' ), '5.5.3', true );
}

add_action( 'wp_enqueue_scripts', 'giga_store_theme_js' );


////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

require_once( trailingslashit( get_template_directory() ) . 'lib/wp_bootstrap_navwalker.php' );

////////////////////////////////////////////////////////////////////
// Theme Info page
////////////////////////////////////////////////////////////////////

if ( is_admin() ) {
	require_once( trailingslashit( get_template_directory() ) . 'lib/theme-info.php' );
}

////////////////////////////////////////////////////////////////////
// Register the Sidebar(s)
////////////////////////////////////////////////////////////////////
add_action( 'widgets_init', 'giga_store_widgets_init' );

function giga_store_widgets_init() {
	register_sidebar(
	array(
		'name'			 => __( 'Right Sidebar', 'giga-store' ),
		'id'			 => 'giga-store-right-sidebar',
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	) );

	register_sidebar(
	array(
		'name'			 => __( 'Left Sidebar', 'giga-store' ),
		'id'			 => 'giga-store-left-sidebar',
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	) );

	register_sidebar(
	array(
		'name'			 => __( 'Footer Section', 'giga-store' ),
		'id'			 => 'giga-store-footer-area',
		'description'	 => __( 'Content Footer Section', 'giga-store' ),
		'before_widget'	 => '<div id="%1$s" class="widget %2$s col-md-3"><div class="widget-inner">',
		'after_widget'	 => '</div></div>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	) );
}

////////////////////////////////////////////////////////////////////
// Register hook and action to set Main content area col-md- width based on sidebar declarations
////////////////////////////////////////////////////////////////////

add_action( 'giga_store_main_content_width_hook', 'giga_store_main_content_width_columns' );

function giga_store_main_content_width_columns() {

	$columns = '12';

	if ( get_theme_mod( 'rigth-sidebar-check', 1 ) != 0 ) {
		$columns = $columns - absint( get_theme_mod( 'right-sidebar-size', 3 ) );
	}

	if ( get_theme_mod( 'left-sidebar-check', 0 ) != 0 ) {
		$columns = $columns - absint( get_theme_mod( 'left-sidebar-size', 3 ) );
	}

	echo absint( $columns );
}

////////////////////////////////////////////////////////////////////
// Social links
////////////////////////////////////////////////////////////////////
if ( !function_exists( 'giga_store_social_links' ) ) :

	function giga_store_social_links() {
		$twp_social_links	 = array(
			'facebook'		 => esc_html__( 'Facebook', 'giga-store' ),
			'twitter'		 => esc_html__( 'Twitter', 'giga-store' ),
			'google-plus'	 => esc_html__( 'Google-Plus', 'giga-store' ),
			'instagram'		 => esc_html__( 'Instagram', 'giga-store' ),
			'pinterest-p'	 => esc_html__( 'Pinterest', 'giga-store' ),
			'youtube'		 => esc_html__( 'YouTube', 'giga-store' ),
			'reddit'		 => esc_html__( 'Reddit', 'giga-store' ),
			'linkedin'		 => esc_html__( 'LinkedIn', 'giga-store' ),
			'vimeo'			 => esc_html__( 'Vimeo', 'giga-store' ),
			'envelope-o'	 => esc_html__( 'Email', 'giga-store' ),
		);
		?>
		<div class="social-links">
			<ul>
				<?php
				$i					 = 0;
				$twp_links_output	 = '';
				foreach ( $twp_social_links as $key => $value ) {
					$link = get_theme_mod( $key, '' );
					if ( !empty( $link ) ) {
						$twp_links_output .=
						'<li><a href="' . esc_url( $link ) . '" title="' . esc_attr( $value ) . '" target="_blank"><i class="fa fa-' . strtolower( $key ) . '"></i></a></li>';
					}
					$i++;
				}
				echo $twp_links_output;
				?>
			</ul>
		</div><!-- .social-links -->
		<?php
	}

endif;

////////////////////////////////////////////////////////////////////
// Excerpt functions
////////////////////////////////////////////////////////////////////
function giga_store_excerpt_length( $length ) {
	return 20;
}

add_filter( 'excerpt_length', 'giga_store_excerpt_length', 999 );

function giga_store_excerpt_more( $more ) {
	return '&hellip;';
}

add_filter( 'excerpt_more', 'giga_store_excerpt_more' );

////////////////////////////////////////////////////////////////////
// Comment style
////////////////////////////////////////////////////////////////////
function giga_store_comment_text( $content ) {
    return "<div class=\"comment-inner\">" . $content . "</div>";
}
add_filter( 'comment_text', 'giga_store_comment_text', 1000 );

////////////////////////////////////////////////////////////////////
// WooCommerce section
////////////////////////////////////////////////////////////////////
if ( class_exists( 'WooCommerce' ) ) {

////////////////////////////////////////////////////////////////////
// WooCommerce header cart
////////////////////////////////////////////////////////////////////
	if ( !function_exists( 'giga_store_cart_link' ) ) {

		function giga_store_cart_link() {
			?>	
			<a class="cart-contents text-right" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'giga-store' ); ?>">
				<i class="fa fa-shopping-cart"><span class="count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span></i><div class="amount-title"><?php echo esc_html_e( 'Cart ', 'giga-store' ); ?></div><div class="amount-cart"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></div> 
			</a>
			<?php
		}

	}
	if ( !function_exists( 'giga_store_head_wishlist' ) ) {

		function giga_store_head_wishlist() {
			if ( function_exists( 'YITH_WCWL' ) ) {
				$wishlist_url = YITH_WCWL()->get_wishlist_url();
				?>
				<div class="top-wishlist text-right">
					<a href="<?php echo esc_url( $wishlist_url ); ?>" title="<?php esc_html_e( 'Wishlist', 'giga-store' ); ?>" data-toggle="tooltip" data-placement="top">
						<div class="fa fa-heart"><div class="count"><span><?php echo absint( yith_wcwl_count_products() ); ?></span></div></div>
					</a>
				</div>
				<?php
			}
		}

	}
	add_action( 'wp_ajax_yith_wcwl_update_single_product_list', 'giga_store_head_wishlist' );
	add_action( 'wp_ajax_nopriv_yith_wcwl_update_single_product_list', 'giga_store_head_wishlist' );

	if ( !function_exists( 'giga_store_header_cart' ) ) {

		function giga_store_header_cart() {
			?>
			<div class="header-cart text-right col-sm-5 text-center-sm text-center-xs no-gutter">
				<div class="header-cart-block">
					<div class="header-cart-inner">
						<?php giga_store_cart_link(); ?>
						<ul class="site-header-cart menu list-unstyled">
							<li>
								<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
							</li>
						</ul>
					</div>
					<?php
					if ( get_theme_mod( 'wishlist-top-icon', 0 ) != 0 ) {
						giga_store_head_wishlist();
					}
					?>
				</div>
			</div>
			<?php
		}

	}
	if ( ! function_exists( 'giga_store_header_add_to_cart_fragment' ) ) {
		add_filter( 'woocommerce_add_to_cart_fragments', 'giga_store_header_add_to_cart_fragment' );

		function giga_store_header_add_to_cart_fragment( $fragments ) {
			ob_start();

			giga_store_cart_link();

			$fragments[ 'a.cart-contents' ] = ob_get_clean();

			return $fragments;
		}
	}
	
	add_filter( 'loop_shop_columns', 'giga_store_loop_columns' );
	
	if ( !function_exists( 'giga_store_loop_columns' ) ) {

		function giga_store_loop_columns() {
			return absint( get_theme_mod( 'archive_number_columns', 4 ) );
		}

	}
	
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . absint( get_theme_mod( 'archive_number_products', 24 ) ) . ';' ), 20 );
	
	// WooCommerce Breadcrumbs Styling.
	add_filter( 'woocommerce_breadcrumb_defaults', 'giga_store_custom_breadcrumb' );
	function giga_store_custom_breadcrumb() {
		return array(
				'delimiter'   => ' &raquo; ',
				'wrap_before' => '<div id="breadcrumbs" ><div class="breadcrumbs-inner container text-left"><i class="fa fa-home" aria-hidden="true"></i>',
				'wrap_after'  => '</div></div>',
				'before'      => '',
				'after'       => '',
				'home'        => esc_html_x( 'Home', 'breadcrumb', 'giga-store' ),
			);
	}
	
}

//去掉loop 产品的title  得到用 get_the_title()
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
//去掉loop 产品的购物车
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
//去掉loop 产品的价格
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

add_action( 'woocommerce_shop_loop_product_attr', 'woocommerce_template_loop_product_attr', 10 );


//加上 single product pag custom attr
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_custom_attr', 6 );
if ( ! function_exists( 'woocommerce_template_custom_attr' ) ) {

	/**
	 * Output the product title.
	 *
	 * @subpackage	Product
	 */
	function woocommerce_template_custom_attr() {
		wc_get_template( 'single-product/custom-attr.php' );
	}
}

if ( ! function_exists( 'woocommerce_template_single_title' ) ) {

	/**
	 * Output the product title.
	 *
	 * @subpackage	Product
	 */
	function woocommerce_template_single_title() {
		wc_get_template( 'single-product/title.php' );
	}
}



if ( ! function_exists( 'woocommerce_template_loop_product_attr' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_attr() {
		$productlenght = get_field('productlenght');
		$productwidth = get_field('productwidth');
		$productheight = get_field('productheight');
		$productinnerlength = get_field('productinnerlength');
		$productinnerwidth = get_field('productinnerwidth');
		$productinnerheight = get_field('productinnerheight');
		$productweight = get_field('productweight');
		$productvolumn = get_field('productvolumn');
		$productmodel = get_field('productmodel');
		$mmtoinch = 0.03937;
		$kgtolbs = 2.20462262;
		$ltogal = 0.26417;
		
		if (!$productmodel) {
		    $productmodel = "N/A";
		}

		

		echo '	<div class="product-right"> 
					<div class="row no-gutters"> 
						<div class="product-name">
							<div class="col-sm-12">
								<h2 class="product-title pl-1">'. get_the_title() .'</h2>
								<span class="btn btn-danger pull-right product-cat-inquiry">Inquiry</span>
								<span class="btn btn-info pull-right product-model mr-1">'. $productmodel .'</span>
							</div>
						</div>
						<div class="product-attributes">
							<div class="col-sm-3 col-xs-6 br-2-white external-dimension">
								<div class="table-head bb-2-white">External Dimensions</div>
								<div class="product-val-mm"><span class="value">' .$productlenght .'X'. $productwidth  .'X'. $productheight . '</span> <span class="pull-right">mm</span></div>
								<div class="product-val-inch"><span class="value"> '. round($productlenght*$mmtoinch,2) .'X'.round($productwidth*$mmtoinch,2) .'X'. round($productheight*$mmtoinch,2) .'</span> <span class="pull-right">in</span></div>
							</div>
							<div class="col-sm-3 col-xs-6 br-2-white internal-dimension hidden-xs">
								<div class="table-head bb-2-white">Internal Dimensions</div>
								<div class="product-val-mm"><span class="value">'. $productinnerlength .'X'. $productinnerwidth .'X'. $productinnerheight .'</span> <span class="pull-right">mm</span></div>
								<div class="product-val-inch"><span class="value">'. round($productinnerlength*$mmtoinch,2) .'X'. round($productinnerwidth*$mmtoinch,2) .'X'. round($productinnerheight*$mmtoinch,2) .'</span> <span class="pull-right">in</span></div>
							</div>
							<div class="col-sm-3 col-xs-6 br-2-white weight hidden-xs">
								<div class="table-head bb-2-white">Weight</div>
								<div class="product-val-mm"><span class="value">'. $productweight . '</span> <span class="pull-right">kg</span></div>
								<div class="product-val-inch"><span class="value">'. round($productweight*$kgtolbs,2) .'</span> <span class="pull-right">lbs</span></div>
							</div>
							<div class="col-sm-3 col-xs-6 volumn">
								<div class="table-head bb-2-white">Volume</div>
								<div class="product-val-mm"><span class="value">'. $productvolumn . '</span> <span class="pull-right">Liters</span></div>
								<div class="product-val-inch"><span class="value">'. round($productvolumn*$ltogal,2) .'</span> <span class="pull-right">Us gallon</span></div>
							</div>
						</div>
					</div>
				</div>';
	}
}

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open_custom', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close_custom', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail_custom', 10 );


if ( ! function_exists( 'woocommerce_template_loop_product_link_open_custom' ) ) {

	/**
	 * Insert the opening anchor tag for products in the loop.
	 *
	 * @subpackage	Archives
	 */
	function woocommerce_template_loop_product_link_open_custom() {
		echo '<a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><div class="product-wrap">';
	}
}

if ( ! function_exists( 'woocommerce_template_loop_product_link_close_custom' ) ) {

	/**
	 * Insert the opening anchor tag for products in the loop.
	 *
	 * @subpackage	Archives
	 */
	function woocommerce_template_loop_product_link_close_custom() {
		echo '</div></a>';
	}
}


if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail_custom' ) ) {

	/**
	 * Get the product thumbnail for the loop.
	 *
	 * @subpackage	Loop
	 */
	function woocommerce_template_loop_product_thumbnail_custom() {
		echo '<div class="product-img-wrap br-2-white">'. woocommerce_get_product_thumbnail() .'</div>';
	}
}

//make description text of each catogory appear after products loop

if ( ! function_exists( 'woocommerce_content' ) ) {

	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template.
	 * which people can add to their themes to add basic woocommerce support.
	 * without hooks or modifying core templates.
	 *
	 */
	function woocommerce_content() {

		if ( is_singular( 'product' ) ) {

			while ( have_posts() ) : the_post();

				wc_get_template_part( 'content', 'single-product' );

			endwhile;

		} else { ?>

			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

				<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

			<?php endif; ?>

			

			<?php if ( have_posts() ) : ?>

				<?php do_action( 'woocommerce_before_shop_loop' ); ?>

				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php do_action( 'woocommerce_after_shop_loop' ); ?>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php do_action( 'woocommerce_no_products_found' ); ?>

			<?php endif; ?>
			
			<?php do_action( 'woocommerce_archive_description' ); 

		}
	}
}