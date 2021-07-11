<?php

    /*
     *    === Define the Path ===
    */
    defined('CAMILLE_IPANEL_PATH') ||

        define( 'CAMILLE_IPANEL_PATH' , get_template_directory() . '/ipanel/' );

    /*
     *    === Define the Version of iPanel ===
    */
    define( 'CAMILLE_IPANEL_VERSION' , '1.1' );



    /*
     *    === Define the Classes Path ===
    */
    if ( defined('CAMILLE_IPANEL_PATH') ) {
        define( 'CAMILLE_IPANEL_CLASSES_PATH' , CAMILLE_IPANEL_PATH . 'classes/' );
    } else {

        define( 'CAMILLE_IPANEL_CLASSES_PATH' , get_template_directory() . '/ipanel/classes/' );
    }

    function iPanelLoad(){
        require_once CAMILLE_IPANEL_CLASSES_PATH . 'ipanel.class.php';
		if( file_exists(CAMILLE_IPANEL_PATH . 'options.php') )
			require_once CAMILLE_IPANEL_PATH . 'options.php';
    }

    if ( defined('CAMILLE_IPANEL_PLUGIN_USAGE') ) {
        if ( CAMILLE_IPANEL_PLUGIN_USAGE === true ) {
            add_action('plugins_loaded', 'iPanelLoad');
        } else {
            add_action('init', 'iPanelLoad');
        }
    } else {
        add_action('init', 'iPanelLoad');
    }
