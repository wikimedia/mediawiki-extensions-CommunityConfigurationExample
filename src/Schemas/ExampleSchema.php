<?php

namespace CommunityConfigurationExample\Schemas;

use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;

class ExampleSchema implements JsonSchema {
	public const CCExampleBackgroundColor = [
		self::TYPE => self::TYPE_STRING
	];
}
