<template>
	<div>
		<cdx-label>
			Static control handler
		</cdx-label>
	</div>
	<pre>{{ control.modelValue }}</pre>
</template>

<script>
const {
	CdxLabel
} = require( './codex.js' );
const {
	rendererProps,
	useCodexControl,
	useJsonFormControl
} = require( 'ext.communityConfiguration.Editor.controls' );

module.exports = exports = {
	name: 'StaticControl',
	components: {
		CdxLabel,
	},
	props: Object.assign( {}, rendererProps() ),
	setup( props ) {
		const {
			control,
		} = useCodexControl( useJsonFormControl( props ) );

		return {
			control
		};
	},
};
</script>
