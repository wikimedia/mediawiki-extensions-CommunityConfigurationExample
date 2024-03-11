<?php

namespace CommunityConfigurationExample\Schemas;

use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;

class ExampleSchema extends JsonSchema {
	public const CCExampleBackgroundColor = [
		self::TYPE => self::TYPE_STRING
	];
}
