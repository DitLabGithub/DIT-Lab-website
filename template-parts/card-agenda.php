<article class="flex flex-col md:flex-row gap-4 border border-[#009E9E] rounded-2xl p-3.5">
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="md:w-[350px] shrink-0">
			<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-[220px] object-cover rounded-xl' ) ); ?>
		</a>
	<?php endif; ?>

	<div class="flex flex-col flex-1">
		<h2 class="sr-only"><?php the_title(); ?></h2>

		<p class="text-xl text-[#4950BC]"><?php echo esc_html( ditlab_agenda_date( get_the_ID() ) ); ?></p>

		<p class="flex-1 py-4 text-lg"><?php echo esc_html( get_the_excerpt() ); ?></p>

		<a href="<?php the_permalink(); ?>" class="btn block w-full text-center">Lees meer over activiteit</a>
	</div>
</article>