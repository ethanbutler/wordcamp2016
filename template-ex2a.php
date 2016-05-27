<?php get_template_part('header'); ?>
	<body>
		<header>
			<?php
				$imgs = get_field( 'hero_images', get_the_ID() );
				$img  = array_rand( $img, 1 );
			?>
			<figure class="respBg js-respBg--rand"
							data-img="<?= $img['id']; ?>"
							data-set="hero"
			></figure>
			<h1><?= get_the_title(); ?></h1>
		</header>
		<main>
			<?php the_content(); ?>
		</main>
		<footer>
			<small>Built by Ethan Butler for WordCamp Asheville 2016.</small>
		</footer>
	</body>
</html>
