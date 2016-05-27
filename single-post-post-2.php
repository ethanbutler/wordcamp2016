<?php
get_template_part('header');
global $post;
setup_postdata( $post );
?>
	<body>
		<header>
			<?php
				$imgs = get_field( 'hero_image_multiple', get_the_ID() );
				$img  = $imgs[array_rand( $imgs , 1 )];
			?>
			<figure class="respBg js-respBg--rand"
							data-id="<?= get_the_ID(); ?>"
							<?php /* data-img="<?= $img['ID']; ?>" */ ?>
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
