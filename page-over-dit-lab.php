<?php
/* Over DIT-Lab page */
get_header();
$img = get_template_directory_uri() . '/assets/img/';
?>

<main id="primary">

  <!-- Intro -->
  <section class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-12 items-center">
    <div>
      <h1 class="text-4xl md:text-5xl font-bold text-[#4950BC] mb-6">Wat is en doet DIT-Lab?</h1>
      <p>DIT-Lab is een innovatief samenwerkingsverband van DUO en de Hanzehogeschool. Samen met studenten onderzoeken en testen wij technologische ontwikkelingen en innovaties rondom digitale identiteit. Ons doel is om waardevolle kennis op te bouwen en DUO te adviseren. Zo zorgen we ervoor dat de overheid ook in de toekomst een betrouwbare en wendbare publieke dienstverlener blijft.</p>
    </div>

    <div class="grid grid-cols-6 gap-3">
      <img src="<?php echo esc_url($img . 'over-1.jpg'); ?>" alt="" class="col-span-4 h-44 w-full object-cover rounded-2xl shadow-lg">
      <img src="<?php echo esc_url($img . 'over-2.jpg'); ?>" alt="" class="col-span-2 h-44 w-full object-cover rounded-2xl shadow-lg">
      <img src="<?php echo esc_url($img . 'over-3.jpg'); ?>" alt="" class="col-span-4 col-start-2 h-44 w-full object-cover rounded-2xl shadow-lg">
    </div>
  </section>

  <!-- Onze visie -->
  <section class="bg-[#1A1F5E] text-white">
    <div class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-12 items-center">
      <div>
        <h2 class="text-4xl font-bold text-[#009E9E] mb-4">Onze visie</h2>
        <p class="mb-6">De wereld verandert snel door nieuwe technologie, wetgeving en verwachtingen van burgers. DIT-Lab zorgt dat de overheid hier klaar voor is.</p>
        <ul class="list-disc pl-5 space-y-5 font-bold">
          <li>Dynamische innovatie-hub: Een plek waar onderwijs, studenten en de overheidspraktijk samenkomen om impact te maken binnen de publieke sector.</li>
          <li>Toekomstbestendige dienstverlening: Door nú te experimenteren en prototypes of serious games te bouwen, maken we de toekomst tastbaar.</li>
          <li>Wendbaarheid door kennis: We bouwen een stevige kennisbasis op en signaleren tijdig kansen en risico's.</li>
          <li>Gericht advies: Met onze inzichten inspireren en adviseren we DUO om een betrouwbare en wendbare publieke dienstverlener te blijven.</li>
        </ul>
      </div>
      <img src="<?php echo esc_url($img . 'over-team.jpg'); ?>" alt="" class="w-full rounded-2xl shadow-lg object-cover">
    </div>
  </section>

  <!-- Hoe wij werken -->
  <section class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-12 items-center text-[#1A1F5E]">
    <img src="<?php echo esc_url($img . 'over-team.jpg'); ?>" alt="" class="w-full rounded-2xl shadow-lg object-cover">
    <div>
      <h2 class="text-4xl font-bold mb-4">Hoe wij werken</h2>
      <p class="mb-6">Bij DIT-Lab geloven we in leren door te doen. Dit maken we zichtbaar via:</p>
      <ul class="list-disc pl-5 space-y-5 font-bold">
        <li>Tastbare innovatie: We gebruiken serious gaming en interactieve prototypes om complexe, toekomstige vraagstukken begrijpelijk en speelbaar te maken.</li>
        <li>Samenwerking in het netwerk: We verbinden DUO en de Hanzehogeschool met logische partners in het onderwijs en de rijksoverheid, zoals SURF.</li>
        <li>Centrale kennisdeling: Deze website functioneert als het centrale doorverwijspunt waar al onze onderzoeksresultaten en updates overzichtelijk worden gebundeld voor DUO-medewerkers.</li>
      </ul>
    </div>
  </section>

</main>

<?php get_footer(); ?>