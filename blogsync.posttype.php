<?php 

add_action( 'init', 'smamo_add_blogsync_posts' );

function smamo_add_blogsync_posts() {
	register_post_type( 'sync', array(
		
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'artikler' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 9,
		'supports'           => array( 'title', 'thumbnail', 'editor', 'excerpt', 'author', 'comments'),
        'labels'             => array(
            
            'name'               => _x( 'Synkroniserede indlæg', 'post type general name', 'smamo' ),
            'singular_name'      => _x( 'Synkroniseret indlæg', 'post type singular name', 'smamo' ),
            'menu_name'          => _x( 'Synk. indlæg', 'admin menu', 'smamo' ),
            'name_admin_bar'     => _x( 'Synk. indlæg', 'add new on admin bar', 'smamo' ),
            'add_new'            => _x( 'Tilføj nyt ', 'indlæg', 'smamo' ),
            'add_new_item'       => __( 'Tilføj ny', 'smamo' ),
            'new_item'           => __( 'Nyt indlæg', 'smamo' ),
            'edit_item'          => __( 'Rediger', 'smamo' ),
            'view_item'          => __( 'Se indlæg', 'smamo' ),
            'all_items'          => __( 'Se alle', 'smamo' ),
            'search_items'       => __( 'Find indlæg', 'smamo' ),
            'parent_item_colon'  => __( 'Forældre:', 'smamo' ),
            'not_found'          => __( 'Start med at oprette et nyt indlæg.', 'smamo' ),
            'not_found_in_trash' => __( 'Papirkurven er tom.', 'smamo' ),
            ),
	   )
    );
}

add_action( 'init', 'smamo_add_blogsync_taxes', 0 );
function smamo_add_blogsync_taxes() {
	$labels = array(
		'name'              => _x( 'Kategorier', 'taxonomy general name' ),
		'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
		'search_items'      => __( 'Søg i Kategorier' ),
		'all_items'         => __( 'Alle Kategorier' ),
		'parent_item'       => __( 'Forælder' ),
		'parent_item_colon' => __( 'Forælder:' ),
		'edit_item'         => __( 'Rediger kategori' ),
		'update_item'       => __( 'Opdater kategori' ),
		'add_new_item'      => __( 'Tilføj nykategori' ),
		'new_item_name'     => __( 'Ny kategori' ),
		'menu_name'         => __( 'Kategorier' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'kategori' ),
	);

	register_taxonomy( 'kategori', array( 'sync' ), $args );


	$labels = array(
		'name'              => _x( 'Tags', 'taxonomy general name' ),
		'singular_name'     => _x( 'Tag', 'taxonomy singular name' ),
		'search_items'      => __( 'Søg i Tags' ),
		'all_items'         => __( 'Alle Tags' ),
		'parent_item'       => __( 'Forælder' ),
		'parent_item_colon' => __( 'Forælder:' ),
		'edit_item'         => __( 'Rediger tag' ),
		'update_item'       => __( 'Opdater tag' ),
		'add_new_item'      => __( 'Tilføj nytag' ),
		'new_item_name'     => __( 'Nyt tag' ),
		'menu_name'         => __( 'Tags' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tag' ),
	);

	register_taxonomy( 'tag', array( 'sync' ), $args );

}