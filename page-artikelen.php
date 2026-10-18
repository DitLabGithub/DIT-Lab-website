<?php
get_header();

$zoek      = sanitize_text_field($_GET['zoek'] ?? '');
$categorie = sanitize_title($_GET['categorie'] ?? '');
$vakgebied = sanitize_title($_GET['vakgebied'] ?? '');
$sorteer   = in_array($_GET['sorteer'] ?? '', ['oudste', 'alfabetisch', 'leestijd'], true) ? $_GET['sorteer'] : '';
$filtering = $zoek || $categorie || $vakgebied;
?>

<main class="max-w-[1400px] mx-auto px-6 py-12">

  <!-- Title + intro -->
  <div class="text-center mb-10">
    <h1 class="text-5xl font-bold text-[#4950BC] mb-6" style="font-family:'Space Grotesk'">Artikelen</h1>
    <p class="mb-4">Wat kun je verwachten?</p>
    <p class="text-[#4950BC] font-medium">• Projecten: Ontdek onze nieuwste digitale oplossingen en samenwerkingen.</p>
    <p class="text-[#4950BC] font-medium">• Nieuwberichten: Bekijk wat er op de planning staat en wat er behaald is.</p>
  </div>

  <!-- Search + filters -->
  <form method="get" class="flex flex-col items-center gap-3 mb-14">
    <div class="flex w-full max-w-sm gap-2">
      <input type="text" name="zoek" placeholder="Zoeken" value="<?php echo esc_attr($zoek); ?>"
        class="flex-1 bg-gray-200 border-0 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#4950BC]">
      <button type="submit" class="bg-[#009E9E] text-white font-semibold rounded-lg px-4 py-2 hover:opacity-90">Zoeken</button>
    </div>

    <div class="flex flex-wrap justify-center gap-2">
      <?php
      ditlab_filter_dropdown('sorteer', 'Sorteer op', [
        ''            => 'Nieuwste',
        'oudste'      => 'Oudste',
        'alfabetisch' => 'Alfabetisch',
        'leestijd'    => 'Leestijd',
      ], $sorteer);

      $cats = ['' => 'Alle categorieën'];
      foreach (get_categories(['hide_empty' => false]) as $c) $cats[$c->slug] = $c->name;
      ditlab_filter_dropdown('categorie', 'Categorie', $cats, $categorie);

      $tags = ['' => 'Alle vakgebieden'];
      foreach (get_tags(['hide_empty' => false]) as $t) $tags[$t->slug] = $t->name;
      ditlab_filter_dropdown('vakgebied', 'Vakgebied', $tags, $vakgebied);
      ?>
    </div>
  </form>

  <script>
    // Show the chosen option on the button and close the dropdown
    document.querySelectorAll('[data-filter]').forEach(d => {
      d.querySelectorAll('input').forEach(i => i.addEventListener('change', () => {
        d.querySelector('[data-label]').textContent = i.nextElementSibling.textContent;
        d.open = false;
      }));
    });
    // Close dropdowns when clicking somewhere else
    document.addEventListener('click', e => {
      document.querySelectorAll('[data-filter][open]').forEach(d => {
        if (!d.contains(e.target)) d.open = false;
      });
    });
  </script>

  <!-- Uitgelicht (only when not searching) -->
  <?php
  $sticky = get_option('sticky_posts');
  if (!$filtering && $sticky) :
    $featured = new WP_Query(['post__in' => $sticky, 'posts_per_page' => 3, 'ignore_sticky_posts' => 1]);
  ?>
    <section class="mb-14">
      <h2 class="text-2xl font-bold text-[#009E9E] mb-3" style="font-family:'Space Grotesk'">Uitgelicht</h2>
      <div class="bg-[#1A1F5E] rounded-2xl p-5 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php while ($featured->have_posts()) : $featured->the_post();
          get_template_part('template-parts/card-article');
        endwhile; wp_reset_postdata(); ?>
      </div>
    </section>
  <?php endif; ?>

  <!-- Alle artikelen -->
  <?php
  $args = [
    'post_type'           => 'post',
    'paged'               => max(1, get_query_var('paged'), get_query_var('page')),
    'ignore_sticky_posts' => 1,
  ];
  if ($zoek)      $args['s'] = $zoek;
  if ($categorie) $args['category_name'] = $categorie;
  if ($vakgebied) $args['tag'] = $vakgebied;

  switch ($sorteer) {
    case 'oudste':
      $args['order'] = 'ASC';
      break;
    case 'alfabetisch':
      $args['orderby'] = 'title';
      $args['order']   = 'ASC';
      break;
    case 'leestijd':
      $args['meta_key'] = 'leestijd';
      $args['orderby']  = 'meta_value_num';
      $args['order']    = 'ASC';
      break;
  }

  $query  = new WP_Query($args);
  $labels = ['' => 'Nieuw > oud', 'oudste' => 'Oud > nieuw', 'alfabetisch' => 'A > Z', 'leestijd' => 'Kort > lang'];
  ?>

  <section>
    <h2 class="text-2xl font-bold text-[#1A1F5E]" style="font-family:'Space Grotesk'">Alle artikelen</h2>
    <p class="text-sm text-[#4950BC] mb-4"><?php echo esc_html($labels[$sorteer]); ?></p>

    <?php if ($query->have_posts()) : ?>
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php while ($query->have_posts()) : $query->the_post();
          get_template_part('template-parts/card-article');
        endwhile; ?>
      </div>
      <div class="mt-10 text-center">
        <?php echo paginate_links(['total' => $query->max_num_pages]); ?>
      </div>
    <?php else : ?>
      <p>Geen artikelen gevonden.</p>
    <?php endif; wp_reset_postdata(); ?>
  </section>

</main>

<?php get_footer(); ?>