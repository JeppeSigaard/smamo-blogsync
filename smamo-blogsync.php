<?php 

/*
    Plugin name: Blog Syncer
    PLugin URI: https://github.com/JeppeSigaard/smamo-blogsync
    Description: Synkroniser indlæg mellem flere WordPress installationer. 
    Version: 1.0.0
    Author: SmartMonkey
    Author URI: http://smartmonkey.dk  
*/


// Hent alle vores .php dokumenter i roden
foreach ( glob( plugin_dir_path( __FILE__ ) . "*.php" ) as $file ) {
    require_once $file;
}