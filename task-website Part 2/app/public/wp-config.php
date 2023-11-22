<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'U@-S]q^>&G:>|/ a,Gl*0(p|ICR13~G>WK8}L1uauiaM,ig0 -E)qIV<Ouo0~nFG' );
define( 'SECURE_AUTH_KEY',   '8Y?%v49|ApH`+!&(u/X6:-?3UngX YW.3e9PiKs|C*NnN^ <JK,KTdoJQ}qohD;j' );
define( 'LOGGED_IN_KEY',     '!m>O m;a|L|3@}1KV(joz[pMc5P/8/SxPA3AiqgpS(vCBwEPLgpn=>1./a5T4:>@' );
define( 'NONCE_KEY',         'Bbfmk0T*T-I$5-3xg`mmNMlr}Cpbb}SlKBA8xmSf)QJID!:q}[w2mXT<efo=Vb (' );
define( 'AUTH_SALT',         '*w76I!LT4?bNh< (j/VmR*cZq!Q2d0ahDNs61q.4~*NLMMags*7X{h1IU})o/LV7' );
define( 'SECURE_AUTH_SALT',  '!}$w{WmCJ*!*<^cD(pbAs]2gHR36PnxODuqn^&P[vIPBmxwM@p)CEj&QU902!y2K' );
define( 'LOGGED_IN_SALT',    '7?9XZ0^^B`?U19&C:7-8<Z|,]9XUSM?ZHvbP0knW{Kunm(<V5A5LRvmiAvBWFWhW' );
define( 'NONCE_SALT',        'r2;Y+9%3<La0%h-%D}<8rD> *F2gO.}{Z/:o8hT4Uw*kV%`<%7a1/kD/&$<MAfXT' );
define( 'WP_CACHE_KEY_SALT', '&v$H1|m<_;[ks+Wf7737 6wuyF/m<^OmB)mAt/<h|?SQJMcZdxo?bu~)W* ;RcUJ' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
