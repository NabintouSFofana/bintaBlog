<?php

    /*
     *    === Define the Path ===
    */
    defined('CARRIE_IPANEL_PATH') ||

        define( 'CARRIE_IPANEL_PATH' , get_template_directory() . '/ipanel/' );

    /*
     *    === Define the Version of iPanel ===
    */
    define( 'CARRIE_IPANEL_VERSION' , '1.1' );



    /*
     *    === Define the Classes Path ===
    */
    if ( defined('CARRIE_IPANEL_PATH') ) {
        define( 'CARRIE_IPANEL_CLASSES_PATH' , CARRIE_IPANEL_PATH . 'classes/' );
    } else {

        define( 'CARRIE_IPANEL_CLASSES_PATH' , get_template_directory() . '/ipanel/classes/' );
    }

    function carrie_iPanelLoad(){
        require_once CARRIE_IPANEL_CLASSES_PATH . 'ipanel.class.php';
		if( file_exists(CARRIE_IPANEL_PATH . 'options.php') )
			require_once CARRIE_IPANEL_PATH . 'options.php';
    }

    if ( defined('CARRIE_IPANEL_PLUGIN_USAGE') ) {
        if ( CARRIE_IPANEL_PLUGIN_USAGE === true ) {
            add_action('plugins_loaded', 'carrie_iPanelLoad');
        } else {
            add_action('init', 'carrie_iPanelLoad');
        }
    } else {
        add_action('init', 'carrie_iPanelLoad');
    }
