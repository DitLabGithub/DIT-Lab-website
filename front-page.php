<?php get_header(); ?>
<?php $img = get_template_directory_uri() . '/assets/img/'; ?>

<main class="max-w-[1400px] mx-auto px-6 py-12">

	<!-- 1. INTRO -->
	<section class="grid md:grid-cols-2 gap-10 items-center py-16">
		<div>
			<div class="flex items-center gap-6 mb-6">
				<img src="<?php echo $img; ?>duoLogo.png" alt="DUO" class="h-28 w-auto">
                <img src="<?php echo $img; ?>hanzeLogo.png" alt="Hanze" class="h-12 w-auto">
			</div>

			<h1 class="text-4xl lg:text-5xl font-bold uppercase text-ditlab-title leading-tight">
				De toekomst van publieke dienstverlening
			</h1>

			<p class="mt-4 text-gray-800">
				Het DIT-lab is een samenwerkingsverband van DUO en de Hanze, waarin we samen met studenten verkennen en onderzoeken hoe de overheid ook in de toekomst betrouwbare en passende dienstverlening kan blijven bieden aan burgers en ondernemers.
			</p>

			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn mt-6">Neem contact met ons op</a>
		</div>

		<!-- Photo placeholder -->
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/heroPhoto.png"
     		alt="DIT-Lab"
     		class="w-full h-full object-cover rounded-xl">
	</section>

	<!-- Line -->
	<hr class="mx-auto w-2/3 border-t-2 border-ditlab-title/60">

	<!-- 2. THREE CARDS -->
	<section class="grid md:grid-cols-3 gap-6 py-16">

		<div class="group rounded-xl bg-white p-6 shadow-lg transition-all duration-300 hover:bg-ditlab-blue hover:-translate-y-2 hover:shadow-xl">
			<h2 class="text-2xl font-bold text-ditlab-blue text-center transition-colors duration-300 group-hover:text-ditlab-teal">Wie zijn we?</h2>
			<p class="mt-4 text-sm text-ditlab-blue transition-colors duration-300 group-hover:text-white">
				Het DIT-lab is een samenwerkingsverband van DUO en de Hanze. Samen met studenten en partners werken we aan de publieke dienstverlening van de toekomst. In een wereld die continu verandert, onderzoeken we hoe de overheid betrouwbaar, toegankelijk en passend kan blijven voor burgers en ondernemers.
			</p>
		</div>

		<div class="group rounded-xl bg-white p-6 shadow-lg transition-all duration-300 hover:bg-ditlab-blue hover:-translate-y-2 hover:shadow-xl">
			<h2 class="text-2xl font-bold text-ditlab-blue text-center transition-colors duration-300 group-hover:text-ditlab-teal">Wat doen we?</h2>
			<ul class="mt-4 list-disc pl-5 text-sm text-ditlab-blue space-y-1 transition-colors duration-300 group-hover:text-white">
				<li>Onderzoeken en experimenteren met nieuwe technologieën</li>
				<li>Werken aan vraagstukken rondom digitale identiteit</li>
				<li>Testen van innovatieve oplossingen voor publieke dienstverlening</li>
				<li>Signaleren van kansen en risico's voor de toekomst</li>
				<li>Inzetten van creatieve werkwijzen, zoals serious gaming</li>
			</ul>
		</div>

		<div class="group rounded-xl bg-white p-6 shadow-lg transition-all duration-300 hover:bg-ditlab-blue hover:-translate-y-2 hover:shadow-xl">
			<h2 class="text-2xl font-bold text-ditlab-blue text-center transition-colors duration-300 group-hover:text-ditlab-teal">Voor wie?</h2>
			<p class="mt-4 text-sm text-ditlab-blue transition-colors duration-300 group-hover:text-white">
				Het DIT-lab is er voor studenten, onderzoekers, professionals en partners die willen meedenken over de toekomst van publieke dienstverlening. Iedereen die geïnteresseerd is in innovatie, technologie en maatschappelijke vraagstukken is welkom om kennis te maken met ons werk en onze experimenten.
			</p>
		</div>

	</section>

	<!-- 3. FEATURED ARTICLES -->
	<section class="pb-16">
		<h2 class="text-3xl font-bold text-ditlab-blue text-center mb-6">Uitgelichte artikelen</h2>

		<div class="grid md:grid-cols-3 gap-6">
			<?php
			$articles = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) );
			if ( $articles->have_posts() ) :
				while ( $articles->have_posts() ) : $articles->the_post();
					get_template_part( 'template-parts/card-article' );
				endwhile;
				wp_reset_postdata();
			else : ?>
				<p class="text-gray-500">Nog geen artikelen.</p>
			<?php endif; ?>
		</div>

		<div class="text-center mt-6">
			<a href="<?php echo esc_url( home_url( '/artikelen/' ) ); ?>" class="font-medium text-ditlab-title underline">Bekijk alles</a>
		</div>
	</section>

</main>

<?php get_footer(); ?>