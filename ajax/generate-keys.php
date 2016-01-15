<?php 

$sync_options['api'] = array(
    'key' => wp_generate_password('16',true,false),
    'secret' => wp_generate_password('48',true,true),
);

update_option( 'smamo_blogsync', $sync_options);
$response['options'] = $sync_options;