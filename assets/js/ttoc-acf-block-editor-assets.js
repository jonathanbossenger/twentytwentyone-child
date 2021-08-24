wp.hooks.addFilter(
	"blocks.getSaveContent.extraProps",
	"ttocAcfBlocks/addACFExtraProps",
	addACFExtraProps
);

function addACFExtraProps(extraProps, blockType, attributes) {
	if (blockType.name !== 'acf/testimonial') {
		return extraProps;
	}
	extraProps = Object.assign(extraProps, {
		className: ['acf-testimonial']
	});
	return extraProps;
}