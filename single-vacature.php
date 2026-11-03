<?php get_header(); ?>

<main>

	<!-- Title -->
	<?php
		$startdatum = get_field( 'startdatum' );
		$functie    = get_field( 'functie' );
	?>
	<section class="max-w-2xl mx-auto px-6 pt-14 pb-8 text-center">
		<h1 class="text-4xl md:text-5xl font-bold text-ditlab-title" style="font-family:'Space Grotesk'"><?php the_title(); ?></h1>

		<?php if ( $startdatum || $functie ) : ?>
			<p class="mt-4 text-ditlab-blue">
				<?php if ( $functie ) : ?>
					<span class="font-bold">Functie: <?php echo esc_html( $functie ); ?></span>
				<?php endif; ?>
				<?php if ( $startdatum && $functie ) : ?>
					<span class="mx-2">|</span>
				<?php endif; ?>
				<?php if ( $startdatum ) : ?>
					<span>Startdatum: <?php echo esc_html( $startdatum ); ?></span>
				<?php endif; ?>
			</p>
		<?php endif; ?>
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

	<!-- Vacature tekst -->
	<section class="max-w-2xl mx-auto px-6 pb-14 text-center text-gray-700 leading-relaxed
		[&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-ditlab-blue [&_h2]:mt-10 [&_h2]:mb-4
		[&_h2]:font-['Space_Grotesk'] [&_p]:mb-4 [&_ul]:list-disc [&_ul]:list-inside [&_ul]:mb-4">
		<?php the_content(); ?>
	</section>

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

	<!-- Andere vacatures -->
	<?php
	$andere = new WP_Query( array(
		'post_type'      => 'vacature',
		'posts_per_page' => 3,
		'post__not_in'   => array( get_the_ID() ),
	) );
	?>
	<?php if ( $andere->have_posts() ) : ?>
	<section class="max-w-[1400px] mx-auto px-6 pb-16">
		<h2 class="text-2xl font-bold text-ditlab-blue mb-6" style="font-family:'Space Grotesk'">Andere vacatures</h2>
		<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
			<?php while ( $andere->have_posts() ) : $andere->the_post();
				get_template_part( 'template-parts/card-vacature' );
			endwhile; wp_reset_postdata(); ?>
		</div>
	</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>