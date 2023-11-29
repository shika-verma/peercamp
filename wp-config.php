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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'newnew' );

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
define( 'AUTH_KEY',         'R%)Gx3k4pXND_[$_FvP&z2D*~d$!+))Z;/.CeTc(>V}.5T_yl>G1` 4]M+X;{#]Q' );
define( 'SECURE_AUTH_KEY',  'L&qHb+(&.?}Fh*mx)Z^e:ZV)5>~8OJ%e|/uaz~Q<vdQX(mG!w)}[G[l,fKF)8H=h' );
define( 'LOGGED_IN_KEY',    '|tgm8m8huEIi>knKS4$[DMu4EHIrH8kf.oc.3a|65fX[>nB@h# /IJ22;k=k]./}' );
define( 'NONCE_KEY',        '5$z>[@W>{~5I_C]R{BQT|ee)JbtpFDNwr*%Y;DY*!z=.UUil&`=~IS+0#x#-CzS$' );
define( 'AUTH_SALT',        '~da]B|Hxpkj{(s8_w, boh*1KAT}_;6{tXU>)X:]4TYs&:#,Y$xOD}+/>xza+ahO' );
define( 'SECURE_AUTH_SALT', 'ZyK+Nn;!UFDqrTbCj| VJsW/w@2+M~ c~)~P)1E]7:AY>?$/CSaC5,U.s=u)JeO1' );
define( 'LOGGED_IN_SALT',   'v]I0tNbO#ta6n;t]/M86&q Fjq7nOM4|Ocd}eB4GVqJDtRrvF}CpNvQ#0;pQff6V' );
define( 'NONCE_SALT',       'o} Ld~Fv{unBs7kOQ0,Z]1g]>HgOT.EX&}eqD^k-bm6)la}6u5TbsZmQqC@#A=77' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wppp_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
