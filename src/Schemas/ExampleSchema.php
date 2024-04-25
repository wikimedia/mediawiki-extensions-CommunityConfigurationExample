<?php

namespace CommunityConfigurationExample\Schemas;

use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;

class ExampleSchema extends JsonSchema {
	public const CCExampleBackgroundColor = [
		self::TYPE => self::TYPE_STRING,
		self::DEFAULT => 'red',
	];

	public const CCExampleBool = [
		self::TYPE => self::TYPE_BOOLEAN,
		self::DEFAULT => false,
	];

	public const CCExampleString = [
		self::TYPE => self::TYPE_STRING,
		self::DEFAULT => '',
	];

	public const CCExampleNumber = [
		self::TYPE => self::TYPE_NUMBER,
		self::DEFAULT => 0,
	];
}
