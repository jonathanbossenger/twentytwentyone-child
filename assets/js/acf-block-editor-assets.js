wp.hooks.addFilter(
	"blocks.getSaveContent.extraProps",
	"acfBlocks/addACFExtraProps",
	addACFExtraProps
);

function addACFExtraProps(props, blockType, attributes) {
	if (blockType.name !== 'acf/testimonial') {
		return props;
	}
	console.log(props)
	props = Object.assign( props,
		{
			className: 'js-appended-class-name'
		} );
	console.log(props)
	return props;
}