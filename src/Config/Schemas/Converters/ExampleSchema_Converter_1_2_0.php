<?php

declare( strict_types = 1 );

namespace MediaWiki\Extension\CommunityConfigurationExample\Config\Schemas\Converters;

use MediaWiki\Extension\CommunityConfiguration\Schema\ISchemaConverter;
use stdClass;

/**
 * Converts between schema 1.1.0 and schema 1.2.0.
 *
 * 1.1.0 holds CCExample_ValueA and CCExample_ValueB as two separate top level properties.
 * 1.2.0 holds both of them as the `a` and `b` properties of a single CCExample_Values object,
 * and adds CCExample_ValueC, which 1.1.0 does not know about.
 *
 * The CCExample_Values conversion carries every value across in both directions, so a
 * 1.1.0 -> 1.2.0 -> 1.1.0 round trip returns the original data. CCExample_ValueC cannot survive
 * such a round trip, because 1.1.0 has nowhere to keep it.
 */
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class ExampleSchema_Converter_1_2_0 implements ISchemaConverter {

	public function upgradeFromOlder( stdClass $data ): stdClass {
		$data->CCExample_Values = (object)[
			'a' => $data->CCExample_ValueA,
			'b' => $data->CCExample_ValueB,
		];
		$data->CCExample_ValueC = '';
		unset( $data->CCExample_ValueA, $data->CCExample_ValueB );
		return $data;
	}

	public function downgradeToPrevious( stdClass $data ): stdClass {
		$data->CCExample_ValueA = $data->CCExample_Values->a;
		$data->CCExample_ValueB = $data->CCExample_Values->b;
		unset( $data->CCExample_Values, $data->CCExample_ValueC );
		return $data;
	}
}
