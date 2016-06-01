<?php
// returns a single random image, based on ID of page
register_rest_route( 'v2', '/random/(?P<id>\d+)/(?P<set>.*)/(?P<size>xs|sm|md|lg)', [
    'methods' => 'GET',
    'callback' => function( $data ){
      $size = $data['set'].'_'.$data['size'];
      $imgs = get_field( 'hero_image_multiple', $data['id'] );
      $img  = $imgs[array_rand( $imgs , 1 )];
      return $img['sizes'][$size];
    }
] );
