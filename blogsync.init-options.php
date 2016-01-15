<?php 

add_action('init','smamo_blogsync_initoptions');
function smamo_blogsync_initoptions(){
    
    if (!get_option('smamo_blogsync')){
     
        $sync_options = array(
        
            'api' => array(
                'key' => wp_generate_password('16',true,false),
                'secret' => wp_generate_password('48',true,true),
            ),
            
            'sync' => array(),
            
        );
        
        update_option( 'smamo_blogsync', $sync_options);
    }
}