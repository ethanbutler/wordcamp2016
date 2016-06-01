<?php
// returns a single image based on ID and size
register_rest_route( 'v1', '/single/(?P<id>\d+)/(?P<set>.*)/(?P<size>xs|sm|md|lg)', [
    'methods' => 'GET',
    'callback' => function( $data ){
      $size = $data['set'].'_'.$data['size'];
      $img = get_field( 'hero_image', $data['id'] );
      return $img['sizes'][$size];
    }
] );
