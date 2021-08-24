<?php

add_action( 'acf/init', 'acf_blocks_init' );
function acf_blocks_init() {
	// Check function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {
		// Register a testimonial block.
		acf_register_block_type(
			array(
				'name'            => 'testimonial',
				'title'           => __( 'Testimonial' ),
				'description'     => __( 'A custom testimonial block.' ),
				'render_template' => 'template-parts/blocks/testimonial/testimonial.php',
				'category'        => 'formatting',
				'supports'        => array(
					'full_height' => true,
				),
			)
		);
	}
}