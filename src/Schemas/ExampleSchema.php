<?php

namespace CommunityConfigurationExample\Schemas;

use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;

class ExampleSchema extends JsonSchema {
	public const CCExampleBackgroundColor = [
		self::TYPE => self::TYPE_STRING
	];

	public const CCExampleBool = [
		self::TYPE => self::TYPE_BOOLEAN,
	];

	public const CCExampleString = [
		self::TYPE => self::TYPE_STRING,
	];

	public const CCExampleNumber = [
		self::TYPE => self::TYPE_NUMBER,
	];
}
