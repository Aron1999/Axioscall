<?php

add_action( 'rest_api_init', function () {
	register_rest_route( '/wp/v2', '/posts/', array(
	  'methods' => 'POST',
	  'callback' => 'my_awesome_func',
	  'permission_callback' => '__return_true',
	) );
  } );


function my_awesome_func( $post ) {

	$my_post = array(
		'post_title'    => wp_strip_all_tags( $post['title'] ),
		'post_content'  => $post['message'],
		'post_status'   => 'pending',
		'post_author'   => 1,
		'post_category' => array($post['category'])
	  );


	  wp_insert_post( $my_post );
}

?>