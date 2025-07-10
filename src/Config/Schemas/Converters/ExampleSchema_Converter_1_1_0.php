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
		return $data;
	}

	public function downgradeToPrevious( stdClass $data ): stdClass {
		if ( $data->CCExample_OnOff === true ) {
			$data->CCExample_OnOff = 'on';
		} else {
			$data->CCExample_OnOff = 'off';
		}
		return $data;
	}
}
