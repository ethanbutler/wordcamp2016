<?php

// ======
// register rest routes
// ======

add_action( 'rest_api_init', function () {

	// returns a single image based on ID and size
	register_rest_route( 'v1', '/single/(?P<id>\d+)/(?P<set>)/(?P<size>xs|sm|md|lg)', [
			'methods' => 'GET',
			'callback' => function( $data ){
				$size = $data['set'].'_'.$data['size'];
				$img = get_field( 'hero', $data['id'] );
				return $img['sizes'][$size];
			}
	] );

	// returns a single random image, based on ID of image
	register_rest_route( 'v1', '/random/(?P<id>\d+)/(?P<set>)/(?P<size>xs|sm|md|lg)', [
      'methods' => 'GET',
      'callback' => function( $data ){
				$size = $data['set'].'_'.$data['size'];
				return wp_get_attachment_image_src( $data['id'], $size )[0];
			}
  ] );

	// returns a single random image, based on ID of page
	register_rest_route( 'v2', '/random/(?P<id>\d+)/(?P<set>)/(?P<size>xs|sm|md|lg)', [
      'methods' => 'GET',
      'callback' => function( $data ){
				$size = $data['set'].'_'.$data['size'];
				$img = get_field( 'random_hero', $data['id'] );
				return $img['sizes'][$size]
			}
  ] );

	// returns a single image based on ID, size, and light level
  register_rest_route( 'v1', '/daynite/(?P<id>\d+)/(?P<time>day|nite)/(?P<set>)/(?P<size>xs|sm|md|lg)', [
      'methods' => 'GET',
      'callback' => function( $data ){
				$size = $data['set'].'_'.$data['size'];
				$img = get_field( $data['time'], $data['id'] );
				return $img['sizes'][$size];
			},
  ] );

} );
