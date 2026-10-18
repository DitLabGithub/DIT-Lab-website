<div class="bg-white rounded-xl overflow-hidden border border-[#1A1F5E]">
  <?php if (has_post_thumbnail()) {
    the_post_thumbnail('medium_large', array('class' => 'w-full h-48 object-cover'));
  } ?>
  <div class="p-3 text-left">
    <h3 class="text-lg font-bold text-[#1A1F5E]"><?php the_title(); ?></h3>
    <p class="text-sm">Functie: <?php echo esc_html(get_field('functie')); ?></p>
    <p class="text-sm">Vakgebied: <?php echo esc_html(get_field('vakgebied')); ?></p>
  </div>
</div>