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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/5atN*&d?UDb>+oo@8I8P6*ac9|tdNcSB#$VYo_a+VndQ?xeuqY*R7,@xu^b+Jzv');
define('SECURE_AUTH_KEY',  'EH,$:<N#5,)n~vQ$ThQ}Vs~gUlr:b4lTK?b4vIdu+jIK|65PsMi2*[_ N!]q-DIR');
define('LOGGED_IN_KEY',    'q:-zr<A-Xc?s%Xow!]`|-mk+qWp=b3HT%N].&b*)ZFq:Au<Dm)B4!~qkVP!Jy0nx');
define('NONCE_KEY',        'i_,PZ=)t`YOh5wd>V3/t65u(ED!Mz1{`eR%@Ys&Z3S~S%(RT,P%l]S7:+>F*[-wl');
define('AUTH_SALT',        'Baz~oz@t3jMj]o`?{Ht+CV~fScdy| .9eZ *n2+WymwQypm!&x]v|r9!=Y#tTvdf');
define('SECURE_AUTH_SALT', '-*REUYeX<8aroQQkjCLV-K|O-^9o9r6D/AkMyDc-zEUc;&H7A,*}FJrC-;D|/P<7');
define('LOGGED_IN_SALT',   'j&o5*hi7]wF7&hnoGlF@ _#t^RX4o+A|zg<`$rOl*,dq&.~e8Zfxwq(*8Y@~`azh');
define('NONCE_SALT',       '`V<c11)Q9xBrZzvb=-PP9xl}+qDU0Y%0W?aR-b#cv-W3eymOqD%&{5^2d*3)s`(W');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
