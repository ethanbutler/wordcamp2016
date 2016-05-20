<?php

// =====
// register rest routes
// =====

add_action( 'rest_api_init', function () {

	// returns a single image based on ID and size
	register_rest_route( 'camp', '/single/(?P<id>\d+)/(?P<size>xs|sm|md|lg)', [
			'methods' => 'GET',
			'callback' => function( $data ){

			}
	] );

	// returns a single random image from a gallery
	register_rest_route( 'camp', '/random/(?P<id>\d+)/(?P<size>xs|sm|md|lg)', [
      'methods' => 'GET',
      'callback' => function( $data ){

			}
  ] );

	// returns a single image based on user light level
  register_rest_route( 'camp', '/daynite/(?P<id>\d+)/(?P<time>day|nite)/(?P<size>xs|sm|md|lg)', [
      'methods' => 'GET',
      'callback' => function( $data ){
				$img = get_field( $data['time'], $data['id'] );
				return wp_get_attachment_image_src( $img, 'hero_'.$data['size'] )[0];
			},
  ] );

} );
