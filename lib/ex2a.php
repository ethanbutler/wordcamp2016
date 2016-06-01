<?php
// returns a single random image, based on ID of image
register_rest_route( 'v1', '/random/(?P<id>\d+)/(?P<set>.*)/(?P<size>xs|sm|md|lg)', [
    'methods' => 'GET',
    'callback' => function( $data ){
      $size = $data['set'].'_'.$data['size'];
      return wp_get_attachment_image_src( $data['id'], $size )[0];
    }
] );
