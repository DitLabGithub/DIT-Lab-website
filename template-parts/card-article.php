<?php
// Reusable article card
$words     = str_word_count( wp_strip_all_tags( get_the_content() ) );
$read_time = max( 1, ceil( $words / 200 ) );
$category  = get_the_category();
?>
<article class="flex flex-col rounded-xl border border-ditlab-title/40 bg-white overflow-hidden">

	<a href="<?php the_permalink(); ?>" class="block aspect-[16/9] bg-ditlab-gray">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-contain bg-white' ) );
		} ?>
	</a>

	<div class="flex flex-col flex-1 p-3">
		<div class="flex justify-between text-xs text-ditlab-title">
			<span><?php echo get_the_date( 'd-m-y' ); ?></span>
			<span><?php echo $category ? esc_html( $category[0]->name ) : ''; ?> - <?php echo $read_time; ?>min</span>
		</div>

		<h3 class="mt-1 text-lg font-bold text-ditlab-blue"><?php the_title(); ?></h3>
		<p class="mt-1 text-sm text-gray-700 line-clamp-3"><?php echo get_the_excerpt(); ?></p>

		<a href="<?php the_permalink(); ?>" class="btn mt-auto w-full text-center">Lees meer</a>
	</div>
</article>