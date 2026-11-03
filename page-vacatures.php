<?php get_header(); ?>

<main class="mx-auto max-w-6xl px-6 py-12">
    <h1 class="mb-12 text-center font-heading text-4xl font-bold text-[#4950BC]">
        Stages &amp; Afstudeeropdrachten
    </h1>

    <?php
    $vacatures = new WP_Query( array(
        'post_type'      => 'vacature',
        'posts_per_page' => -1,
    ) );
    ?>

    <?php if ( $vacatures->have_posts() ) : ?>
        <div class="grid gap-8 md:grid-cols-2">
            <?php while ( $vacatures->have_posts() ) : $vacatures->the_post(); ?>
                <?php get_template_part( 'template-parts/card', 'vacature' ); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    <?php else : ?>
        <p class="text-center">Er zijn op dit moment geen vacatures.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>