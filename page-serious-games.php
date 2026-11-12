<?php
// Overview page of all serious games.
get_header();
?>

<main class="mx-auto w-full max-w-[980px] px-4 pt-6 pb-12">

	<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="text-center text-5xl font-bold text-[#4950BC]"><?php the_title(); ?></h1>
		<div class="mx-auto mt-2 max-w-[860px] text-center text-base">
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>

	<h2 class="mt-10 mb-1 text-4xl font-bold text-[#1A1F5E]">Games</h2>

	<?php
	$games = new WP_Query( array(
		'post_type'      => 'game',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order title',
		'order'          => 'ASC',
	) );
	?>

	<div class="flex flex-col gap-10">
		<?php while ( $games->have_posts() ) : $games->the_post(); ?>
			<article class="flex min-h-[250px] flex-col gap-2.5 rounded-xl border border-[#009E9E] p-3.5 md:flex-row">

				<div class="md:w-[350px] md:shrink-0">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large', array( 'class' => 'h-[220px] w-full rounded-xl object-cover' ) ); ?>
					<?php endif; ?>
				</div>

				<div class="flex min-w-0 flex-1 flex-col justify-between gap-4">
					<p class="text-lg leading-snug"><?php echo esc_html( get_field( 'card_description' ) ); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn block w-full rounded-lg py-3 text-center font-semibold">
						Speel <?php the_title(); ?>
					</a>
				</div>

			</article>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>

</main>

<?php get_footer(); ?>