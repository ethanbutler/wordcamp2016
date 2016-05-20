<?php
get_template_part('header');
global $post;
setup_postdata( $post );
?>
		<header>
			<figure data-bgid="<?= get_field( 'hero_image' ); ?>" data-bgset="hero"></figure>
			<h1><?php the_title(); ?>
		</header>
		<main>
			<?php the_content() ?>
		</main>
	</body>
</html>
