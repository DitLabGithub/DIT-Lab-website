<?php
// Page of one serious game.
get_header();

// Shows a list of people (makers or improvers). Empty slots are skipped.
function ditlab_show_people( $prefix, $heading ) {
	$people = array();

	for ( $i = 1; $i <= 4; $i++ ) {
		$name  = get_field( "{$prefix}_{$i}_name" );
		$photo = get_field( "{$prefix}_{$i}_photo" );

		if ( $name || $photo ) {
			$people[] = array(
				'photo' => $photo,
				'name'  => $name,
				'done'  => get_field( "{$prefix}_{$i}_done" ),
				'role'  => get_field( "{$prefix}_{$i}_role" ),
			);
		}
	}

	if ( ! $people ) {
		return;
	}
	?>
	<section class="mt-10">
		<h2 class="mb-4 text-3xl font-bold"><?php echo esc_html( $heading ); ?></h2>
		<div class="grid gap-8 md:grid-cols-2">
			<?php foreach ( $people as $person ) : ?>
				<div>
					<?php
					if ( $person['photo'] ) {
						echo wp_get_attachment_image( $person['photo'], 'thumbnail', false, array( 'class' => 'mb-2 h-[100px] w-[100px] rounded-xl object-cover' ) );
					}
					?>
					<p>Naam: <?php echo esc_html( $person['name'] ); ?></p>
					<p>Wat gedaan: <?php echo esc_html( $person['done'] ); ?></p>
					<p>Rol: <?php echo esc_html( $person['role'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
	<?php
}
?>

<main class="mx-auto max-w-[1100px] px-4 py-8">

	<?php while ( have_posts() ) : the_post(); ?>

		<h1 class="text-center text-5xl font-bold text-[#4950BC]"><?php the_title(); ?></h1>

		<p class="mx-auto mt-3 max-w-[860px] text-center">
			<?php echo esc_html( get_field( 'short_description' ) ); ?>
		</p>

		<?php if ( get_field( 'game_url' ) ) : ?>
			<div id="game-wrap" class="relative mx-auto mt-10 max-w-[1000px] rounded-2xl bg-[#1A1F5E] p-3 md:p-5">
				<iframe
					id="game-frame"
					src="<?php echo esc_url( get_field( 'game_url' ) ); ?>"
					title="<?php the_title_attribute(); ?>"
					class="aspect-video w-full"
					scrolling="no"
					allow="fullscreen"
					allowfullscreen
				></iframe>

				<button
					type="button"
					id="game-fullscreen"
					aria-label="Volledig scherm"
					class="absolute right-0 bottom-0 rounded-tl-xl bg-[#1A1F5E] p-2 text-white md:p-3"
				>
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M4 20 20 4M14 4h6v6M4 14v6h6" />
					</svg>
				</button>
			</div>

			<script>
	            (function () {
		            var wrap  = document.getElementById('game-wrap');
		            var frame = document.getElementById('game-frame');
		            var btn   = document.getElementById('game-fullscreen');
		            var fake  = false;

		            // Fallback: cover the screen with CSS
		            function setFake(on) {
			            fake = on;
			            wrap.classList.toggle('game-fake-fullscreen', on);
			            document.body.style.overflow = on ? 'hidden' : '';
		            }

		            btn.addEventListener('click', function () {
			            // Already fullscreen? Close it.
			            if (document.fullscreenElement) { document.exitFullscreen(); return; }
			            if (fake) { setFake(false); return; }

			            // Try real fullscreen, otherwise use the fallback
			            var req = frame.requestFullscreen || frame.webkitRequestFullscreen;
			            if (req) {
				            var result = req.call(frame);
				            if (result && result.catch) { result.catch(function () { setFake(true); }); }
			            } else {
				            setFake(true);
			            }
		            });

		            document.addEventListener('keydown', function (e) {
			            if (e.key === 'Escape' && fake) { setFake(false); }
		            });
	            })();
            </script>
		<?php endif; ?>

		<?php if ( get_field( 'controls' ) ) : ?>
			<div class="mx-auto mt-6 w-fit text-sm">
				<strong>Controls:</strong><br>
				<?php echo wp_kses_post( get_field( 'controls' ) ); ?>
			</div>
		<?php endif; ?>

		<?php
		ditlab_show_people( 'creator', 'Gemaakt door:' );
		ditlab_show_people( 'improver', 'Bewerkt en verbeterd door:' );
		?>

	<?php endwhile; ?>

</main>

<?php get_footer(); ?>