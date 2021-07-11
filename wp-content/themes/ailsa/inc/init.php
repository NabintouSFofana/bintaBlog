<?php
/*
 * All Ailsa Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/* Theme All Basic Setup */
require_once( AILSA_FRAMEWORK . '/theme-support.php' );
require_once( AILSA_FRAMEWORK . '/backend-functions.php' );
require_once( AILSA_FRAMEWORK . '/frontend-functions.php' );
require_once( AILSA_FRAMEWORK . '/enqueue-files.php' );
require_once( AILSA_CS_FRAMEWORK . '/custom-style.php' );
require_once( AILSA_CS_FRAMEWORK . '/config.php' );

/* Bootstrap Menu Walker */
require_once( AILSA_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( AILSA_FRAMEWORK . '/plugins/notify/activation.php' );

/* Aqua Resizer */
$img_resizer = cs_get_option('theme_img_resizer');
if(!$img_resizer) {
	require_once( AILSA_FRAMEWORK . '/plugins/aq_resizer.php' );
}

/* Sidebars */
require_once( AILSA_FRAMEWORK . '/core/sidebars.php' );