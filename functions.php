<?php

add_action( 'acf/init', 'ttoc_acf_blocks_init' );
function ttoc_acf_blocks_init() {
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

add_action( 'enqueue_block_editor_assets', 'ttoc_acf_blocks_editor_assets' );
function ttoc_acf_blocks_editor_assets() {
	wp_enqueue_script(
		'ttoc-acf-block-editor-assets-js',
		get_stylesheet_directory_uri()
		. '/assets/js/ttoc-acf-block-editor-assets.js',
		[ 'wp-blocks' ]
	);
}