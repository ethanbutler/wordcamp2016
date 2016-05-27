<?php
get_template_part('header');
global $post;
setup_postdata( $post );
?>
	<body>
		<header>
			<figure class="respBg js-respBg--dayNite"
							data-id="<?= get_the_ID(); ?>"
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
