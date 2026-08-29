<?php

declare( strict_types=1 );

namespace MediaWiki\Extension\CommunityConfigurationExample\Config\Schemas\UI;

use MediaWiki\Extension\CommunityConfiguration\Schema\UISchema;

class ExampleUISchema extends UISchema {

	public const ROOT = [
		self::ELEMENTS => [
			[
				self::TYPE => self::TYPE_CONTROL,
				self::SCOPE => '#/properties/CCExample_CustomControl',
				self::CONTROL => 'CommunityConfigurationExample.StaticControl',
			],
			[
				self::TYPE => self::TYPE_GROUP,
				self::LABEL => 'example-group',
				self::ELEMENTS => [
					'#/properties/CCExample_ValueA',
					'#/properties/CCExample_ValueB',
				],
			],
		],
	];
}
