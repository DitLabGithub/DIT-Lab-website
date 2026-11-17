<?php
get_header();

$agenda = new WP_Query( array(
	'post_type'      => 'agenda',
	'posts_per_page' => -1,
	'meta_key'       => 'event_date',
	'orderby'        => 'meta_value_num',
	'order'          => 'ASC',
) );
?>

<main class="max-w-[940px] mx-auto px-4 py-10">
	<h1 class="font-['Space_Grotesk'] text-5xl font-bold text-[#4950BC] text-center mb-12">Agenda</h1>

	<?php if ( $agenda->have_posts() ) : ?>
		<div class="flex flex-col gap-6">
			<?php while ( $agenda->have_posts() ) : $agenda->the_post(); ?>
				<?php get_template_part( 'template-parts/card-agenda' ); ?>
			<?php endwhile; ?>
		</div>
	<?php else : ?>
		<p class="text-center">Er zijn op dit moment geen activiteiten gepland.</p>
	<?php endif; ?>

	<?php wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>