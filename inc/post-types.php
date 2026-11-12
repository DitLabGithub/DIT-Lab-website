<?php
// Registers the "Games" post type for the serious games.
function ditlab_register_game_post_type() {
	register_post_type( 'game', array(
		'labels' => array(
			'name'          => 'Games',
			'singular_name' => 'Game',
			'add_new_item'  => 'Add new game',
			'edit_item'     => 'Edit game',
		),
		'public'       => true,
		'has_archive'  => false,
		'menu_icon'    => 'dashicons-controls-play',
		'supports'     => array( 'title', 'thumbnail' ),
		'rewrite'      => array( 'slug' => 'serious-games' ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'ditlab_register_game_post_type' );