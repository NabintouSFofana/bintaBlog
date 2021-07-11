<?php

define('FS_METHOD', 'direct');

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
define( 'DB_NAME', 'dbs1808133' );

/** MySQL database username */
define( 'DB_USER', 'dbu1487957' );

/** MySQL database password */
define( 'DB_PASSWORD', 'uiXlucvTQIGWqzmuXCPy' );

/** MySQL hostname */
define( 'DB_HOST', 'db5002241194.hosting-data.io' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          ';qsRSuq WaC4)=49vEV})*@XyR3qis;.(?Njt$U;| Q2R>{>3u6DT@MxOnzF9)!(' );
define( 'SECURE_AUTH_KEY',   ') 3I&/BF$Sd[yai>+Q{VFaF(dm+(O_IWdv68=nYAh2XY+cMHV*~HJFV3$PBV]Xep' );
define( 'LOGGED_IN_KEY',     'b7<4!+Uh9gafzetzI<OL8Mmm)UO(R#jM6lNRZ9$$+gb*:dO)DSwC=JUZ@)#V*]J;' );
define( 'NONCE_KEY',         '1^mcLA.VH*>}2[UFKy20$EO(/=E_EAhUQ(+KQf*MPj=!*~qH-|7GM< I/TVR<mRT' );
define( 'AUTH_SALT',         'lkhTDo6lB&8/X3M$w}?S+iB96=BH67aZI-`~*$,85mk*inWly/zsCU/__6sPwEE0' );
define( 'SECURE_AUTH_SALT',  'iwcBhgoa2CG_46*g3JKYej7rBGb>ylrC4xgho#$eZB4jq:)!j8Pzf]eT4q`8S^[i' );
define( 'LOGGED_IN_SALT',    'r)0<JLb?q~-V?5jn~U0ZZuP5kEyz;tUJ5ygqpId7MJ|}QT0}}VVeh/sGncWc4`j$' );
define( 'NONCE_SALT',        'vc:d@3O:sl/<A>a;6e44^6exSLu++Y*vCGQYoXfwbTkE<o^i`]hWPWvoywaK}cQ.' );
define( 'WP_CACHE_KEY_SALT', 'NBC.Dg`SAr=nz_U%es#!U%4{r4h)u6)`-d^_r?P.Lv<+&vTWSK[pi+7,Nl#.|=eR' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'DYkOiaPc';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
