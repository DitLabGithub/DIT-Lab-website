<?php
/* Het team page */
get_header();

function ditlab_team($soort) {
  return new WP_Query(array(
    'post_type' => 'teamlid',
    'posts_per_page' => -1,
    'meta_key' => 'soort',
    'meta_value' => $soort,
    'orderby' => 'title',
    'order' => 'ASC',
  ));
}

$medewerkers = ditlab_team('medewerker');
$stagiairs = ditlab_team('stagiair');
?>

<main id="primary" class="text-center">

  <h1 class="text-4xl md:text-5xl font-bold text-[#4950BC] py-8">Het team</h1>

  <!-- Medewerkers -->
  <section class="bg-[#1A1F5E] py-12 px-4">
    <h2 class="text-3xl font-bold text-white mb-8">DIT-Lab medewerkers</h2>
    <div class="max-w-4xl mx-auto grid sm:grid-cols-2 md:grid-cols-3 gap-10">
      <?php while ($medewerkers->have_posts()) : $medewerkers->the_post();
        get_template_part('template-parts/card-team');
      endwhile; wp_reset_postdata(); ?>
    </div>
  </section>

  <!-- Stagiairs -->
  <section class="py-12 px-4">
    <h2 class="text-3xl font-bold text-[#1A1F5E] mb-8">Huidige stagiairs</h2>
    <div class="max-w-4xl mx-auto grid sm:grid-cols-2 md:grid-cols-3 gap-10">
      <?php while ($stagiairs->have_posts()) : $stagiairs->the_post();
        get_template_part('template-parts/card-team');
      endwhile; wp_reset_postdata(); ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>