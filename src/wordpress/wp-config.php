<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME') );

/** Database username */
define( 'DB_USER', getenv('WORDPRESS_DB_USER') );

/** Database password */
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') );

/** Database hostname */
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', 'utf8mb4_unicode_ci' );

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
define( 'AUTH_KEY',         '26ad9e3b-7a91-4dc1-8728-204b21478a79' );
define( 'SECURE_AUTH_KEY',  '956443c4-1b18-4263-97c1-d1c38f5a9e2d' );
define( 'LOGGED_IN_KEY',    '931fbca5-d0e6-46a4-a2cb-581d30686500' );
define( 'NONCE_KEY',        'aea0caf4-2070-412f-b2d7-cbacab13e507' );
define( 'AUTH_SALT',        'a3d653d5-5878-4c50-96eb-121ca8eff1cd' );
define( 'SECURE_AUTH_SALT', 'ec938814-73b4-4c84-a2d5-96630edf8127' );
define( 'LOGGED_IN_SALT',   'f0f4e9d4-46aa-4ed5-93e9-2c1055204d27' );
define( 'NONCE_SALT',       '35e06798-ab37-479e-b8ba-97cc9b05ff23' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', !!getenv('WORDPRESS_DEBUG') );
if ( WP_DEBUG ) {
	define( 'WP_DEBUG_DISPLAY', true );
}

error_log('----------------------------------------------');
error_log('DB_NAME: ' . DB_NAME);
error_log('DB_USER: ' . DB_USER);
error_log('DB_HOST: ' . DB_HOST);
error_log('WP_DEBUG: ' . WP_DEBUG);
error_log('----------------------------------------------');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
