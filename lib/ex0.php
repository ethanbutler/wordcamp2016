<?php 
register_rest_route( 'v1', '/hello/', [
  'methods' => 'GET',
  'callback' => function( $data ){
    return 'What\'s good, world!?';
  }
] );
