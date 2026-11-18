<?php
/*
 * Contact page (slug: contact)
 * Form = WPForms Lite (honeypot + Turnstile set in WPForms settings).
 */

// Change this to the ID of your WPForms contact form (WPForms > All Forms).
$contact_form_id = 122;

get_header();
?>

<main id="primary" class="site-main px-4 py-12">

	<h1 class="text-center text-4xl md:text-5xl font-bold text-[#4950BC] mb-10">
		<?php esc_html_e( 'Contact', 'dit-lab' ); ?>
	</h1>

	<!-- Form card -->
	<section class="contact-card mx-auto max-w-4xl rounded-2xl bg-[#1A1F5E] p-6 md:p-8">
		<h2 class="text-2xl md:text-3xl font-bold text-[#009E9E] leading-snug">
			<?php esc_html_e( 'Heb je vragen of wil je meer weten?', 'dit-lab' ); ?><br>
			<?php esc_html_e( 'Neem gerust contact op', 'dit-lab' ); ?>
		</h2>
		<p class="mt-2 mb-5 text-white">
			<?php esc_html_e( 'Reactie binnen 5 werkdagen', 'dit-lab' ); ?>
		</p>

		<?php
		if ( $contact_form_id && function_exists( 'wpforms_display' ) ) {
			// args: id, show title, show description
			wpforms_display( $contact_form_id, false, false );
		} else {
			echo '<p class="text-white/70">Contactformulier nog niet ingesteld.</p>';
		}
		?>
	</section>

	<!-- Contact details -->
	<section class="mx-auto mt-16 max-w-3xl">
		<h2 class="text-center text-3xl font-bold text-[#1A1F5E] mb-6">
			<?php esc_html_e( 'Contactgegevens', 'dit-lab' ); ?>
		</h2>

		<div class="flex flex-col items-center gap-6 sm:flex-row sm:items-start sm:justify-center sm:gap-20">
			<div>
				<h3 class="text-xl font-bold text-[#1A1F5E]"><?php esc_html_e( 'Adres:', 'dit-lab' ); ?></h3>
				<p>Zernikepark 10,<br>9747 AN Groningen</p>
			</div>
			<div>
				<h3 class="text-xl font-bold text-[#1A1F5E]"><?php esc_html_e( 'E-mail:', 'dit-lab' ); ?></h3>
				<a href="mailto:ditlab@duo.nl" class="hover:text-[#4950BC] hover:underline">info@ditlab.nl</a>
			</div>
		</div>
	</section>

	<!-- Map -->
	<section class="mx-auto mt-6 max-w-3xl">
		<h2 class="text-3xl font-bold text-[#1A1F5E] mb-4"><?php esc_html_e( 'Kaart', 'dit-lab' ); ?></h2>
		<div class="overflow-hidden rounded-2xl">
			<iframe
				src="https://www.google.com/maps?q=Zernikepark+10,+9747+AN+Groningen&output=embed"
				class="block h-[370px] w-full border-0"
				loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"
				title="<?php esc_attr_e( 'Kaart van DIT-Lab, Zernikepark 10 Groningen', 'dit-lab' ); ?>">
			</iframe>
		</div>
	</section>

</main>

<?php
get_footer();