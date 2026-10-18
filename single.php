<?php get_header(); ?>

<main>

	<!-- Title -->
	<section class="max-w-2xl mx-auto px-6 pt-14 pb-8 text-center">
		<h1 class="text-4xl md:text-5xl font-bold text-ditlab-title" style="font-family:'Space Grotesk'"><?php the_title(); ?></h1>
	</section>

	<!-- Hero image -->
	<?php
		$hero_img = get_field( 'hero_afbeelding' );
	?>
	<?php if ( $hero_img ) : ?>
		<div class="max-w-2xl mx-auto px-6 pb-14">
			<img src="<?php echo esc_url( $hero_img['url'] ); ?>" alt="<?php echo esc_attr( $hero_img['alt'] ); ?>" class="w-full rounded-xl shadow-md">
		</div>
	<?php elseif ( has_post_thumbnail() ) : ?>
		<div class="max-w-2xl mx-auto px-6 pb-14">
			<?php the_post_thumbnail( 'large', array( 'class' => 'w-full rounded-xl shadow-md' ) ); ?>
		</div>
	<?php endif; ?>

	<!-- Probleem -->
	<?php $probleem = get_field( 'probleem' ); ?>
	<?php if ( $probleem ) : ?>
	<section class="max-w-2xl mx-auto px-6 pb-14 text-center">
		<h2 class="text-2xl font-bold text-ditlab-blue mb-4" style="font-family:'Space Grotesk'">Probleem</h2>
		<p class="text-gray-700 leading-relaxed"><?php echo esc_html( $probleem ); ?></p>
	</section>
	<?php endif; ?>

	<!-- Aanpak -->
	<?php
	$aanpak      = get_field( 'aanpak' );
	$aanpak_img  = get_field( 'aanpak_afbeelding' );
	$aanpak_capt = get_field( 'aanpak_bijschrift' );
	?>
	<?php if ( $aanpak ) : ?>
	<section class="max-w-2xl mx-auto px-6 pb-14 text-center">
		<h2 class="text-2xl font-bold text-ditlab-blue mb-4" style="font-family:'Space Grotesk'">Aanpak</h2>
		<p class="text-gray-700 leading-relaxed mb-8"><?php echo esc_html( $aanpak ); ?></p>

		<?php if ( $aanpak_img ) : ?>
			<img src="<?php echo esc_url( $aanpak_img['url'] ); ?>" alt="<?php echo esc_attr( $aanpak_img['alt'] ); ?>" class="w-full rounded-xl border border-ditlab-blue/20">
			<?php if ( $aanpak_capt ) : ?>
				<p class="mt-3 text-sm italic text-ditlab-title"><?php echo esc_html( $aanpak_capt ); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</section>
	<?php endif; ?>

	<!-- Resultaat (full-width dark band) -->
	<?php
	$resultaat_1 = get_field( 'resultaat_1' );
	$resultaat_2 = get_field( 'resultaat_2' );
	?>
	<?php if ( $resultaat_1 || $resultaat_2 ) : ?>
	<section class="bg-ditlab-blue py-16">
		<div class="max-w-2xl mx-auto px-6 text-center">
			<h2 class="text-2xl font-bold text-white mb-6" style="font-family:'Space Grotesk'">Resultaat</h2>
			<?php if ( $resultaat_1 ) : ?>
				<p class="text-white/90 leading-relaxed mb-4"><?php echo esc_html( $resultaat_1 ); ?></p>
			<?php endif; ?>
			<?php if ( $resultaat_2 ) : ?>
				<p class="text-white/90 leading-relaxed"><?php echo esc_html( $resultaat_2 ); ?></p>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- Contact -->
	<section class="max-w-2xl mx-auto px-6 py-16">
		<h2 class="text-2xl font-bold text-ditlab-teal" style="font-family:'Space Grotesk'">Heb je vragen of wil je meer weten?</h2>
		<h3 class="text-2xl font-bold text-ditlab-teal mb-2" style="font-family:'Space Grotesk'">Neem gerust contact op</h3>
		<p class="text-sm text-gray-500 mb-6">Reactie binnen 5 werkdagen</p>

		<form class="space-y-4">
			<input type="text" placeholder="Voornaam*" required
				class="w-full rounded-lg border border-ditlab-purple bg-gray-200 px-4 py-2 transition-colors duration-200 focus:border-ditlab-teal focus:bg-white focus:outline-none focus:[&::placeholder]:opacity-0">

			<input type="email" placeholder="E-mailadres*" required
				class="w-full rounded-lg border border-ditlab-purple bg-gray-200 px-4 py-2 transition-colors duration-200 focus:border-ditlab-teal focus:bg-white focus:outline-none focus:[&::placeholder]:opacity-0">

			<input type="tel" placeholder="Telefoonnummer (optioneel)"
				class="w-full rounded-lg border border-ditlab-purple bg-gray-200 px-4 py-2 transition-colors duration-200 focus:border-ditlab-teal focus:bg-white focus:outline-none focus:[&::placeholder]:opacity-0">

			<textarea placeholder="Bericht*" required rows="5"
				class="w-full rounded-lg border border-ditlab-purple bg-gray-200 px-4 py-2 transition-colors duration-200 focus:border-ditlab-teal focus:bg-white focus:outline-none focus:[&::placeholder]:opacity-0"></textarea>

			<input type="file"
				class="w-full rounded-lg border border-ditlab-purple bg-gray-200 px-4 py-2 text-sm transition-colors duration-200 focus:border-ditlab-teal focus:bg-white focus:outline-none">

			<button type="submit" class="btn">Verzenden</button>
		</form>
	</section>

	<!-- Gerelateerde artikelen -->
	<?php
	$cats = wp_get_post_categories( get_the_ID() );
	$related = new WP_Query( array(
		'post_type'           => 'post',
		'posts_per_page'      => 3,
		'post__not_in'        => array( get_the_ID() ),
		'category__in'        => $cats,
		'ignore_sticky_posts' => 1,
	) );
	if ( ! $related->have_posts() ) {
		$related = new WP_Query( array(
			'post_type'           => 'post',
			'posts_per_page'      => 3,
			'post__not_in'        => array( get_the_ID() ),
			'ignore_sticky_posts' => 1,
		) );
	}
	?>
	<section class="max-w-[1400px] mx-auto px-6 pb-16">
		<h2 class="text-2xl font-bold text-ditlab-blue mb-6" style="font-family:'Space Grotesk'">Gerelateerde artikelen</h2>
		<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
			<?php while ( $related->have_posts() ) : $related->the_post();
				get_template_part( 'template-parts/card-article' );
			endwhile; wp_reset_postdata(); ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>