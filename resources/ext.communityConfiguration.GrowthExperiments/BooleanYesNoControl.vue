<template>
	<control-wrapper v-bind="controlWrapper">
		<cdx-radio
			v-for="radio in radios"
			:key="'radio-' + radio.value"
			v-model="control.modelValue"
			:name="control.uischema.name"
			:input-value="radio.value"
			@update:model-value="onChange"
		>
			{{ radio.label }}
		</cdx-radio>
	</control-wrapper>
</template>

<script>
// Hack component to display booleans as Yes/No radio buttons, consider
// refactoring to enumeration
const { inject } = require( 'vue' );
const { CdxRadio } = require( '@wikimedia/codex' );
const {
	rendererProps,
	useCodexControl,
	useJsonFormControl,
	ControlWrapper
} = require( 'ext.communityConfiguration.Editor' );

// @vue/component
module.exports = exports = {
	name: 'BooleanYesNoControl',
	components: {
		CdxRadio: CdxRadio,
		ControlWrapper: ControlWrapper
	},
	props: Object.assign( {}, rendererProps(), {} ),
	setup: function ( props ) {
		const i18n = inject( 'i18n' );
		const radios = [
			{
				label: i18n( 'communityconfiguration-growthexperiments-custom-boolean-control-yes' ).text(),
				value: true
			},
			{
				label: i18n( 'communityconfiguration-growthexperiments-custom-boolean-control-no' ).text(),
				value: false
			}
		];
		return Object.assign(
			{},
			useCodexControl( useJsonFormControl( props ) ),
			{ radios: radios }
		);
	}
};
</script>
