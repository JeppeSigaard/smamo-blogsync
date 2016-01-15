<?php


add_action( 'wp_ajax_smamo_blogsync_ajax', 'smamo_blogsync_ajax' );
add_action( 'wp_ajax_nopriv_smamo_blogsync_ajax', 'smamo_blogsync_ajax' );

function smamo_blogsync_ajax(){
    
    // forbered $response og hent $sync_options 
    $response = array();
    $sync_options = get_option('smamo_blogsync');
    
    // Afbryd hvius funktion mangler
    if (!isset($_POST['function'])){
        $response['error'] = 'Please specify a function';
        wp_die(json_encode($response));
    }
    
    // Afbryd hvis key mangler
    if(!isset($_POST['key']) || $_POST['key'] !== $sync_options['api']['key']){
        $response['error'] = 'Please specify a valid key';
        wp_die(json_encode($response));
    }
    
    // Hent den krævede funktion
    require_once plugin_dir_path( __FILE__ ) . 'ajax/'.esc_attr($_POST['function']).'.php';    
    
    // returner $response
    wp_die(json_encode($response));
    
}