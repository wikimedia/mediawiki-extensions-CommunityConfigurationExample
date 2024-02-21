const {
	rankWith,
	isBooleanControl
} = require( 'ext.communityConfiguration.Editor' );
const BooleanYesNoControl = require( './BooleanYesNoControl.vue' );

const rankRenderer = ( renderer, tester ) => ( {
	renderer,
	// rank > 1 which is the baseline
	tester: rankWith( 2, tester )
} );

module.exports = exports = [
	rankRenderer( BooleanYesNoControl, isBooleanControl )
];
