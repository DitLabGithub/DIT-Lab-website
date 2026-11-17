<?php get_header(); ?>

<main>
	<?php while ( have_posts() ) : the_post(); ?>

		<article class="max-w-[740px] mx-auto px-4 py-10 text-center">
			<h1 class="font-['Space_Grotesk'] text-4xl font-bold text-[#4950BC] mb-8"><?php the_title(); ?></h1>

			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large', array( 'class' => 'w-full max-w-[400px] mx-auto rounded-xl border-4 border-[#1A1F5E]' ) ); ?>
			<?php endif; ?>

			<div class="mt-8 text-lg [&_h2]:font-['Space_Grotesk'] [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-[#1A1F5E] [&_h2]:mt-10 [&_h2]:mb-3 [&_p]:mb-4">
				<?php the_content(); ?>
			</div>
		</article>

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

		<!-- Andere activiteiten -->
		<?php
		$related = new WP_Query( array(
			'post_type'      => 'agenda',
			'posts_per_page' => 3,
			'post__not_in'   => array( get_the_ID() ),
			'meta_key'       => 'event_date',
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
		) );
		?>

		<?php if ( $related->have_posts() ) : ?>
			<section class="max-w-[1400px] mx-auto px-6 pb-16">
				<h2 class="text-2xl font-bold text-ditlab-blue mb-6" style="font-family:'Space Grotesk'">Andere activiteiten</h2>

				<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
					<?php while ( $related->have_posts() ) : $related->the_post(); ?>
						<article class="flex flex-col rounded-2xl border border-ditlab-purple/40 bg-white overflow-hidden">
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-[200px] object-cover' ) ); ?>
								</a>
							<?php endif; ?>

							<div class="flex flex-col flex-1 p-4">
								<p class="text-sm text-ditlab-title"><?php echo esc_html( ditlab_agenda_date( get_the_ID() ) ); ?></p>
								<h3 class="mt-1 text-xl font-bold text-ditlab-blue" style="font-family:'Space Grotesk'"><?php the_title(); ?></h3>
								<p class="flex-1 py-3 text-gray-700"><?php echo esc_html( get_the_excerpt() ); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn block w-full text-center">Lees meer</a>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
			</section>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

	<?php endwhile; ?>
</main>

<?php get_footer(); ?>