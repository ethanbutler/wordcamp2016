<?php
// returns a single image based on ID, size, and light level
register_rest_route( 'v1', '/daynite/(?P<id>\d+)/(?P<time>day|nite)/(?P<set>.*)/(?P<size>xs|sm|md|lg)', [
    'methods' => 'GET',
    'callback' => function( $data ){
      $size = $data['set'].'_'.$data['size'];
      $img = get_field( $data['time'], $data['id'] );
      return $img['sizes'][$size];
    }
] );
