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
define( 'DB_NAME', 'turmati' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'r! J1&/EB,lsa!w.ctRVG%Yge(I})XPWYoe17_OJvVZrZ_[[;LDg,YPzQ&8aM}Vg' );
define( 'SECURE_AUTH_KEY',  '$39-%f)O`Cf=y{hgMptc+7n? (_9e.TkO{9DQG[nb(AgKxo_sUnq{!bn/uz6I9Nu' );
define( 'LOGGED_IN_KEY',    'GeHT+OF#Hw.]i`gG.olKUg1.x{oeQ)~32s!R<}im/Jq9;]f)eu{,wJb^SxQj9K..' );
define( 'NONCE_KEY',        'Y{sy`5HN~cn#B9/7#q6Aah10|OxD<wQd;9@Wx1,bsw,w J.7TfekGMZ3 3R6;r<.' );
define( 'AUTH_SALT',        'sHX]!Db!r8l4]W]d?J#&1^CENBDRfgZ!XKE)<}s-.~i&NX|3uG^.k{7Te0c#ab01' );
define( 'SECURE_AUTH_SALT', 'OEnKG5^Z(UOdS_cP~RnCPo~B,=m|)OM%dALXE3{u`S@i]7;g]C*6{~&OJZX~Ipkl' );
define( 'LOGGED_IN_SALT',   'c*#)k[bYG%A+5kDzKjC{H7MA]|zS{_1.RNyzN<V4|HMK/&ZoBZ )RjOzP%?yOeJW' );
define( 'NONCE_SALT',       '|,8iJYgjCd/)_ppNG^Ay5Z;w0,[{&zX@(r8P!ukimM@=KKji#o/|y!bI&(;soJ4(' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
