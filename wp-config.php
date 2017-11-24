<?php

/**

 * The base configuration for WordPress

 *

 * The wp-config.php creation script uses this file during the

 * installation. You don't have to use the web site, you can

 * copy this file to "wp-config.php" and fill in the values.

 *

 * This file contains the following configurations:

 *

 * * MySQL settings

 * * Secret keys

 * * Database table prefix

 * * ABSPATH

 *

 * @link https://codex.wordpress.org/Editing_wp-config.php

 *

 * @package WordPress

 */



// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/data/wwwroot/www.plastic-crate.com/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'plastic_crate_com');



/** MySQL database username */

define('DB_USER', 'root');



/** MySQL database password */

define('DB_PASSWORD', 'LU5541118');



/** MySQL hostname */

define('DB_HOST', 'localhost');



/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8mb4');



/** The Database Collate type. Don't change this if in doubt. */

define('DB_COLLATE', '');



/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define('AUTH_KEY',         '7jw48+!2RB__Kyhh}y7hF 188l.@]M}S:;@kSmh_j>l][T*g*&|yw/(_ee!mC|k:');

define('SECURE_AUTH_KEY',  '99)8(m)x>(A; N3i3KJ>0A9H3ItF<?9ZpAee+xNs^0CiHx<#3Y:Q9JA+F;FbE`p<');

define('LOGGED_IN_KEY',    '~e)Id;? <Gwq7plIL(aH:sC(l$i{ps0.,20*c@>GSF~<n4v<i-4GQZZHCe2=/Uy4');

define('NONCE_KEY',        'CnX<HvW[Wv)YqOb|a>M1<*%3yI!~FR#*X_k==~`^5T4jUX,61P<An=[3W;.j>^O<');

define('AUTH_SALT',        ' _>(!+h^DH+iXRcDdT/b{Iy>?Wk;HWO$YY-!$I53g>jd`k|m~)~t/Qc#MwJ^)<!O');

define('SECURE_AUTH_SALT', '#Jxe)%+^8S~Xn~|6P-yYgVf*U,?$Kfp!$7!1`I]eoy2:1_-FI[XXm}o(Q{|53E7s');

define('LOGGED_IN_SALT',   '_<TZ u#|-Z$~D.[<?_1VgPX}>3@W)!lwNgP4X= J*jkMYG~.+[CN5F^`=]V~l;3Z');

define('NONCE_SALT',       'V={;YT%xsL,qIfXAD|wj01,N_O1HvsaA;+x9,}7KW.jS]wyzro-f88%#5;%7Xyj>');



/**#@-*/



/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'wp_';



/**

 * For developers: WordPress debugging mode.

 *

 * Change this to true to enable the display of notices during development.

 * It is strongly recommended that plugin and theme developers use WP_DEBUG

 * in their development environments.

 *

 * For information on other constants that can be used for debugging,

 * visit the Codex.

 *

 * @link https://codex.wordpress.org/Debugging_in_WordPress

 */

define('WP_DEBUG', false);



/* That's all, stop editing! Happy blogging. */



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

