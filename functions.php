<?php

// ======
// register image sizes
// ======
include( 'lib/images.php' );

// ======
// register rest routes
// ======
add_action( 'rest_api_init', function () {

	include( 'lib/ex0.php' );
	include( 'lib/ex1.php' );
	include( 'lib/ex2a.php' );
	include( 'lib/ex2b.php' );
	include( 'lib/ex3.php' );

} );
