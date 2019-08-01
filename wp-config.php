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
define( 'DB_NAME', 'compro_kplemigas' );

/** MySQL database username */
define( 'DB_USER', 'ksp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password123' );

/** MySQL hostname */
define( 'DB_HOST', '103.87.160.225' );

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
define( 'AUTH_KEY',         'h1BXgm~]WAC:dgtCRMh(1 2<{N2>a|y#YaAEW3wV;RAnqDqe,=[1gO<yYRl#OX|j' );
define( 'SECURE_AUTH_KEY',  'oJw@mXyeb/6@KG;| +}<2Wy9gE@ZL31:_N2FA$=&P-bM(G-26|z}|njm s[s>k_i' );
define( 'LOGGED_IN_KEY',    'U[c]7` BM7UN 3UNH^(#,/cs4e[U_9(Whi [ 0@//:&-Rn:5ivD-5HEo?|*SMSOO' );
define( 'NONCE_KEY',        'a-IdkI*hE$8I2#U#{{P.6It^./d]Z?K,WEY~0exurz_Ii`$o-W[-0S)Gl`JsHE*R' );
define( 'AUTH_SALT',        '/0d_&mB{@/zU}O]Ee<X^QBv1XLAW]veZI=~MQ>,N@L,=dL/E~]X7HCpU=hRnx4:2' );
define( 'SECURE_AUTH_SALT', '3K]g!FW72MV/|Mrj5wtV#@/Z2$)j-b5,=Ky2L}L5YaA9JKOhj$9EB6i(VOWZ?MT6' );
define( 'LOGGED_IN_SALT',   'Q:Z0aBqAL7N=L3rKCgAX*~C@w) &Sk<B}{c!3<msn$uU!dyz3k#S{uv!Z|Y87[Aq' );
define( 'NONCE_SALT',       'DYf4)8N1R2A>-zk,pSAhY2SuXmt_w?go!TJbuA-($R;OdFHN5WC3j5PSo>6XS,$u' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kpl_';

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
