<?php

declare( strict_types = 1 );

namespace MediaWiki\Extension\CommunityConfigurationExample\Config\Schemas\Converters;

use MediaWiki\Extension\CommunityConfiguration\Schema\ISchemaConverter;
use stdClass;

// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class ExampleSchema_Converter_1_1_0 implements ISchemaConverter {

	public function upgradeFromOlder( stdClass $data ): stdClass {
		if ( $data->CCExample_OnOff === 'on' ) {
			$data->CCExample_OnOff = true;
		} else {
			$data->CCExample_OnOff = false;
		}
		$data->CCExample_CustomControl = 0;
		$data->CCExample_ValueA = 0;
		$data->CCExample_ValueB = '';
		return $data;
	}

	public function downgradeToPrevious( stdClass $data ): stdClass {
		if ( $data->CCExample_OnOff === true ) {
			$data->CCExample_OnOff = 'on';
		} else {
			$data->CCExample_OnOff = 'off';
		}
		unset(
			$data->CCExample_CustomControl,
			$data->CCExample_ValueA,
			$data->CCExample_ValueB
		);
		return $data;
	}
}
