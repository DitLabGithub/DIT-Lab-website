<?php
$startdatum = get_field( 'startdatum' );
$functie    = get_field( 'functie' );
?>
<article class="flex flex-col overflow-hidden rounded-xl border border-[#4950BC] bg-white">
    <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail( 'medium_large', array( 'class' => 'h-32 w-full object-cover' ) ); ?>
    <?php endif; ?>

    <div class="flex flex-1 flex-col gap-2 p-3">
        <?php if ( $startdatum ) : ?>
            <p class="text-[#4950BC]">Startdatum: <?php echo esc_html( $startdatum ); ?></p>
        <?php endif; ?>

        <h2 class="font-heading text-xl font-bold text-[#1A1F5E]"><?php the_title(); ?></h2>

        <p><?php echo esc_html( get_the_excerpt() ); ?></p>

        <?php if ( $functie ) : ?>
            <p class="font-bold text-[#4950BC]">Functie: <?php echo esc_html( $functie ); ?></p>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>" class="btn mt-auto text-center">Lees meer</a>
    </div>
</article>