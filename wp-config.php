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


if(strstr($_SERVER['SERVER_NAME'], 'localhost')){
	/** The name of the database for WordPress */
define( 'DB_NAME', 'satnam_ngo' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
}
else{ 
	define( 'DB_NAME', 'db9hyw5cgqk8mc');
	define( 'DB_USER', 'u2ahnw9xfjqmx');
	define( 'DB_PASSWORD', 'r3)~)l57e1^3');
	define( 'DB_HOST', '127.0.0.1' );
}

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
define( 'AUTH_KEY',         '2h,L;`E%?y|tz$=%Q6JW)ln_uDyrh{n59&7Yu]~+!+$ArjeR@v6Vp+T}z9]N]:F,' );
define( 'SECURE_AUTH_KEY',  '$| /<t91T?2{dW}j43|g@U0xqjnsQ3FCG*y+n15cr5h.1nG~[F&H{r9CYD[fDQFO' );
define( 'LOGGED_IN_KEY',    'p,Q~0uO^)|;wn `;%6jZ)W/7P`HRK+%k[pRVkLSO!xsrF NC?%e{/=rwICs/dai3' );
define( 'NONCE_KEY',        'k7EG/tl#Nl0q!0`T8M(DvM]q+>$E0cuc$}J(lU`W;h]&[78CRMJ<GF?+}p.$sJ2p' );
define( 'AUTH_SALT',        'gSMZ^lG.SKv3WP)qrWcauuEqdd{{1wrl-M2K[q B}ie5Y7(];^-r^B}y! I6Vm&Q' );
define( 'SECURE_AUTH_SALT', 'JC4,?,>FX;_=Ry~{AP*CCKwBT0n_UUcZr9c&OFM<)aAboE1B=kf0Q;pqUqWszob=' );
define( 'LOGGED_IN_SALT',   '=_ag1g~c-lS#ZYU=w9`~hm{w4:P*SGhz%u>cQ?g )#=e7n-{jyJJ_,MW%cUI!`iy' );
define( 'NONCE_SALT',       'g.0_PjV`.9Ezq{iO>ZqB0 ZEMCi^R9NCfNm{>@!p_23]efLq/Ta[$a-6-e_6P+Rs' );

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
