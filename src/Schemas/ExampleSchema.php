<?php

namespace CommunityConfigurationExample\Schemas;

use MediaWiki\Extension\CommunityConfiguration\Schema\JsonSchema;
use stdClass;

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

	public const CCExampleObject = [
		self::TYPE => self::TYPE_OBJECT,
		self::DYNAMIC_DEFAULT => true,
	];

	public static function getDefaultCCExampleObject(): stdClass {
		return (object)[ 'Foo' => 1, 'Bar' => 2 ];
	}

	public const CCExampleEnum = [
		self::TYPE => self::TYPE_STRING,
		self::ENUM => [ 'fire', 'water', 'earth', 'air' ],
		self::DEFAULT => 'earth',
	];

	public const CCExampleNumberEnum = [
		self::TYPE => self::TYPE_NUMBER,
		self::ENUM => [ 1, 6, 7, 9 ],
		self::DEFAULT => 1,
	];
}
