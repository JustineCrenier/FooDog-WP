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
define('DB_NAME', 'foodog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:8889');

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
define('AUTH_KEY',         '.]hckAA`[Y~cm@21bymjeegI=e<?zvf[PBZ*G$Gujm@/R<iu.j:[-l+^CLwnb17r');
define('SECURE_AUTH_KEY',  '$VwOZzQ>zxFcc}`uel]9.&Ld]~mA$^m?i>N8sRTS`S5w2Y07R[vh^@9rdM]V?7IW');
define('LOGGED_IN_KEY',    'Ho.eK143&][u$=] KWZ4T&FWS{41NsTlw#eP$@!=658|R9fQe9{<LO,=qZYnfNeo');
define('NONCE_KEY',        'QV?]FfNaS5|ZLHA,p/um*0^cA&v6)Sbh3JiEdXnQ0*SJXrQ0&,_%f~,U<RrF(TnM');
define('AUTH_SALT',        'L6f5G+w)?Hw(<!l7:Q$u59<FZZHvCbIpmZ~+^]1oK~D)]#19 =B/5l(2HYKa5EN~');
define('SECURE_AUTH_SALT', '%$GQO9>!*+STL;:q0By?v$)ZP`r{EN!)89f^<Hz}![XP=nkl$(#eeh7.`O|LvI(b');
define('LOGGED_IN_SALT',   '&Ana2_ts%&SrGtgctly~0UDx]$F^!IBFa5B9a2GB}lG1}f;!m5xQpjk(vEf-x]3D');
define('NONCE_SALT',       'bSol)DO]~`,EE@}a^-?3Ku.RxvBHg)Rm<,7Y9{x-0umjGzETU*LfKyNr:~AwFw^~');

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
