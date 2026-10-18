<?php
/**
 * The footer for our theme
 */
$pages_left  = array( 'Home' => '', 'Artikelen' => 'artikelen', 'Serious Games' => 'serious-games', 'Over DIT-Lab' => 'over-dit-lab' );
$pages_right = array( 'Het team' => 'het-team', 'Vacatures' => 'vacatures', 'Agenda' => 'agenda', 'Contact' => 'contact' );
?>

	<footer id="colophon" class="bg-ditlab-blue text-white mt-auto">
		<div class="max-w-[1400px] mx-auto px-6 pt-14 pb-8">

			<!-- Question + button -->
			<div class="text-center">
				<h2 class="text-2xl font-semibold">Heb je vragen of zie je mogelijkheden tot samenwerking?</h2>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="mt-6 inline-block rounded-lg bg-ditlab-purple px-5 py-2 text-sm font-semibold hover:opacity-90">
					Neem contact met ons op
				</a>
			</div>

			<!-- Pages + contact -->
			<div class="mt-14 grid gap-10 sm:grid-cols-2 max-w-2xl mx-auto">

				<div>
					<h3 class="font-semibold mb-3">Pagina's</h3>
					<div class="flex gap-12 text-sm">
						<ul class="space-y-1">
							<?php foreach ( $pages_left as $label => $slug ) : ?>
								<li><a class="hover:underline" href="<?php echo esc_url( home_url( '/' . $slug ) ); ?>"><?php echo esc_html( $label ); ?></a></li>
							<?php endforeach; ?>
						</ul>
						<ul class="space-y-1">
							<?php foreach ( $pages_right as $label => $slug ) : ?>
								<li><a class="hover:underline" href="<?php echo esc_url( home_url( '/' . $slug ) ); ?>"><?php echo esc_html( $label ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>

				<div class="text-sm">
					<h3 class="font-semibold mb-3 text-base">Contact</h3>
					<p>E-mailadres: <a class="hover:underline" href="mailto:info@ditlab.nl">info@ditlab.nl</a></p>
					<p>Adres: Zernikepark 10, 9747 AN Groningen</p>

					<h3 class="font-semibold mt-4 mb-2 text-base">Socialmedia</h3>
					<a href="https://www.linkedin.com/company/dit-lab/posts/" aria-label="LinkedIn" class="inline-block hover:opacity-80">
						<svg class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
					</a>
				</div>

			</div>

			<!-- Bottom line -->
			<p class="mt-14 text-center text-xs text-white/80">
				&copy;<?php echo date( 'Y' ); ?> DIT-Lab &mdash; privacy &mdash; voorwaarden &mdash; cookies &mdash; contact
			</p>

		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>