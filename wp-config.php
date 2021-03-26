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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpgadorbd' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'k%Kybf4jwaqhJ[^~1Hg(8 |W9^l1_!vkLH<80Fb5 ~8aKt.UsR@-tRLaxonn6l{C' );
define( 'SECURE_AUTH_KEY',  'x`a =|Zk{dUJ]r7b:Rw(MkJ: y~M/193m_f=VCc+p}yF<TXGB[UZhNlsq?,F[hn`' );
define( 'LOGGED_IN_KEY',    '?9lJ2R2W[0gH{}cM<Te{{g./onb2dwUXIauuR%l$j_.:3txjr`h|l:@Z-Gy2dkFr' );
define( 'NONCE_KEY',        ')PA=wVE5ZRw]vgwH7|uF*b^[>yvIr+LjyOZ)<j[Tz&2AxmJbjzy*ly+@UTB2(XY2' );
define( 'AUTH_SALT',        'OEZ9$hV5zD@>M?|m(F:gl]}fv>N3U%/AKL$UL`)Hks-_%UuD1/aR1Lj/<J{UWJ1G' );
define( 'SECURE_AUTH_SALT', 'shhc syF-R-<+(>Gh[&N0/7=giG2k0&.rEW~tn/R`+ZXNll]qtNx#$Ljva4.n7 ;' );
define( 'LOGGED_IN_SALT',   'z_!%dm151[C`ia!.Xd8#D<_vx?>qqJ*$AGNygfcjdB0Z>h7m<X_SUT;zavV5h-@p' );
define( 'NONCE_SALT',       '+MD+D;w4H.~|{nz9)NK[jb7#_n<tz:QOXojI+r`!3l0%{CUO]{=yrVqA3(KwV{[?' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
