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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'r51VJdb039Pu6Z4/arrFd2qaSd1bIFUFXw/aFKbAdlnqLRn4EHJU0LxnJIimjn2U9gVrrizjZEav3wNozR0FZw==');
define('SECURE_AUTH_KEY',  'bnOxjhzgXu8WOzk3fwTZfmSx0uL9wzFYXa2DDCBMlpl13u7BTzO0yjiyWZzg84uiOYTKiQv35CsCKxUFCVifIw==');
define('LOGGED_IN_KEY',    '2Vva8iNELgYIwu2cIDDqKLt8gRKWofiyrRhlgNLGaC7uc2lroEejKcPvDFEMuHQ1/kvybqoedEBvhbYYzXXwEw==');
define('NONCE_KEY',        'Z7MJrkz+3dRKLLfJ9ypM2Sq27frP1QiEa0nz7uVfdlFvbNFU/UdR8TCTAEowuChpiYsUJmBJL5/WrkNoF4FZJg==');
define('AUTH_SALT',        'sxqdCm0uvleA4CDTWlNQErjmUbJ4vC9XcGVJofKCqMhWmTl13QnJqiNMv6Ee/sN+tFLqWEX9D/JMdhkJIhr7ZA==');
define('SECURE_AUTH_SALT', 'yJACkHrT9/3mMhCn6w457h+KIrEuS82b9aWGEB/ohE+2HDapvXCdWJpN+BBEWOBsQ6bgl/t+uZ1+rP4xQrVcaQ==');
define('LOGGED_IN_SALT',   'X7UeSP2kfBk/1xlYQIYbizheyazIHuOkkhgnQpwwSTpva+8y5J/YvEPw5xcXUmp7Uc5BDlTrL3TqR6eD2LCgzg==');
define('NONCE_SALT',       'sfgV5ewC1Jd8kiuqrf+qW6Pql6s3VqBDBA0FWgXttq1qvsbNp2pIZqR/YxozHw0tSFiwcvZoei6Pd/Nnzx0aAQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
