<?php

add_action( 'acf/init', 'acf_blocks_init' );
function acf_blocks_init() {
	// Check function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {
		// Register a testimonial block.
		acf_register_block_type(
			[
				'name'            => 'testimonial',
				'title'           => __( 'Testimonial' ),
				'description'     => __( 'A custom testimonial block.' ),
				'render_template' => 'template-parts/blocks/testimonial/testimonial.php',
				'category'        => 'formatting',
				'supports'        => [
					'full_height' => true,
				],
			]
		);
	}
}

add_action( 'enqueue_block_editor_assets', 'acf_blocks_editor_assets' );
function acf_blocks_editor_assets() {
	wp_enqueue_script(
		'ttoc-acf-block-editor-assets-js',
		get_stylesheet_directory_uri()
		. '/assets/js/acf-block-editor-assets.js',
		[ 'wp-blocks' ]
	);
}

add_filter( 'wp_kses_allowed_html', 'acf_add_allowed_iframe_tag', 10, 2 );
function acf_add_allowed_iframe_tag( $tags, $context ) {
	if ( $context === 'acf' ) {
		$tags['iframe'] = [
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		];
	}

	return $tags;
}

add_filter( 'wp_kses_allowed_html', 'acf_add_allowed_svg_tag', 10, 2 );
function acf_add_allowed_svg_tag( $tags, $context ) {
	if ( $context === 'acf' ) {
		$tags['svg']  = [
			'xmlns'       => true,
			'fill'        => true,
			'viewbox'     => true,
			'role'        => true,
			'aria-hidden' => true,
			'focusable'   => true,
		];
		$tags['path'] = [
			'd'    => true,
			'fill' => true,
		];
	}

	return $tags;
}