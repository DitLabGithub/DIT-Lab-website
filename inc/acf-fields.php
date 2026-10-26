<?php
function ditlab_person_fields( $prefix, $number, $title ) {
	$key = "{$prefix}_{$number}";
	return array(
		array(
			'key'           => "field_{$key}_photo",
			'label'         => "{$title} {$number}: Foto",
			'name'          => "{$key}_photo",
			'type'          => 'image',
			'return_format' => 'id',
			'preview_size'  => 'thumbnail',
		),
		array(
			'key'   => "field_{$key}_name",
			'label' => "{$title} {$number}: Naam",
			'name'  => "{$key}_name",
			'type'  => 'text',
		),
		array(
			'key'   => "field_{$key}_done",
			'label' => "{$title} {$number}: Wat gedaan",
			'name'  => "{$key}_done",
			'type'  => 'text',
		),
		array(
			'key'   => "field_{$key}_role",
			'label' => "{$title} {$number}: Rol",
			'name'  => "{$key}_role",
			'type'  => 'text',
		),
	);
}

function ditlab_register_game_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$fields = array(
		array(
			'key'   => 'field_game_card_description',
			'label' => 'Tekst in overzicht (kaart)',
			'name'  => 'card_description',
			'type'  => 'textarea',
			'rows'  => 4,
		),
		array(
			'key'   => 'field_game_description',
			'label' => 'Tekst op game pagina',
			'name'  => 'short_description',
			'type'  => 'textarea',
			'rows'  => 4,
		),
		array(
			'key'   => 'field_game_url',
			'label' => 'Game link',
			'name'  => 'game_url',
			'type'  => 'url',
		),
		array(
			'key'       => 'field_game_controls',
			'label'     => 'Controls',
			'name'      => 'controls',
			'type'      => 'textarea',
			'rows'      => 4,
			'new_lines' => 'br',
		),
	);
	// 4 slots for "Gemaakt door" and 4 for "Bewerkt en verbeterd door".
	// Leave a slot empty and it will not show on the website.
	for ( $i = 1; $i <= 4; $i++ ) {
		$fields = array_merge( $fields, ditlab_person_fields( 'creator', $i, 'Gemaakt door' ) );
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$fields = array_merge( $fields, ditlab_person_fields( 'improver', $i, 'Bewerkt door' ) );
	}

	acf_add_local_field_group( array(
		'key'      => 'group_game_details',
		'title'    => 'Game details',
		'fields'   => $fields,
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'game',
				),
			),
		),
	) );
}
add_action( 'acf/init', 'ditlab_register_game_fields' );